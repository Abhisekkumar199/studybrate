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

    private $_subscribers = 'dir_subscribers';
    
    public function store_subscriber($data) {
        $this->db->insert($this->_subscribers, $data);
        return $this->db->insert_id();
    }

}
