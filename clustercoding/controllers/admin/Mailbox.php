<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends CC_Controller {
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
        //$this->load->model('admin_models/dashboard_model', 'dash_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Compose';
        $data['active_menu'] = 'mailbox';
        $data['active_sub_menu'] = 'compose_mail';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/mailbox/compose_mail_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function inbox_mail() {
        $data = array();
        $data['title'] = 'Inbox';
        $data['active_menu'] = 'mailbox';
        $data['active_sub_menu'] = 'inbox_mail';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/mailbox/inbox_mail_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function sent_mail() {
        $data = array();
        $data['title'] = 'Sent';
        $data['active_menu'] = 'mailbox';
        $data['active_sub_menu'] = 'sent_mail';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/mailbox/sent_mail_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function drafts_mail() {
        $data = array();
        $data['title'] = 'Drafts';
        $data['active_menu'] = 'mailbox';
        $data['active_sub_menu'] = 'drafts_mail';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/mailbox/drafts_mail_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

}
