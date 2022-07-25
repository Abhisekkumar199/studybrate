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

class Peoples_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_users = 'tbl_users';
    private $_packages = 'dir_packages';

    public function get_all_packages(){
        $result = $this->db->get_where($this->_packages, array('deletion_status' => 0));
        return $result->result_array();
    }

    public function store_user($data) {
        $this->db->insert($this->_users, $data);
        return $this->db->insert_id();
    }

    public function get_users_info() {
        $this->db->select('users.*, packages.package_name')
                ->from('tbl_users as users')
                ->join('dir_packages as packages', 'users.package_id = packages.package_id')
                ->where('users.access_label', 5)
                ->where('users.deletion_status', 0)
                ->order_by('users.user_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_user_by_user_id($user_id) {
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function activate_user_by_user_id($user_id) {
        $this->db->update($this->_users, array('activation_status' => 1), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

    public function deactivate_user_by_user_id($user_id) {
        $this->db->update($this->_users, array('activation_status' => 0), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

    public function update_user($user_id, $data) {
        $this->db->update($this->_users, $data, array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

    public function remove_user_by_user_id($user_id) {
        $this->db->update($this->_users, array('deletion_status' => 1), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }
    
    public function store_employee($data) {
        $this->db->insert($this->_users, $data);
        return $this->db->insert_id();
    }
    
    //For employee

    public function get_employees_info() {
        $result = $this->db->order_by('user_id', 'desc')->get_where($this->_users, array('access_label <=' => 4, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function get_employee_by_user_id($user_id) {
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function activate_employee_by_user_id($user_id) {
        $this->db->update($this->_users, array('activation_status' => 1), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

    public function deactivate_employee_by_user_id($user_id) {
        $this->db->update($this->_users, array('activation_status' => 0), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

    public function update_employee($user_id, $data) {
        $this->db->update($this->_users, $data, array('user_id' => $user_id));
        return $this->db->affected_rows();
    }

    public function remove_employee_by_user_id($user_id) {
        $this->db->update($this->_users, array('deletion_status' => 1), array('user_id' => $user_id));
        return $this->db->affected_rows();
    }
}
