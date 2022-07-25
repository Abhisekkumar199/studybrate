<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CC_Controller {
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
        $data['title'] = 'Privacy and Policy';
        $data['main_content'] = $this->load->view('directory_views/privacy_policy/privacy_policy_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

}
