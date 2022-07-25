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

class Products_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_products = 'dir_products';

    public function get_products_info() {
        $this->db->select('products.product_id, products.product_name, products.image_path, products.date_added, products.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_products as products')
                ->join('dir_listing as listing', 'products.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('products.deletion_status', 0)
                ->order_by('products.product_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_product_by_product_id($product_id) {
        $result = $this->db->get_where($this->_products, array('product_id' => $product_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_product_by_id($product_id) {
        $this->db->update($this->_products, array('publication_status' => 1), array('product_id' => $product_id));
        return $this->db->affected_rows();
    }

    public function unpublished_product_by_id($product_id) {
        $this->db->update($this->_products, array('publication_status' => 0), array('product_id' => $product_id));
        return $this->db->affected_rows();
    }

    public function remove_product_by_id($product_id) {
        $this->db->update($this->_products, array('deletion_status' => 1), array('product_id' => $product_id));
        return $this->db->affected_rows();
    }

}
