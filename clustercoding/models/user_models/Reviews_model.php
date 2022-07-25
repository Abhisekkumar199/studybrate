<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Reviews_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }
 
    private $_reviews = 'dir_reviews';

    public function store_review_info($data) 
    {
        $this->db->insert($this->_reviews, $data);
        return $this->db->insert_id();
    }
  

    public function get_all_reviews() 
    {
        $this->db->select('*')
                ->from('dir_reviews')  
                ->order_by('review_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_listing_ids($user_id) 
    {
        $rows = $this->db->select('listing_id')
                ->from('dir_listing')  
                ->where('user_id', $user_id);
        $query_result = $this->db->get(); 
        $result = $query_result->result_array();
        return $result;
    }
    
     public function get_reviews_info($listing_ids) 
     {
        $this->db->select('reviews.review_id, reviews.name, reviews.email, reviews.rating, reviews.date_added, reviews.remarks, reviews.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_reviews as reviews')
                ->join('dir_listing as listing', 'reviews.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left') 
                ->where_in('reviews.listing_id', $listing_ids)  
                ->order_by('reviews.review_id', 'desc');
        $query_result = $this->db->get();
        
        $result = $query_result->result_array();
        return $result;
    }

    public function get_review_by_review_id($review_id) 
    {
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

    public function get_all_reviews_published() 
    {
        $this->db->select('*')
                ->from('dir_reviews') 
                ->where('publication_status', 1)  
                ->order_by('review_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function remove_blog_by_id($review_id) 
    { 
        $this->db->where('review_id', $review_id);
        $this->db->delete($this->_reviews);
        return $this->db->affected_rows();
    }

}
