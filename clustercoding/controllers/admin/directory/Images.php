<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/images_model', 'images_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Images';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'images';
        $data['active_sub_sub_menu'] = '';
        $data['images_info'] = $this->images_mdl->get_images_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/images/manage_images_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function published_image($image_id) {
        $image_info = $this->images_mdl->get_image_by_image_id($image_id);
        if (!empty($image_info)) {
            $result = $this->images_mdl->published_image_by_id($image_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/images', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/images', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/images', 'refresh');
        }
    }

    public function unpublished_image($image_id) {
        $image_info = $this->images_mdl->get_image_by_image_id($image_id);
        if (!empty($image_info)) {
            $result = $this->images_mdl->unpublished_image_by_id($image_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/images', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/images', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/images', 'refresh');
        }
    }

    public function remove_image($image_id) {
        $image_info = $this->images_mdl->get_image_by_image_id($image_id);
        if (!empty($image_info)) {
            $result = $this->images_mdl->remove_image_by_id($image_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/images', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/images', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/images', 'refresh');
        }
    }

}
