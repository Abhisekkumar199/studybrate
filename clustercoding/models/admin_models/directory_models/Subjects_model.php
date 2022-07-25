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

class Subjects_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_subjects';

    public function store_subject($data) {
        $this->db->insert($this->_cat, $data);
        return $this->db->insert_id();
    }

    public function get_subjects_info($subjectid) {
        $this->db->select('sub.*, cat.category_name, user.first_name, user.last_name')
                ->from('dir_subjects as sub')
                ->join('dir_categories as cat', 'sub.category_id = cat.category_id') 
                ->join('tbl_users as user', 'sub.user_id = user.user_id')
                ->where('sub.deletion_status', 0)  
                ->order_by('sub.subject_id', 'desc');
        $query_result = $this->db->get();
        
        
        $result = $query_result->result_array();
        return $result;
    }

    public function get_subjects_list_categorywise($categoryid) {
        $this->db->select('*')
                ->from('dir_subjects') 
                ->where('deletion_status', 0)  
                ->where('category_id', $categoryid)  
                ->order_by('subject_name', 'asc');
        $query_result = $this->db->get(); 
        $result = $query_result->result_array();
        return $result;
    }

    public function get_subject_by_subject_id($subject_id) {
        $result = $this->db->get_where($this->_cat, array('subject_id' => $subject_id, 'deletion_status' => 0));
        //echo $this->db->last_query();
        //die();
        return $result->row_array();
    }

    public function published_subject_by_id($subject_id) {
        $this->db->update($this->_cat, array('publication_status' => 1), array('subject_id' => $subject_id));
        return $this->db->affected_rows();
    }

    public function unpublished_subject_by_id($subject_id) {
        $this->db->update($this->_cat, array('publication_status' => 0), array('subject_id' => $subject_id));
        return $this->db->affected_rows();
    }

    public function update_subject($subject_id, $data) {
        $this->db->update($this->_cat, $data, array('subject_id' => $subject_id));
        return $this->db->affected_rows();
    }

    public function remove_subject_by_id($subject_id) {
        $this->db->where('subject_id', $subject_id);
        $this->db->delete($this->_cat); 
        return $this->db->affected_rows();
    }

}
