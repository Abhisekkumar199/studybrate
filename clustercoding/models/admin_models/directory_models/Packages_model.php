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

class Packages_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_packages';

    public function store_package($data) {
        $this->db->insert($this->_cat, $data);
        return $this->db->insert_id();
    }

    public function get_packages_info() {
        $this->db->select('cat.*, user.first_name, user.last_name')
                ->from('dir_packages as cat')
                ->join('tbl_users as user', 'cat.user_id = user.user_id')
                ->where('cat.deletion_status', 0)
                ->order_by('cat.package_name', 'asc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_package_by_package_id($package_id) {
        $result = $this->db->get_where($this->_cat, array('package_id' => $package_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_package_by_id($package_id) {
        $this->db->update($this->_cat, array('publication_status' => 1), array('package_id' => $package_id));
        return $this->db->affected_rows();
    }

    public function unpublished_package_by_id($package_id) {
        $this->db->update($this->_cat, array('publication_status' => 0), array('package_id' => $package_id));
        return $this->db->affected_rows();
    }

    public function update_package($package_id, $data) {
        $this->db->update($this->_cat, $data, array('package_id' => $package_id));
        return $this->db->affected_rows();
    }

    public function remove_package_by_id($package_id) {
        $this->db->update($this->_cat, array('deletion_status' => 1), array('package_id' => $package_id));
        return $this->db->affected_rows();
    }

}
