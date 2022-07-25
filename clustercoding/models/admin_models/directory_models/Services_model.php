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

class Services_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_services = 'dir_services';

    public function get_services_info() {
        $this->db->select('services.service_id, services.service_name, services.image_path, services.date_added, services.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_services as services')
                ->join('dir_listing as listing', 'services.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('services.deletion_status', 0)
                ->order_by('services.service_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_service_by_service_id($service_id) {
        $result = $this->db->get_where($this->_services, array('service_id' => $service_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_service_by_id($service_id) {
        $this->db->update($this->_services, array('publication_status' => 1), array('service_id' => $service_id));
        return $this->db->affected_rows();
    }

    public function unpublished_service_by_id($service_id) {
        $this->db->update($this->_services, array('publication_status' => 0), array('service_id' => $service_id));
        return $this->db->affected_rows();
    }

    public function remove_service_by_id($service_id) {
        $this->db->update($this->_services, array('deletion_status' => 1), array('service_id' => $service_id));
        return $this->db->affected_rows();
    }

}
