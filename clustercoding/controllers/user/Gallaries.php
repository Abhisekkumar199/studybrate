<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Gallaries extends CC_Controller {

    public function __construct() 
    {
        parent::__construct(); 
        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) 
        {
            redirect('user/login', 'refresh');
        } 
        $this->load->model('user_models/Gallary_model', 'gallary_mdl');
    }

    public function index() 
    {
        $data = array();
        $data['title'] = 'Manage gallary';
        $data['gallary_info'] = $this->gallary_mdl->get_all_gallary($this->session->userdata('user_id'));
        
        $data['user_content'] = $this->load->view('directory_views/user/gallaries/manage_gallary_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_gallary() 
    { 
        $data = array();
        $data['listing_info'] = $this->gallary_mdl->get_all_listing($this->session->userdata('user_id'));
        if(!empty($data['listing_info'])) 
        {
            $data['title'] = 'Add gallary';
            $data['count_gallary'] = $this->gallary_mdl->count_all_gallary_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/gallaries/add_gallary_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } 
        else 
        {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_gallary_details() 
    {
        $config = array(
           
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        if (empty($_FILES['picture_name']['name'])) 
        {
            $this->form_validation->set_rules('picture_name', 'picture', 'required');
        }
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->add_gallary();
        } 
        else 
        { 
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');
            
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/company_gallary";  
                $tmp_name = $_FILES["picture_name"]["tmp_name"];
                $name = basename($_FILES["picture_name"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['image_path'] = $_FILES['picture_name']['name'];
            } 
            $insert_id = $this->gallary_mdl->store_gallary_info($data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'gallary add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/gallaries', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/gallaries/add_gallary', 'refresh');
            }
        }
    }

   

    public function edit_gallary($gallary_id = NULL) 
    {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['gallary_info'] = $this->gallary_mdl->get_gallary_by_gallary_id_and_user_id($user_id, $gallary_id);
        if (!empty($data['gallary_info'])) 
        {
            $data['title'] = 'Edit gallary';
            $data['listing_info'] = $this->gallary_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/gallaries/edit_gallary_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } 
        else 
        { 
            redirect('user/gallaries', 'refresh');
        }
    }

    public function update_gallary_details($gallary_id = NULL) 
    {
        $user_id = $this->session->userdata('user_id');
        $gallary_info = $this->gallary_mdl->get_gallary_by_gallary_id_and_user_id($user_id, $gallary_id);
        if ($gallary_id == NULL || empty($gallary_info)) {
            $sdata['exception'] = 'gallary not found !';
            $this->session->set_userdata($sdata);
            redirect('user/gallary', 'refresh');
        }
        $config = array(
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->edit_gallary($gallary_id);
        } 
        else 
        { 
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s'); 
            
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/company_gallary";  
                $tmp_name = $_FILES["picture_name"]["tmp_name"];
                $name = basename($_FILES["picture_name"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['image_path'] = $_FILES['picture_name']['name'];
            }

            $insert_id = $this->gallary_mdl->update_gallary_info($gallary_id, $data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'gallary update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/gallaries', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/gallaries/edit_gallary/' . $gallary_id, 'refresh');
            }
        }
    }
    
    public function remove_gallary($gallary_id = NULL) 
    {
        $user_id = $this->session->userdata('user_id');
        $gallary_info = $this->gallary_mdl->get_gallary_by_gallary_id_and_user_id($user_id, $gallary_id);
        if (!empty($gallary_info)) {
            $result = $this->gallary_mdl->remove_gallary_by_id($gallary_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/gallaries', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/gallaries', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/gallaries', 'refresh');
        }
    }
 

}
