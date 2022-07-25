<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* #********************************************#
  #                   ClusterCoding             #
  #*********************************************#
  #      Author:     ClusterCoding              #
  #      Email:      info@clustercoding.com     #
  #      Website:    http://clustercoding.com   #
  #                                             #
  #      Version:    1.0.0                      #
  #      Copyright:  (c) 2017 - ClusterCoding   #
  #                                             #
  #*********************************************# */

class Categories_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';

    public function store_category($data) {
        $this->db->insert($this->_cat, $data);
        return $this->db->insert_id();
    }

    public function get_categories_info($catid) 
    { 
        $this->db->select('cat.*, user.first_name, user.last_name')
                ->from('dir_categories as cat')
                ->join('tbl_users as user', 'cat.user_id = user.user_id')
                ->where('cat.deletion_status', 0) 
                ->where('cat.publication_status', 1) 
                ->where("parent_id", $catid)
                ->order_by('cat.category_name', 'asc');
        $query_result = $this->db->get();  
        
        // $this->db->last_query();  
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_categories_info2($catid) 
    { 
        $this->db->select('cat.*')
                ->from('dir_categories as cat') 
                ->where('cat.deletion_status', 0) 
                ->where("cat.category_id", $catid)
                ->order_by('cat.category_name', 'asc');
        $query_result = $this->db->get();  
        $result = $query_result->result_array();
        return $result;
    }

    public function get_child_categories_list($catid) 
    {
        $this->db->select('*')
                ->from('dir_categories')
                ->where('deletion_status', 0)  
                ->where("parent_id", $catid)
                ->order_by('category_name', 'asc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_category_by_category_id($category_id) {
        $result = $this->db->get_where($this->_cat, array('category_id' => $category_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_category_by_id($category_id) {
        $this->db->update($this->_cat, array('publication_status' => 1), array('category_id' => $category_id));
        return $this->db->affected_rows();
    }

    public function unpublished_category_by_id($category_id) {
        $this->db->update($this->_cat, array('publication_status' => 0), array('category_id' => $category_id));
        return $this->db->affected_rows();
    }

    public function update_category($category_id, $data) {
        $this->db->update($this->_cat, $data, array('category_id' => $category_id));
        return $this->db->affected_rows();
    }

    public function remove_category_by_id($category_id) {
        $this->db->update($this->_cat, array('deletion_status' => 1), array('category_id' => $category_id));
        return $this->db->affected_rows();
    }

    // get child  catgory 
    public function getChildCategory($id) 
    {  
        $rows = $this->db
        ->select('category_id,parent_id,category_name')
        ->where('parent_id', $id)
        ->order_by('category_id','asc')
        ->get('dir_categories')
        ->result();
    
        $categorylist = '';
        if (count($rows) > 0) 
        {
            foreach ($rows as $row) 
            {
                $categorylist .=  $row->category_id.","; 
                $categorylist .= $this->getChildCategory($row->category_id);
            }
        }
        return  $categorylist;
    }

}
