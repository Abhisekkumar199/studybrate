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

class Packages_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }
    
    private $_packages = 'dir_packages';


    public function get_all_packages_info(){
        $result = $this->db->order_by('price', 'desc')->get_where($this->_packages, array('publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }
    
}
