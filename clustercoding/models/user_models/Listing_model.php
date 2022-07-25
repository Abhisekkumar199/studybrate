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

class Listing_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_listing = 'dir_listing';
    
    public function store_company_info($data) {
        $this->db->insert($this->_listing, $data);
        //echo $this->db->last_query();
        //die();
        return $this->db->insert_id();
    }

    public function get_all_listing($user_id) {
        $this->db->select('listing.*, city.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as city', 'listing.city_id = city.city_id','left')
                ->where('listing.user_id', $user_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_categories() {
        $result = $this->db->order_by('category_name', 'desc')->get_where($this->_cat, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function get_all_cities() {
        $result = $this->db->order_by('city_name', 'desc')->get_where($this->_cities, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_listing_by_user_id($user_id) {
        $result = $this->db->get_where($this->_listing, array('user_id' => $user_id));
        return $result->num_rows();
    }

    public function get_listing_by_listing_id_and_user_id($user_id, $listing_id) {
        $result = $this->db->get_where($this->_listing, array('user_id' => $user_id, 'listing_id' => $listing_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }
    
    public function update_company_info($listing_id, $data){
        $this->db->update($this->_listing, $data, array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }
    
    public function delete_listing($listing_id){
        $this->db->where('listing_id', $listing_id);
        $this->db->delete($this->_listing);
        ////echo $this->db->last_query();
        //die();
    }

}
