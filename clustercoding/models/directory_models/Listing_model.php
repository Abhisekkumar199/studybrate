<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Listing_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_listing = 'dir_listing';
    private $_images = 'dir_images';
    private $_videos = 'dir_videos';
    private $_products = 'dir_products';
    private $_services = 'dir_services';
    private $_articles = 'dir_articles';

    public function get_all_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.subjects, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->where('listing.type', 1)
                ->order_by('listing.listing_id', 'desc')
                ->limit(4);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    public function get_all_listing_t() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.subjects, listing.education, listing.registration_code, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->where('listing.type', 0)
                ->order_by('listing.listing_id', 'desc')
                ->limit(4);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_listing($listing_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->order_by('listing.listing_id', 'desc')
                ->limit(2);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    

    public function get_recent_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_popural_listing() {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->order_by('listing.total_views', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_category_info_by_category_id($category_id) {
        $result = $this->db->get_where($this->_cat, array('category_id' => $category_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_listing_by_category_id($category_id) {
        $this->db->select('listing.listing_id,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left') 
                ->where('listing.category_id', $category_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->group_by('listing.listing_id');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    
    
    public function get_all_listing_by_city_id($city_id) {
        $this->db->select('listing.listing_id,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left') 
                ->where('listing.city_id', $city_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(30)
                ->group_by('listing.listing_id');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function more_listing_t($listing_id) {
        $this->db->select('listing.listing_id,COUNT(reviews.review_id) AS totalreview,AVG(reviews.rating) AS averagerating, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left') 
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left') 
                ->join('dir_reviews as reviews', 'listing.listing_id = reviews.listing_id','left') 
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->where('listing.type', 0)
                ->group_by('listing.listing_id')
                ->limit(2);
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_city_info_by_city_id($city_id) {
        $result = $this->db->get_where($this->_cities, array('city_id' => $city_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    
    public function more_category_listing($listing_id, $category_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(3)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    public function more_city_listing($listing_id, $city_id) {
        $this->db->select('listing.listing_id, listing.company_name, listing.company_logo, listing.about_company, listing.company_logo, listing.address, listing.state, listing.zip, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('listing.listing_id <', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1)
                ->limit(3)
                ->order_by('listing.listing_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_listing_info_by_listing_id($listing_id) {
        $this->db->select('listing.*, cat.category_name, cities.city_name')
                ->from('dir_listing as listing')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->where('listing.listing_id', $listing_id)
                ->where('listing.deletion_status', 0)
                ->where('listing.publication_status', 1);
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->row_array();
        return $result;
    }

    public function count_total_images_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_images, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_videos_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_videos, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_products_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_products, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_services_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_services, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function count_total_articles_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_articles, array('listing_id' => $listing_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_recent_articles_by_listing_id($listing_id) {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->where('articles.listing_id', $listing_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(5)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_recent_blogs_by_listing_id($listing_id) {
        $this->db->select('blogs.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_blogs as blogs')
                ->join('dir_listing as listing', 'blogs.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->where('blogs.listing_id', $listing_id)
                ->where('blogs.deletion_status', 0)
                ->where('blogs.publication_status', 1)
                ->limit(5)
                ->order_by('blogs.blog_id', 'desc');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }
    
    
    public function get_recent_notes_by_listing_id($listing_id) {
        $this->db->select('notes.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_notes as notes')
                ->join('dir_listing as listing', 'notes.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->where('notes.listing_id', $listing_id)
                ->where('notes.deletion_status', 0)
                ->where('notes.publication_status', 1)
                ->limit(5)
                ->order_by('notes.note_id', 'desc');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_recent_gallary_by_listing_id($listing_id) {
        $this->db->select('gallary.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->where('gallary.listing_id', $listing_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(5)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_all_reviews_published($listing_id) 
    {
        $this->db->select('*')
                ->from('dir_reviews') 
                ->where('publication_status', 1)
                ->where('listing_id', $listing_id)  
                ->order_by('review_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_all_questions_published($listing_id) 
    {
        $this->db->select('*')
                ->from('dir_questions') 
                ->where('publication_status', 1)
                ->where('listing_id', $listing_id)  
                ->order_by('question_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    
    public function get_recent_courses_by_listing_id($listing_id) {
        $this->db->select('courses.*')
                ->from('dir_services as courses')
                ->join('dir_listing as listing', 'courses.listing_id = listing.listing_id')
                ->where('courses.listing_id', $listing_id)
                ->where('courses.deletion_status', 0)
                ->where('courses.publication_status', 1)
                ->limit(5);

        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_recent_images_by_listing_id($listing_id) {
        $this->db->select('images.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_images as images')
                ->join('dir_listing as listing', 'images.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('images.listing_id', $listing_id)
                ->where('images.deletion_status', 0)
                ->where('images.publication_status', 1)
                ->limit(3)
                ->order_by('images.image_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_recent_videos_by_listing_id($listing_id) {
        $this->db->select('videos.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_videos as videos')
                ->join('dir_listing as listing', 'videos.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('videos.listing_id', $listing_id)
                ->where('videos.deletion_status', 0)
                ->where('videos.publication_status', 1)
                ->order_by('videos.video_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->row_array();
        return $result;
    }

    public function update_total_views($listing_id, $total_views) {
        $this->db->update($this->_listing, array('total_views' => $total_views), array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

    public function get_images_by_listing_id($listing_id) {
        $this->db->select('images.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_images as images')
                ->join('dir_listing as listing', 'images.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('images.listing_id', $listing_id)
                ->where('images.deletion_status', 0)
                ->where('images.publication_status', 1)
                ->order_by('images.image_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_products_by_listing_id($listing_id) {
        $this->db->select('products.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_products as products')
                ->join('dir_listing as listing', 'products.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('products.listing_id', $listing_id)
                ->where('products.deletion_status', 0)
                ->where('products.publication_status', 1)
                ->order_by('products.product_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_services_by_listing_id($listing_id) {
        $this->db->select('services.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.listing_id', $listing_id)
                ->where('services.deletion_status', 0)
                ->where('services.publication_status', 1)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_articles_by_listing_id($listing_id) {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.listing_id', $listing_id)
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_videos_by_listing_id($listing_id) {
        $this->db->select('videos.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_videos as videos')
                ->join('dir_listing as listing', 'videos.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('videos.listing_id', $listing_id)
                ->where('videos.deletion_status', 0)
                ->where('videos.publication_status', 1)
                ->order_by('videos.video_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

}
