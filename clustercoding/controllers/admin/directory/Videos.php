<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/videos_model', 'videos_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Videos';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'videos';
        $data['active_sub_sub_menu'] = '';
        $data['videos_info'] = $this->videos_mdl->get_videos_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/videos/manage_videos_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function published_video($video_id) {
        $video_info = $this->videos_mdl->get_video_by_video_id($video_id);
        if (!empty($video_info)) {
            $result = $this->videos_mdl->published_video_by_id($video_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/videos', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/videos', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/videos', 'refresh');
        }
    }

    public function unpublished_video($video_id) {
        $video_info = $this->videos_mdl->get_video_by_video_id($video_id);
        if (!empty($video_info)) {
            $result = $this->videos_mdl->unpublished_video_by_id($video_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/videos', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/videos', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/videos', 'refresh');
        }
    }

    public function remove_video($video_id) {
        $video_info = $this->videos_mdl->get_video_by_video_id($video_id);
        if (!empty($video_info)) {
            $result = $this->videos_mdl->remove_video_by_id($video_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/videos', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/videos', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/videos', 'refresh');
        }
    }

}
