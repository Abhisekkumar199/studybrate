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

class Subscribers_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_subs = 'dir_subscribers';

    public function get_subscribers_info() {
        $result = $this->db->get_where($this->_subs, array('deletion_status' => 0));
        return $result->result_array();
    }
    
    public function get_subscriber_by_subscriber_id($subscriber_id){
        $result = $this->db->get_where($this->_subs, array('subscriber_id' => $subscriber_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function remove_subscriber_by_id($subscriber_id) {
        $this->db->update($this->_subs, array('deletion_status' => 1), array('subscriber_id' => $subscriber_id));
        return $this->db->affected_rows();
    }

}
