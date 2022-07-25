<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/subscribers_model', 'subs_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Subscribers';
        $data['active_menu'] = 'subscribers';
        $data['active_sub_menu'] = '';
        $data['active_sub_sub_menu'] = '';
        $data['subscribers_info'] = $this->subs_mdl->get_subscribers_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/subscribers/manage_subscribers_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }
    
    public function remove_subscriber($subscriber_id) {
        $subscriber_info = $this->subs_mdl->get_subscriber_by_subscriber_id($subscriber_id);
        if (!empty($subscriber_info)) {
            $result = $this->subs_mdl->remove_subscriber_by_id($subscriber_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/subscribers', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/subscribers', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/subscribers', 'refresh');
        }
    }

}
