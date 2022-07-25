<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_listing = 'dir_listing';
    private $_articles = 'dir_articles';
    private $_products = 'dir_products';

    public function get_one_lead_news() 
    {
        $result = $this->db->limit(1, 0)->order_by('news_id', 'desc')->get_where($this->_news, array('is_featured' => 1, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }
    public function get_qa()
    {
      $this->db->select('qa.*,ans.content,u.first_name,u.last_name')
                ->from('dir_qa as qa')
                ->join('dir_answers as ans', 'ans.qid = qa.id', 'right')
                ->join('tbl_users as u', 'ans.user=u.user_id', 'left')
                ->order_by('ans.id', 'asc')
                ->limit(5);
              return  $result=$this->db->get()->result_array();

    }
    public function get_all_qa(){
      $this->db->select('qa.*,ans.content,u.first_name,u.last_name')
                ->from('dir_qa as qa')
                ->join('dir_answers as ans', 'ans.qid = qa.id', 'left')
                ->join('tbl_users as u', 'ans.user=u.user_id', 'left')
                ->order_by('ans.id', 'asc');
              //  ->limit(6);
              return  $result=$this->db->get()->result_array();

    }
    public function get_q(){
      $this->db->select('qa.*')
                ->from('dir_qa as qa')
                ->order_by('datetime')
                ->limit(6);
              return  $result=$this->db->get()->result_array();

    }
    public function insert_q($data){
      $this->db->insert('dir_qa', $data);
      return $this->db->insert_id();
    }
    public function insert_a($data){
      $this->db->insert('dir_answers', $data);
      return $this->db->insert_id();
    }
    public function get_featured_listing() {
        $this->db->select('listing.listing_id, listing.company_name,listing.about_company, listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name,cities.city_name, listing.total_views')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.is_featured', 1)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                  ->where('listing.type', 1)
                ->order_by('listing.listing_id', 'desc')
                ->limit(12);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_featured_listing_tution($catids) {
        $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id', 'left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id', 'left')
                ->where('listing.is_featured', 1)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1) 
              ->where_in('listing.category_id', explode(",",$catids))
                ->order_by('listing.listing_id', 'desc')
                ->limit(4);
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_featured_listing_institute($catids) {
      $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
              ->from('dir_listing as listing')
              ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
              ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
              ->where('listing.is_featured', 1)
              ->where('listing.deletion_status', 0)
              ->where('listing.publication_status', 1)
              ->where_in('listing.category_id', explode(",",$catids))
              ->order_by('listing.listing_id', 'desc')
              ->limit(4);
      $query_result = $this->db->get();
      $result = $query_result->result_array();
      return $result;
  }
  public function get_featured_listing_collage($catids) {
    $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
            ->from('dir_listing as listing')
            ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
            ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
            ->where('listing.is_featured', 1)
            ->where('listing.deletion_status', 0)
            ->where('listing.publication_status', 1)
            ->where_in('listing.category_id', explode(",",$catids))
            ->order_by('listing.listing_id', 'desc')
            ->limit(4);
    $query_result = $this->db->get();
    $result = $query_result->result_array();
    return $result;
}
public function get_featured_listing_comp_exam($catids) {
  $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
          ->from('dir_listing as listing')
          ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
          ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
          ->where('listing.is_featured', 1)
          ->where('listing.deletion_status', 0)
          ->where('listing.publication_status', 1)
          ->where_in('listing.category_id', explode(",",$catids))
          ->order_by('listing.listing_id', 'desc')
          ->limit(4);
  $query_result = $this->db->get();
  $result = $query_result->result_array();
  return $result;
}

public function get_featured_listing_itcourses($catids) {
  $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
          ->from('dir_listing as listing')
          ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
          ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
          ->where('listing.is_featured', 1)
          ->where('listing.deletion_status', 0)
          ->where('listing.publication_status', 1)
          ->where_in('listing.category_id', explode(",",$catids))
          ->order_by('listing.listing_id', 'desc')
          ->limit(4);
  $query_result = $this->db->get();
  $result = $query_result->result_array();
  return $result;
}
public function get_featured_listing_language($catids) {
  $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
          ->from('dir_listing as listing')
          ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
          ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
          ->where('listing.is_featured', 1)
          ->where('listing.deletion_status', 0)
          ->where('listing.publication_status', 1)
          ->where_in('listing.category_id', explode(",",$catids))
          ->order_by('listing.listing_id', 'desc')
          ->limit(4);
  $query_result = $this->db->get();
  $result = $query_result->result_array();
  return $result;
}

public function get_featured_listing_studyabroad($catids) {
  $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
          ->from('dir_listing as listing')
          ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
          ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
          ->where('listing.is_featured', 1)
          ->where('listing.deletion_status', 0)
          ->where('listing.publication_status', 1)
          ->where_in('listing.category_id', explode(",",$catids))
          ->order_by('listing.listing_id', 'desc')
          ->limit(4);
  $query_result = $this->db->get();
  $result = $query_result->result_array();
  return $result;
}

public function get_featured_listing_hobbies($catids) {
  $this->db->select('listing.listing_id, listing.company_name, listing.about_company,  listing.company_logo, cat.category_name, cat.category_id, cat.icon_name, cat.color_name, cities.city_name, listing.total_views')
          ->from('dir_listing as listing')
          ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
          ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
          ->where('listing.is_featured', 1)
          ->where('listing.deletion_status', 0)
          ->where('listing.publication_status', 1)
          ->where_in('listing.category_id', explode(",",$catids))
          ->order_by('listing.listing_id', 'desc')
          ->limit(4);
  $query_result = $this->db->get();
  $result = $query_result->result_array();
  return $result;
}

public function static_pages() {
  $this->db->select('*')
          ->from('dir_staticpages')  
          ->where('publication_status', 1) 
          ->order_by('staticpage_id', 'desc'); 
  $query_result = $this->db->get();
  $result = $query_result->result_array();
  return $result;
}



    public function count_total_listing() {
        $result = $this->db->get_where($this->_listing, array('deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_city() {
        $result = $this->db->get_where($this->_cities, array('deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_product() {
        $result = $this->db->get_where($this->_products, array('deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_article() {
        $result = $this->db->get_where($this->_articles, array('deletion_status' => 0));
        return $result->num_rows();
    }

}
