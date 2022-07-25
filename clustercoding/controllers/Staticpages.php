<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staticpages extends CC_Controller {
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
        $this->load->model('directory_models/categories_model', 'cat_mdl');
        $this->load->model('directory_models/Staticpages_model', 'static_mdl');
        $this->load->model('directory_models/home_model', 'home_mdl');
    }

    public function index() {
        
        $slug = $this->uri->segment(2); 
        $data = array();  
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['title'] = 'Pages';
        $data['page_info'] = $this->static_mdl->get_page_info($slug);
        $data['static_pages'] = $this->home_mdl->static_pages();
        
        $data['main_content'] = $this->load->view('directory_views/staticpages/staticpages', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }

}
