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

class Staticpages_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_staticpages';

    public function store_staticpage($data) {
        $this->db->insert($this->_cat, $data);
        return $this->db->insert_id();
    }

    public function get_staticpages_info($staticpageid) {
        $this->db->select('sub.*')
                ->from('dir_staticpages as sub') 
                ->join('tbl_users as user', 'sub.user_id = user.user_id')
                ->where('sub.deletion_status', 0)  
                ->order_by('sub.staticpage_id', 'desc');
        $query_result = $this->db->get();
        
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_staticpages_list_categorywise($categoryid) {
        $this->db->select('*')
                ->from('dir_staticpages') 
                ->where('deletion_status', 0)  
                ->where('category_id', $categoryid)  
                ->order_by('staticpage_name', 'asc');
        $query_result = $this->db->get(); 
        $result = $query_result->result_array();
        return $result;
    }

    public function get_staticpage_by_staticpage_id($staticpage_id) {
        $result = $this->db->get_where($this->_cat, array('staticpage_id' => $staticpage_id, 'deletion_status' => 0));
        //echo $this->db->last_query();
        //die();
        return $result->row_array();
    }

    public function published_staticpage_by_id($staticpage_id) {
        $this->db->update($this->_cat, array('publication_status' => 1), array('staticpage_id' => $staticpage_id));
        return $this->db->affected_rows();
    }

    public function unpublished_staticpage_by_id($staticpage_id) {
        $this->db->update($this->_cat, array('publication_status' => 0), array('staticpage_id' => $staticpage_id));
        return $this->db->affected_rows();
    }

    public function update_staticpage($staticpage_id, $data) {
        $this->db->update($this->_cat, $data, array('staticpage_id' => $staticpage_id));
        return $this->db->affected_rows();
    }

    public function remove_staticpage_by_id($staticpage_id) {
        $this->db->where('staticpage_id', $staticpage_id);
        $this->db->delete($this->_cat); 
        return $this->db->affected_rows();
    }

}
