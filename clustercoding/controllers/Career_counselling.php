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

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/Career_councelling_model', 'career_mdl');
       // $this->load->model('mailer_models/mailer_model', 'mail_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
    }

    public function index() 
    {
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu();  
        $data['title'] = 'Contact US';
        $data['main_content'] = $this->load->view('directory_views/careercouncelling/careercouncelling_v', $data, TRUE);
        $this->load->view('directory_views/header_new', $data);
    }

    public function add_student_query() 
    { 
            $data['student_name'] = $this->input->post('student_name', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['contact'] = $this->input->post('contact', TRUE);
            $data['class'] = $this->input->post('class', TRUE);
            $data['subject'] = $this->input->post('subject', TRUE);
            $data['location'] = $this->input->post('location', TRUE);
            $data['time_to_call'] = $this->input->post('time_to_call', TRUE);
            $data['student_details'] = $this->input->post('student_details', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s'); 
            $this->career_mdl->add_student_query_info($data); 
            
            /* --------------Start Send Contact Email------------ */
            //$mdata = array();
            //$mdata['from_address'] = $data['email_address'];
            //$mdata['to_address'] = $setting_info['email_address'];
            //$mdata['subject'] = $data['subject'];
            //$mdata['message'] = $data['message'];
            //$mdata['full_name'] = $data['full_name'];
            //$mdata['site_name'] = $setting_info['site_name'];
            //$mdata['web'] = $setting_info['web'];
            //$this->mail_mdl->sendEmail($mdata, 'basic_email');
            /* --------------End Send Contact Email------------ */
            $sdata = array();
            $sdata['success'] = "<div class='alert alert-success'><strong>Success!</strong> Thank you for your your response, Councalor will contact you with in 24 hours. </div>";
            $this->session->set_userdata($sdata);
            redirect('career_councelling', 'refresh'); 
    }

}
