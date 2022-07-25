<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CC_Controller {


    public function __construct() 
    {
        parent::__construct();
        $this->load->model('directory_models/search_model', 'search_mdl'); 
        $this->load->model('directory_models/categories_model', 'cat_mdl');
        $this->load->model('directory_models/home_model', 'home_mdl');
    }

    public function search_result() 
    {
        
        $data = array();
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['static_pages'] = $this->home_mdl->static_pages();
        
        $tutor_name = $this->input->post('tutor_name', TRUE);
        $keyword_name = $this->input->post('keyword_name', TRUE);
        $category_id = $this->input->post('category_id', TRUE);
        $sub_category = $this->input->post('sub_category', TRUE); 
         
        $city_id = $this->input->post('city_id', TRUE); 
        $result1 = $this->cat_mdl->getChildCategory($category_id);
        $result1 = $category_id.",".$result1;
        $catids = substr($result1, 0, -1); 
        
        $data['current_category'] = $category_id;
        $data['title'] = 'Search Result';
        $data['keyword'] = $keyword_name;
        $data['category'] = $category_id;
        $data['sub_category'] = $sub_category;
        $data['city'] = $city_id;
        $data['child_categories'] = $this->cat_mdl->get_child_categories_list($category_id);
        $data['search_result'] = $this->search_mdl->get_search_result($keyword_name, $catids,$sub_category, $city_id,$tutor_name);
        $data['results'] = sizeof($data['search_result']);
        $data['main_content'] = $this->load->view('directory_views/search/search_result', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }
    
    public function search_result_category_wise() 
    { 
         
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu();  
        $data['static_pages'] = $this->home_mdl->static_pages();
        
        $slug = $this->uri->segment(2);   
        
        $querycategory = $this->db->get_where("dir_categories",array("cat_slug"=>$slug));
        $datacat['category'] = $querycategory->result();  
        $category_id = $datacat['category'][0]->category_id; 
        
        $result1 = $this->cat_mdl->getChildCategory($category_id);
        $result1 = $category_id.",".$result1;
        $catids = substr($result1, 0, -1);  
        $data['current_category'] = $category_id;
        $data['child_categories'] = $this->cat_mdl->get_child_categories_list($category_id);
        
        $data['title'] = 'Search Result';
        $data['search_result'] = $this->search_mdl->get_search_result_category_wise($catids);
        //$data['results'] = sizeof($data['search_result']);
        
        $data['main_content'] = $this->load->view('directory_views/search/search_result', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }
    
    public function search_result_subject_wise() 
    { 
        
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['static_pages'] = $this->home_mdl->static_pages();
        
          $slug = $this->uri->segment(2);  
       
        $querysubject = $this->db->get_where("dir_subjects",array("subject_id"=>$slug));  
        $datacat['subject'] = $querysubject->result(); 
        $issubject = count($datacat['subject']);
        
        $category_id = $datacat['subject'][0]->category_id;  
        $data['current_category'] = $category_id;
        $data['child_categories'] = $this->cat_mdl->get_child_categories_list($category_id);
        $data['title'] = 'Search Result';
        $data['search_result'] = $this->search_mdl->get_search_result_subject_wise($slug);
        $data['results'] = sizeof($data['search_result']); 
        
        $data['main_content'] = $this->load->view('directory_views/search/search_result', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }
    
    public function tutorFilter($category_id = NULL) 
    {
        $catids = $this->input->post('category', TRUE);
        $cityids = $this->input->post('city', TRUE); 
        
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu();  
        $data['static_pages'] = $this->home_mdl->static_pages(); 
        $category_id = $this->input->post('parent_cat_id', TRUE);
        
        
        $data['current_category'] = $category_id;
        $data['catids'] = $catids;
        $data['cityids'] = $cityids;
        $data['child_categories'] = $this->cat_mdl->get_child_categories_list($category_id);
        
        $data['title'] = 'Search Result';
        $data['search_result'] = $this->search_mdl->get_search_result_with_filter($catids,$cityids);
        //$data['results'] = sizeof($data['search_result']);
        
        $data['main_content'] = $this->load->view('directory_views/search/search_result', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
         
    }

}
