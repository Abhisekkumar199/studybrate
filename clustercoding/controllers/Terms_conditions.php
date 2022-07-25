<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_conditions extends CC_Controller {
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

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['title'] = 'Terms and Conditions';
        $data['main_content'] = $this->load->view('directory_views/terms_conditions/terms_conditions_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
