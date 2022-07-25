<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Search_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_search_result($keyword_name = NULL, $category_id = NULL,$sub_category= NULL, $city_id = NULL, $tutor_name = NULL) 
    {
        $this->db->select('cat.category_name,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, city.city_name, listing.category_id, listing.company_name, listing.about_company,listing.type,listing.address, listing.company_logo, listing.listing_id as listing-id');
        $this->db->from('dir_listing as listing');
        $this->db->join('dir_categories as cat', 'listing.category_id = cat.category_id','left');
        $this->db->join('dir_cities as city', 'listing.city_id = city.city_id','left');
        $this->db->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left');  
        if(!empty($keyword_name))
        {   
            $this->db->join('dir_subjects as subjects', 'listing.subject_id LIKE subjects.subject_id');
        }
        if(!empty($keyword_name))
        {   
            $this->db->where("(subjects.subject_name LIKE '%$keyword_name%')");
        }
         if(!empty($tutor_name))
        {   
            $this->db->where("(listing.company_name LIKE '%$tutor_name%')");
        }
        //$this->db->where("(listing.company_name LIKE '%$keyword_name%' OR keywords.keyword_name LIKE '%$keyword_name%')");
        if (!empty($sub_category)) 
        {  
            $this->db->where('listing.category_id', $sub_category); 
        }
        else
        {
            if (!empty($category_id)) 
            {  
                $this->db->where_in('listing.category_id', explode(",",$category_id)); 
            } 
        }
        
        if (!empty($city_id)) 
        {
            $this->db->like('city.city_name', $city_id);
        }
        $this->db->where('listing.publication_status', 1);
        $this->db->where('listing.deletion_status', 0);
        $this->db->where('cat.deletion_status', 0);  
        $this->db->group_by('listing.listing_id');   
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        //print_r($this->db->last_query());
        //die();
        return $result;
    }

    public function get_search_result_subject_wise($subject_id = NULL) 
    { 
        
        $this->db->select('cat.category_name,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, city.city_name, listing.category_id, listing.company_name, listing.about_company,listing.type,listing.address, listing.company_logo, listing.listing_id as listing-id');
        $this->db->from('dir_listing as listing'); 
        $this->db->join('dir_categories as cat', 'listing.category_id = cat.category_id','left');
        $this->db->join('dir_cities as city', 'listing.city_id = city.city_id','left');  
        $this->db->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left');  
        //$this->db->where_in('listing.subject_id', explode(",",$subject_id));
        $this->db->where("listing.subject_id LIKE '%$subject_id%'");  
        $this->db->where('listing.publication_status', 1);
        $this->db->where('listing.deletion_status', 0);    
        $this->db->group_by('listing.listing_id');   
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        //print_r($this->db->last_query()); 
        //die();
        return $result;
    }
    
    public function get_search_result_category_wise($category_id = NULL) 
    { 
        
        $this->db->select('cat.category_name,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, city.city_name, listing.category_id, listing.company_name, listing.about_company,listing.type,listing.address, listing.company_logo, listing.listing_id as listing-id');
        $this->db->from('dir_listing as listing'); 
        $this->db->join('dir_categories as cat', 'listing.category_id = cat.category_id','left');
        $this->db->join('dir_cities as city', 'listing.city_id = city.city_id','left');  
        $this->db->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left');  
        $this->db->where_in('listing.category_id', explode(",",$category_id)); 
        
        $this->db->where('listing.publication_status', 1);
        $this->db->where('listing.deletion_status', 0);  
       // $this->db->order_by('listing.listing_id','desc');   
        $this->db->group_by('listing.listing_id');    
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        //print_r($this->db->last_query()); 
        //die();
        //foreach ($result as $result1) 
        //    { 
        //        $listing_id =  $result1['listing-id']; 
        //        $result .= $this->get_total_review($listing_id);
        //        $result .= $this->get_avg_rating($listing_id);
        //    }
        return $result;
    }
    
    public function get_search_result_with_filter($category_ids = NULL,$city_ids = NULL) 
    { 
        
        $this->db->select('cat.category_name,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, city.city_name, listing.category_id, listing.company_name, listing.about_company,listing.type,listing.address, listing.company_logo, listing.listing_id as listing-id');
        $this->db->from('dir_listing as listing'); 
        $this->db->join('dir_categories as cat', 'listing.category_id = cat.category_id','left');
        $this->db->join('dir_cities as city', 'listing.city_id = city.city_id','left');  
        $this->db->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left'); 
        if(!empty($category_ids))
        {
            $this->db->where_in('listing.category_id', $category_ids);   
        }
        if(!empty($city_ids))
        {
            $this->db->where_in('listing.city_id', $city_ids);   
        } 
        $this->db->where('listing.publication_status', 1);
        $this->db->where('listing.deletion_status', 0);  
       // $this->db->order_by('listing.listing_id','desc');   
        $this->db->group_by('listing.listing_id');    
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        //print_r($this->db->last_query()); 
        //die();
        //foreach ($result as $result1) 
        //    { 
        //        $listing_id =  $result1['listing-id']; 
        //        $result .= $this->get_total_review($listing_id);
        //        $result .= $this->get_avg_rating($listing_id);
        //    }
        return $result;
    }
    
    public function get_total_review($listing_id) {
        $result = $this->db->get_where('dir_reviews', array('listing_id' => $listing_id));
        return $result->num_rows();
    }
    public function get_avg_rating($listing_id) 
    {
        $this->db->select('AVG(rating) rating');
        return $result=$this->db->get('dir_reviews')->row();  
    }
}
 
    
