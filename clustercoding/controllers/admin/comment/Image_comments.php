<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image_comments extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/comment_models/image_comments_model', 'img_comm_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Image Comments';
        $data['active_menu'] = 'comments';
        $data['active_sub_menu'] = 'image_comments';
        $data['active_sub_sub_menu'] = '';
        $data['comments_info'] = $this->img_comm_mdl->get_image_comments_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/comments/manage_image_comments_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }
    
    public function published_comment($comment_id) {
        $comment_info = $this->img_comm_mdl->get_comment_by_comment_id($comment_id);
        if (!empty($comment_info)) {
            $result = $this->img_comm_mdl->published_comment_by_id($comment_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/comments/image_comments', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/comments/image_comments', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/comments/image_comments', 'refresh');
        }
    }

    public function unpublished_comment($comment_id) {
        $comment_info = $this->img_comm_mdl->get_comment_by_comment_id($comment_id);
        if (!empty($comment_info)) {
            $result = $this->img_comm_mdl->unpublished_comment_by_id($comment_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/comments/image_comments', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/comments/image_comments', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/comments/image_comments', 'refresh');
        }
    }
    
    public function remove_comment($comment_id) {
        $comment_info = $this->img_comm_mdl->get_comment_by_comment_id($comment_id);
        if (!empty($comment_info)) {
            $result = $this->img_comm_mdl->remove_comment_by_id($comment_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/comments/image_comments', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/comments/image_comments', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/comments/image_comments', 'refresh');
        }
    }

}
