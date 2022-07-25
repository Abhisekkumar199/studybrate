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

class Career_counselling_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_reviews = 'dir_career_councelling';

    public function get_counselling_info() {
        $this->db->select('*')
                ->from('dir_career_councelling')  
                ->order_by('career_councelling_id', 'desc');
        $query_result = $this->db->get();
        //echo $this->db->last_query();
        //die();
        $result = $query_result->result_array();
        return $result;
    }

    

}
