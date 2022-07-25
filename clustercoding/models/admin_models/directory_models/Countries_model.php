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

class Countries_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_countries = 'dir_countries';

    public function store_country($data) {
        $this->db->insert($this->_countries, $data);
        return $this->db->insert_id();
    }

    public function get_countries_info() {
        $this->db->select('cat.*, user.first_name, user.last_name')
                ->from('dir_countries as cat')
                ->join('tbl_users as user', 'cat.user_id = user.user_id')
                ->where('cat.deletion_status', 0)
                ->order_by('cat.country_name', 'asc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_country_by_country_id($country_id) {
        $result = $this->db->get_where($this->_countries, array('country_id' => $country_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_country_by_id($country_id) {
        $this->db->update($this->_countries, array('publication_status' => 1), array('country_id' => $country_id));
        return $this->db->affected_rows();
    }

    public function unpublished_country_by_id($country_id) {
        $this->db->update($this->_countries, array('publication_status' => 0), array('country_id' => $country_id));
        return $this->db->affected_rows();
    }

    public function update_country($country_id, $data) {
        $this->db->update($this->_countries, $data, array('country_id' => $country_id));
        return $this->db->affected_rows();
    }

    public function remove_country_by_id($country_id) {
        $this->db->update($this->_countries, array('deletion_status' => 1), array('country_id' => $country_id));
        return $this->db->affected_rows();
    }

}
