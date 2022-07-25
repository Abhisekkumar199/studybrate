<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CC_Controller {
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
        // Check Login Status
        $this->user_login_authentication();
        // Load Model
        //$this->load->model('admin_models/directory_models/packages_model', 'cat_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Claim Business Request';
        $data['active_menu'] = 'request';
        $data['active_sub_menu'] = 'verification';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/requests/verification_business/manage_verification_request_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

}
