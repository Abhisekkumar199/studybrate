<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/services_model', 'services_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Services';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'services';
        $data['active_sub_sub_menu'] = '';
        $data['services_info'] = $this->services_mdl->get_services_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/services/manage_services_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function published_service($service_id) {
        $service_info = $this->services_mdl->get_service_by_service_id($service_id);
        if (!empty($service_info)) {
            $result = $this->services_mdl->published_service_by_id($service_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/services', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/services', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/services', 'refresh');
        }
    }

    public function unpublished_service($service_id) {
        $service_info = $this->services_mdl->get_service_by_service_id($service_id);
        if (!empty($service_info)) {
            $result = $this->services_mdl->unpublished_service_by_id($service_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/services', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/services', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/services', 'refresh');
        }
    }

    public function remove_service($service_id) {
        $service_info = $this->services_mdl->get_service_by_service_id($service_id);
        if (!empty($service_info)) {
            $result = $this->services_mdl->remove_service_by_id($service_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/services', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/services', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/services', 'refresh');
        }
    }

}
