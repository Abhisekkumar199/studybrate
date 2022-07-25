<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/home_model', 'home_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
        $this->load->model('admin_models/directory_models/subjects_model', 'sub_mdl');
    }

    public function index() 
    {
        $data = array();
        $data['title'] = 'Home'; 
        
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        
        // get top category
        $data['categories_info2'] = $this->cat_mdl->get_categories_info(0);
        
        
        // getting all featured category listiing
        
        $result1 = $this->cat_mdl->getChildCategory(27);
        $result1 = "27".",".$result1;
        $catids_tution = substr($result1, 0, -1);  
        
        $data['featured_listing_tution'] = $this->home_mdl->get_featured_listing_tution($catids_tution);
        
        $result2 = $this->cat_mdl->getChildCategory(28);
        $result2 = "28".",".$result2;
        $catids_institute = substr($result2, 0, -1);  
        $data['featured_listing_institute'] = $this->home_mdl->get_featured_listing_institute($catids_institute);
        
        $result3 = $this->cat_mdl->getChildCategory(29);
        $result3 = "29".",".$result3;
        $catids_collage = substr($result3, 0, -1); 
        $data['featured_listing_collage'] = $this->home_mdl->get_featured_listing_collage($catids_collage);
        
        $result4 = $this->cat_mdl->getChildCategory(17);
        $result4 = "17".",".$result4;
        $catids_comp_exam = substr($result4, 0, -1); 
        $data['featured_listing_comp_exam'] = $this->home_mdl->get_featured_listing_comp_exam($catids_comp_exam);
        
        $result5 = $this->cat_mdl->getChildCategory(16);
        $result5 = "16".",".$result5;
        $catids_itcourses = substr($result5, 0, -1); 
        $data['featured_listing_itcourses'] = $this->home_mdl->get_featured_listing_itcourses($catids_itcourses);
        
        $result6 = $this->cat_mdl->getChildCategory(18);
        $result6 = "18".",".$result6;
        $catids_language = substr($result6, 0, -1);
        $data['featured_listing_language'] = $this->home_mdl->get_featured_listing_language($catids_language);
        
        $result7 = $this->cat_mdl->getChildCategory(19);
        $result7 = "19".",".$result7;
        $catids_studyabroad = substr($result7, 0, -1);
        $data['featured_listing_studyabroad'] = $this->home_mdl->get_featured_listing_studyabroad($catids_studyabroad);
        
        $result8 = $this->cat_mdl->getChildCategory(21);
        $result8 = "21".",".$result8;
        $catids_hobbies = substr($result8, 0, -1);
        $data['featured_listing_hobbies'] = $this->home_mdl->get_featured_listing_hobbies($catids_hobbies);
        
        $data['static_pages'] = $this->home_mdl->static_pages();
        

        $data['total_listing'] = $this->home_mdl->count_total_listing();
        $data['total_location'] = $this->home_mdl->count_total_city();
        $data['total_product'] = $this->home_mdl->count_total_product();
        $data['total_article'] = $this->home_mdl->count_total_article(); 
        
        
        $data['subject_info'] = $this->sub_mdl->get_subjects_info(0);
        
        $data['featured_listing'] = $this->home_mdl->get_featured_listing(); 
        $data['qa']=$this->home_mdl->get_qa(); 
        $data['main_content'] = $this->load->view('directory_views/home_content', $data, TRUE);
        $this->load->view('directory_views/home_page_schema', $data);
    }
    public function ask_q()
    {
        $data['name']= $this->input->post('name', TRUE);
        $data['city']= $this->input->post('city', TRUE);
        $data['phone']= $this->input->post('mobile', TRUE);
        $data['email']= $this->input->post('email', TRUE);
        $data['class']= $this->input->post('class', TRUE);
        $data['subject']= $this->input->post('subject', TRUE);
        $data['question']= $this->input->post('question', TRUE);
        
        $insert_q = $this->home_mdl->insert_q($data);
        if(!empty($insert_q))
        {
            $this->session->set_flashdata('in',1);
            redirect(); 
        }
        else 
        {
            $this->session->set_flashdata('in',1);
            redirect();
        }
    }
    public function ans_q()
    {
        $data['qid']= $this->input->post('qid', TRUE);
        $data['user']= $this->input->post('uid', TRUE);
        $data['content']= $this->input->post('answer', TRUE);
        $insert_q = $this->home_mdl->insert_a($data);
        if(!empty($insert_q))
        {
            $this->session->set_flashdata('in',1);
            redirect('user/dashboard', 'refresh'); 
        }
        else 
        {
            $this->session->set_flashdata('in',1);
            redirect();
        }
    }


}
