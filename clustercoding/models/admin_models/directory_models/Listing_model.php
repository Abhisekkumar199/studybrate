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

    private $_listing = 'dir_listing';

    public function get_listing_info() {
        $this->db->select('user.password,company_name,listing.listing_id, listing.company_name, listing.expire_date, listing.paid_status, listing.company_logo, listing.date_added, listing.publication_status, listing.is_featured, listing.verification_status, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('tbl_users as user', 'listing.user_id = user.user_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->where('listing.deletion_status', 0)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_listing_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_listing, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('publication_status' => 1), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

    public function unvrified_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('verification_status' => 0), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }
    
    public function vrified_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('verification_status' => 1), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

    public function unpublished_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('publication_status' => 0), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }
    
    public function featured_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('is_featured' => 1), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }
    
    public function unfeatured_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('is_featured' => 0), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

    public function remove_listing_by_id($listing_id) {
        $this->db->update($this->_listing, array('deletion_status' => 1), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

}
