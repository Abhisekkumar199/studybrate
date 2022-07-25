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

class Images_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_images = 'dir_images';

    public function get_images_info() {
        $this->db->select('images.image_id, images.caption, images.image_path, images.date_added, images.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_images as images')
                ->join('dir_listing as listing', 'images.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('images.deletion_status', 0)
                ->order_by('images.image_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_image_by_image_id($image_id) {
        $result = $this->db->get_where($this->_images, array('image_id' => $image_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_image_by_id($image_id) {
        $this->db->update($this->_images, array('publication_status' => 1), array('image_id' => $image_id));
        return $this->db->affected_rows();
    }

    public function unpublished_image_by_id($image_id) {
        $this->db->update($this->_images, array('publication_status' => 0), array('image_id' => $image_id));
        return $this->db->affected_rows();
    }

    public function remove_image_by_id($image_id) {
        $this->db->update($this->_images, array('deletion_status' => 1), array('image_id' => $image_id));
        return $this->db->affected_rows();
    }

}
