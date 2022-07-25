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

class Cities_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cities = 'dir_cities';
    private $_countries = 'dir_countries';

    public function store_city($data) {
        $this->db->insert($this->_cities, $data);
        return $this->db->insert_id();
    }

    public function get_cities_info() {
        $this->db->select('city.*, country.country_name, user.first_name, user.last_name')
                ->from('dir_cities as city')
                ->join('tbl_users as user', 'city.user_id = user.user_id')
                ->join('dir_countries as country', 'city.country_id = country.country_id')
                ->where('city.deletion_status', 0)
                ->order_by('city.city_name', 'asc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_city_by_city_id($city_id) {
        $result = $this->db->get_where($this->_cities, array('city_id' => $city_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_countries_info() {
        $result = $this->db->get_where($this->_countries, array('deletion_status' => 0));
        return $result->result_array();
    }

    public function published_city_by_id($city_id) {
        $this->db->update($this->_cities, array('publication_status' => 1), array('city_id' => $city_id));
        return $this->db->affected_rows();
    }

    public function unpublished_city_by_id($city_id) {
        $this->db->update($this->_cities, array('publication_status' => 0), array('city_id' => $city_id));
        return $this->db->affected_rows();
    }

    public function update_city($city_id, $data) {
        $this->db->update($this->_cities, $data, array('city_id' => $city_id));
        return $this->db->affected_rows();
    }

    public function remove_city_by_id($city_id) {
        $this->db->update($this->_cities, array('deletion_status' => 1), array('city_id' => $city_id));
        return $this->db->affected_rows();
    }

}
