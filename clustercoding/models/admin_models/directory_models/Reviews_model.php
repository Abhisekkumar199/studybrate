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

class Reviews_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_reviews = 'dir_reviews';

    public function get_reviews_info($listingid) {
        $this->db->select('reviews.review_id, reviews.name, reviews.email, reviews.rating, reviews.date_added, reviews.remarks, reviews.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_reviews as reviews')
                ->join('dir_listing as listing', 'reviews.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left') 
                ->where('reviews.listing_id', $listingid)
                ->order_by('reviews.review_id', 'desc');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_review_by_review_id($review_id) {
        $result = $this->db->get_where($this->_reviews, array('review_id' => $review_id));
        return $result->row_array();
    }

    public function published_review_by_id($review_id) {
        $this->db->update($this->_reviews, array('publication_status' => 1), array('review_id' => $review_id));
        return $this->db->affected_rows();
    }

    public function unpublished_review_by_id($review_id) {
        $this->db->update($this->_reviews, array('publication_status' => 0), array('review_id' => $review_id));
        return $this->db->affected_rows();
    }

    public function remove_review_by_id($review_id) 
    {
        $this->db->where('review_id', $review_id);
        $this->db->delete($this->_reviews);
        return $this->db->affected_rows();
    }

}
