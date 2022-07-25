<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career_counselling extends CC_Controller {
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

    public function __construct() 
    {
        parent::__construct();
        // Check Login Status
        $this->user_login_authentication();
        // Load Model
        $this->load->model('admin_models/directory_models/career_counselling_model', 'career_mdl');
    }

    public function index() 
    {  
        $data = array();
        $data['title'] = 'Manage Career Counselling';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'reviews';
        $data['active_sub_sub_menu'] = '';
        $data['career_info'] = $this->career_mdl->get_counselling_info();
         
        
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/career/manage_career_counselling_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function published_review($review_id) {
        $review_info = $this->career_mdl->get_review_by_review_id($review_id);
        if (!empty($review_info)) 
        {
            $result = $this->career_mdl->published_review_by_id($review_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/reviews/'.$review_id, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/reviews/'.$review_id, 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/reviews/'.$review_id, 'refresh');
        }
    }

    public function unpublished_review($review_id) 
    {
        $review_info = $this->career_mdl->get_review_by_review_id($review_id);
         
        if (!empty($review_info)) 
        {
            $result = $this->career_mdl->unpublished_review_by_id($review_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/reviews/'.$review_id, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/reviews/'.$review_id, 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/reviews/'.$review_id, 'refresh');
        }
    }

    public function remove_review($review_id) 
    {
        $review_info = $this->career_mdl->get_review_by_review_id($review_id);
        if (!empty($review_info)) 
        {
            $result = $this->career_mdl->remove_review_by_id($review_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/reviews/'.$review_id, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/reviews/'.$review_id, 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/reviews/'.$review_id, 'refresh');
        }
    }

}
