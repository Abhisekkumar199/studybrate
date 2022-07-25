<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Reviews extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/Reviews_model', 'reviews_mdl');
    }

    public function index() 
    {
        $data = array();
        $data['title'] = 'Manage Reviews';
        
        $listing_ids = $this->reviews_mdl->get_listing_ids($this->session->userdata('user_id')); 
        $listing_ids2 = '';
        foreach ($listing_ids as $listing_id) 
        { 
            $listing_ids2 .=  $listing_id['listing_id'].",";  
        }
        $listing_ids = $catids = substr($listing_ids2, 0, -1); ; 
        $data['reviews_info'] = $this->reviews_mdl->get_reviews_info($listing_ids);
        
        $data['user_content'] = $this->load->view('directory_views/user/reviews/manage_reviews_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }
 

    public function store_review_details() 
    {
        $listing_id = $this->input->post('listing_id', TRUE);
        $data['name'] = $this->input->post('name', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['listing_id'] = $this->input->post('listing_id', TRUE);
        $data['rating'] = $this->input->post('rating', TRUE);
        $data['remarks'] = $this->input->post('remarks', TRUE);
        $data['date_added'] = date('Y-m-d H:i:s'); 
         
        $insert_id = $this->reviews_mdl->store_review_info($data);
        if (!empty($insert_id)) 
        {
            $sdata['success'] = '<div class="alert alert-success"> <strong>Success!</strong> Review added successfully. </div>. ';
            $this->session->set_userdata($sdata);
            redirect('teachers_listing/teacher_details/'.$listing_id, 'refresh');
        } 
        else 
        {
            $sdata['exception'] = 'Something went wrong!! Please try again.';
            $this->session->set_userdata($sdata);
            redirect('teachers_listing/teacher_details/'.$listing_id, 'refresh');
        }
        
    }

    public function published_review($review_id) 
    {
          $review_info = $this->reviews_mdl->get_review_by_review_id($review_id);
       
        if (!empty($review_info)) 
        {
            $result = $this->reviews_mdl->published_review_by_id($review_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/reviews', 'refresh');
        }
    }

    public function unpublished_review($review_id) 
    {
        $review_info = $this->reviews_mdl->get_review_by_review_id($review_id);
         
        if (!empty($review_info)) 
        {
            $result = $this->reviews_mdl->unpublished_review_by_id($review_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
        }
    }

    public function remove_review($review_id) 
    {
        $review_info = $this->reviews_mdl->get_review_by_review_id($review_id);
        if (!empty($review_info)) 
        {
            $result = $this->reviews_mdl->remove_review_by_id($review_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/reviews', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/reviews', 'refresh');
        }
    }
    
    
     
      
}
