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

class Paidstatus_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';

  

    public function get_status_by_listing_id($listing_id) {
        $result = $this->db->get_where($this->_listing, array('listing_id' => $listing_id));
        return $result->row_array();
    }

    public function update_status_by_listing_id($listing_id, $data) {
        $this->db->update($this->_listing, $data, array('listing_id' => $listing_id));
        return $this->db->affected_rows();
    }

}
