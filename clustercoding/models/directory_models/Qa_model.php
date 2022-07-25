<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Qa_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_hearts = 'dir_article_hearts';
    private $_comments = 'dir_article_comments';
    private $_bookmarks = 'dir_bookmarks';
    private $_cat = 'dir_categories';
    private $_cities = 'dir_cities';
    private $_articles = 'dir_articles';

    public function get_all_qa() {
        $this->db->select('articles.*, cat.category_name, cities.city_name, listing.company_name, listing.state, listing.address, listing.zip')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.deletion_status', 0)
                ->where('articles.publication_status', 1)
                ->limit(30)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }


}
