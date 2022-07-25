<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CC_Controller {
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
        $this->load->model('admin_models/dashboard_model', 'dash_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['active_menu'] = 'dashboard';
        $data['active_sub_menu'] = '';
        $data['active_sub_sub_menu'] = '';
        $data['total_listing'] = $this->dash_mdl->count_total_listing();
        $data['total_users'] = $this->dash_mdl->count_total_users();
        $data['total_categories'] = $this->dash_mdl->count_total_categories();
        $data['total_cities'] = $this->dash_mdl->count_total_cities();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/dashboard/dashboard_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

}
