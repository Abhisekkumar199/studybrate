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

class Articles_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_articles = 'dir_articles';

    public function get_articles_info() {
        $this->db->select('articles.article_id, articles.article_name, articles.image_path, articles.date_added, articles.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_articles as articles')
                ->join('dir_listing as listing', 'articles.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('articles.deletion_status', 0)
                ->order_by('articles.article_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_article_by_article_id($article_id) {
        $result = $this->db->get_where($this->_articles, array('article_id' => $article_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_article_by_id($article_id) {
        $this->db->update($this->_articles, array('publication_status' => 1), array('article_id' => $article_id));
        return $this->db->affected_rows();
    }

    public function unpublished_article_by_id($article_id) {
        $this->db->update($this->_articles, array('publication_status' => 0), array('article_id' => $article_id));
        return $this->db->affected_rows();
    }

    public function remove_article_by_id($article_id) {
        $this->db->update($this->_articles, array('deletion_status' => 1), array('article_id' => $article_id));
        return $this->db->affected_rows();
    }

}
