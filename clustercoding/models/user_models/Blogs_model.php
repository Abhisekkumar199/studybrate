<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Blogs_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_blogs = 'dir_blogs';

    public function store_blog_info($data) {
        $this->db->insert($this->_blogs, $data);
        return $this->db->insert_id();
    }

    public function get_all_blogs($user_id) {
        $this->db->select('blog.*, listing.company_name')
                ->from('dir_blogs as blog')
                ->join('dir_listing as listing', 'blog.listing_id = listing.listing_id')
                ->where('blog.user_id', $user_id)
                ->where('blog.deletion_status', 0)
                ->where('blog.publication_status', 1)
                ->order_by('blog.blog_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_blogs_by_user_id($user_id) {
        $result = $this->db->get_where($this->_blogs, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_blog_by_blog_id_and_user_id($user_id, $blog_id) {
        $result = $this->db->get_where($this->_blogs, array('user_id' => $user_id, 'blog_id' => $blog_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_blog_info($blog_id, $data) {
        $this->db->update($this->_blogs, $data, array('blog_id' => $blog_id));
        return $this->db->affected_rows();
    }

    public function remove_blog_by_id($blog_id) {
        $this->db->update($this->_blogs, array('deletion_status' => 1), array('blog_id' => $blog_id));
        return $this->db->affected_rows();
    }

}
