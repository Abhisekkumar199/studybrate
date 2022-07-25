<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CC_Controller {
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
        // Load Model
        $this->load->model('admin_models/directory_models/subjects_model', 'sub_mdl'); 
    }

    

    //  get categoryList
	public function get_subject_list()
	{  
        $categoryId = $this->uri->segment(2);
        $subjectlist = $this->sub_mdl->get_subjects_list_categorywise($categoryId);   
        echo json_encode($subjectlist);
    }

    
}
