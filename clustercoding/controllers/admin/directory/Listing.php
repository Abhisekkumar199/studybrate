<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/listing_model', 'listing_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Listing';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'listing';
        $data['active_sub_sub_menu'] = '';
        $data['listing_info'] = $this->listing_mdl->get_listing_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/listing/manage_listing_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function vrified_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->vrified_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Verified successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }

    public function unvrified_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->unvrified_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unvrified successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }
    
    public function published_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->published_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }

    public function unpublished_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->unpublished_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }
    
    public function featured_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->featured_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Featured successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }
    
    public function unfeatured_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->unfeatured_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unfeatured successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }

    public function remove_listing($listing_id) {
        $listing_info = $this->listing_mdl->get_listing_by_listing_id($listing_id);
        if (!empty($listing_info)) {
            $result = $this->listing_mdl->remove_listing_by_id($listing_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing', 'refresh');
        }
    }

}
