<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Questions extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/Questions_model', 'questions_mdl');
    }

    public function index() 
    { 
        $data = array();
        $data['title'] = 'Manage Questions';
        
        $listing_ids = $this->questions_mdl->get_listing_ids($this->session->userdata('user_id')); 
        $listing_ids2 = '';
        foreach ($listing_ids as $listing_id) 
        { 
            $listing_ids2 .=  $listing_id['listing_id'].",";  
        }
        $listing_ids = $catids = substr($listing_ids2, 0, -1);  
        $data['questions_info'] = $this->questions_mdl->get_questions_info($listing_ids);
         
        $data['user_content'] = $this->load->view('directory_views/user/questions/manage_questions_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }
 

    public function store_question_details() 
    { 
        $listing_id = $this->input->post('listing_id', TRUE);
        $data['listing_id'] = $listing_id;
        $data['name'] = $this->input->post('name_Question', TRUE);
        $data['email'] = $this->input->post('email_Question', TRUE);
        $data['question'] = $this->input->post('Question_text', TRUE);  
        $data['date_added'] = date('Y-m-d H:i:s'); 
        
        $insert_id = $this->questions_mdl->store_question_info($data);
        if (!empty($insert_id)) 
        {
            $sdata['success'] = '<div class="alert alert-success"><strong>Success!</strong> Your query has been submitted successfully. </div>';
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

    public function published_question($question_id) 
    {
          $question_info = $this->questions_mdl->get_question_by_question_id($question_id);
       
        if (!empty($question_info)) 
        {
            $result = $this->questions_mdl->published_question_by_id($question_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/questions', 'refresh');
        }
    }

    public function unpublished_question($question_id) 
    {
        $question_info = $this->questions_mdl->get_question_by_question_id($question_id);
         
        if (!empty($question_info)) 
        {
            $result = $this->questions_mdl->unpublished_question_by_id($question_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
        }
    }

    public function remove_question($question_id) 
    {
        $question_info = $this->questions_mdl->get_question_by_question_id($question_id);
        if (!empty($question_info)) 
        {
            $result = $this->questions_mdl->remove_question_by_id($question_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/questions', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/questions', 'refresh');
        }
    }
  
    public function reply($question_id) 
    {
        $data = array(); 
        $data['question_id'] = $question_id;  
        
        $question_info = $this->questions_mdl->get_question_by_question_id($question_id);
        
        $data['question'] = $question_info['question'];
        $data['user_content'] = $this->load->view('directory_views/user/questions/reply_question_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
        
    }
    
    public function reply_process($question_id) 
    {
        $data = array(); 
        $question_id = $this->input->post('question_id', TRUE);
        $data['answer'] = $this->input->post('answer', TRUE);
        $question_info = $this->questions_mdl->reply_answer($data,$question_id); 
        $sdata['success'] = 'Answer added successfully.';
        $this->session->set_userdata($sdata);
        redirect('user/questions', 'refresh');
    }
      
}
