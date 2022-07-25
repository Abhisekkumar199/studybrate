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

class Sub_categories_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_sub_categories = 'dir_sub_categories';
    private $_categories = 'dir_categories';

    public function store_sub_category($data) {
        $this->db->insert($this->_sub_categories, $data);
        return $this->db->insert_id();
    }

    public function get_sub_categories_info() {
        $this->db->select('sub_category.*, category.category_name, user.first_name, user.last_name')
                ->from('dir_sub_categories as sub_category')
                ->join('tbl_users as user', 'sub_category.user_id = user.user_id')
                ->join('dir_categories as category', 'sub_category.category_id = category.category_id')
                ->where('sub_category.deletion_status', 0)
                ->order_by('sub_category.sub_category_name', 'asc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_sub_category_by_sub_category_id($sub_category_id) {
        $result = $this->db->get_where($this->_sub_categories, array('sub_category_id' => $sub_category_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_categories_info() {
        $result = $this->db->get_where($this->_categories, array('deletion_status' => 0));
        return $result->result_array();
    }

    public function published_sub_category_by_id($sub_category_id) {
        $this->db->update($this->_sub_categories, array('publication_status' => 1), array('sub_category_id' => $sub_category_id));
        return $this->db->affected_rows();
    }

    public function unpublished_sub_category_by_id($sub_category_id) {
        $this->db->update($this->_sub_categories, array('publication_status' => 0), array('sub_category_id' => $sub_category_id));
        return $this->db->affected_rows();
    }

    public function update_sub_category($sub_category_id, $data) {
        $this->db->update($this->_sub_categories, $data, array('sub_category_id' => $sub_category_id));
        return $this->db->affected_rows();
    }

    public function remove_sub_category_by_id($sub_category_id) {
        $this->db->update($this->_sub_categories, array('deletion_status' => 1), array('sub_category_id' => $sub_category_id));
        return $this->db->affected_rows();
    }

}
