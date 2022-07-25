<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/articles_model', 'articles_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Articles';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'articles';
        $data['active_sub_sub_menu'] = '';
        $data['articles_info'] = $this->articles_mdl->get_articles_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/articles/manage_articles_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function published_article($article_id) {
        $article_info = $this->articles_mdl->get_article_by_article_id($article_id);
        if (!empty($article_info)) {
            $result = $this->articles_mdl->published_article_by_id($article_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/articles', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/articles', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/articles', 'refresh');
        }
    }

    public function unpublished_article($article_id) {
        $article_info = $this->articles_mdl->get_article_by_article_id($article_id);
        if (!empty($article_info)) {
            $result = $this->articles_mdl->unpublished_article_by_id($article_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/articles', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/articles', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/articles', 'refresh');
        }
    }

    public function remove_article($article_id) {
        $article_info = $this->articles_mdl->get_article_by_article_id($article_id);
        if (!empty($article_info)) {
            $result = $this->articles_mdl->remove_article_by_id($article_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/articles', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/articles', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/articles', 'refresh');
        }
    }

}
