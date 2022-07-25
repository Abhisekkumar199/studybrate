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

class Profile_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_users = 'tbl_users';
    private $_skills = 'port_skills';

    public function get_user_info_by_id($user_id) {
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id));
        return $result->row_array();
    }

    public function get_user_skills_info_by_user_id($user_id) {
        $result = $this->db->get_where($this->_skills, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function update_user_info($user_id, $data) {
        $this->db->update($this->_users, $data, array('user_id' => $user_id));
        return $this->db->affected_rows();
    }
    
    public function check_old_password($user_id, $old_password){
        $result = $this->db->get_where($this->_users, array('user_id' => $user_id, 'password' => $old_password));
        return $result->row_array();
    }

}
