<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Gallary_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_hearts = 'dir_gallary_hearts';
    private $_comments = 'dir_gallary_comments';
    private $_bookmarks = 'dir_bookmarks';
    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_gallary = 'dir_gallary';

    public function get_recent_gallary() {
        $this->db->select('gallary.*, cat.category_name, cities.city_name, listing.company_name, listing.education, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(30)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_popural_gallary() {
        $this->db->select('gallary.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(30)
                ->order_by('gallary.total_views', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_gallary() {
        $this->db->select('gallary.*, cat.category_name, cities.city_name, listing.company_name, listing.education, listing.subjects,listing.education, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->order_by('gallary.gallary_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_gallary($gallary_id) {
        $this->db->select('gallary.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('gallary.gallary_id <', $gallary_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->order_by('gallary.gallary_id', 'desc')
                ->limit(3);
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_gallary_info_by_gallary_id($gallary_id) {
        $this->db->select('gallary.*, cat.category_name, cities.city_name, listing.listing_id, listing.company_name, listing.education, listing.subjects, listing.experiance, listing.mobile, listing.company_logo, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left')
                ->where('gallary.gallary_id', $gallary_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1);
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->row_array();
        return $result;
    }

    public function get_comments_info_by_gallary_id($gallary_id) {
        $this->db->select('comments.comment, comments.date_added, users.first_name, users.last_name, users.avatar')
                ->from('dir_gallary_comments as comments')
                ->join('tbl_users as users', 'comments.user_id = users.user_id')
                ->where('comments.gallary_id', $gallary_id)
                ->where('comments.deletion_status', 0)
                ->where('comments.publication_status', 1)
                ->limit(10)
                ->order_by('comments.comment_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_category_info_by_category_id($category_id) {
        $result = $this->db->get_where($this->_cat, array('category_id' => $category_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_gallary_by_category_id($category_id) {
        $this->db->select('gallary.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(3)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_category_gallary($gallary_id, $category_id) {
        $this->db->select('gallary.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.category_id', $category_id)
                ->where('gallary.gallary_id <', $gallary_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(3)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_city_info_by_city_id($city_id) {
        $result = $this->db->get_where($this->_cities, array('city_id' => $city_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function get_all_gallary_by_city_id($city_id) {
        $this->db->select('gallary.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(3)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function more_city_gallary($gallary_id, $city_id) {
        $this->db->select('gallary.*, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->where('listing.city_id', $city_id)
                ->where('gallary.gallary_id <', $gallary_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->limit(3)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function count_hearts_by_gallary_id($gallary_id) {
        $result = $this->db->get_where($this->_hearts, array('gallary_id' => $gallary_id));
        return $result->num_rows();
    }

    public function count_comments_by_gallary_id($gallary_id) {
        $result = $this->db->get_where($this->_comments, array('gallary_id' => $gallary_id));
        return $result->num_rows();
    }

    public function count_heart_by_user_id_and_gallary_id($user_id, $gallary_id) {
        $result = $this->db->get_where($this->_hearts, array('user_id' => $user_id, 'gallary_id' => $gallary_id));
        return $result->num_rows();
    }

    public function count_bookmark_by_user_id_and_listing_id($user_id, $listing_id) {
        $result = $this->db->get_where($this->_bookmarks, array('user_id' => $user_id, 'listing_id' => $listing_id));
        return $result->num_rows();
    }

    public function give_heart_by_user_id_and_gallary_id($data) {
        $this->db->insert($this->_hearts, $data);
        return $this->db->insert_id();
    }

    public function store_gallary_comment($data) {
        $this->db->insert($this->_comments, $data);
        return $this->db->insert_id();
    }

    public function update_total_views($gallary_id, $total_views) {
        $this->db->update($this->_gallary, array('total_views' => $total_views), array('gallary_id' => $gallary_id));
        return $this->db->affected_rows();
    }

}
