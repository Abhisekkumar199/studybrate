<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CC_Controller {
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
       // $this->user_login_authentication();
        // Load Model
        $this->load->model('user_models/categories_model', 'cat_mdl'); 
    }

   
    //  get categoryList
	public function get_child_category()
	{  
        $parentid = $this->uri->segment(2);
        $categoryList = $this->cat_mdl->get_categories_info($parentid);   
        echo json_encode($categoryList);
    }
    

}
