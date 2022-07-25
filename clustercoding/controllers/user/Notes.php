<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Notes extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/Notes_model', 'notes_mdl');
    }

    public function index() 
    {
        $data = array();
        $data['title'] = 'Manage Notes';
        $data['notes_info'] = $this->notes_mdl->get_all_notes($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/notes/manage_notes_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_notes() 
    {
        $data = array();
        $data['listing_info'] = $this->notes_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) 
        {
            $data['title'] = 'Add note';
            $data['count_notes'] = $this->notes_mdl->count_all_notes_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/notes/add_note_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } 
        else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_note_details() 
    {
        $config = array(
            array(
                'field' => 'note_name',
                'label' => 'note name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'note_details',
                'label' => 'note details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->add_notes();
        } 
        else 
        {
            $data['note_name'] = $this->input->post('note_name', TRUE);
            $data['note_details'] = $this->input->post('note_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id'); 
            
            $insert_id = $this->notes_mdl->store_note_info($data);
            
            $picture_name=$_FILES["picture_name"];  
            if($picture_name["name"][0]!="")
            { 
                for($i=0;$i<count($picture_name["name"]);$i++)
                { 
                    $uploads_dir = "./assets/uploaded_files/company_notes";  
                    $tmp_name = $_FILES["picture_name"]["tmp_name"][$i];
                    $name = basename($_FILES["picture_name"]["name"][$i]);
                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    $image_data['image_path'] = $_FILES['picture_name']['name'][$i]; 
                    $a = $_FILES['picture_name']['name'][$i];     
        			 
    	            $event_image_data['notes_id'] = $insert_id;
    	            $event_image_data['image'] = $a; 
                    $this->notes_mdl->insert_notes_image($event_image_data); 
                }
            }  
            
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'note add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/notes', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/notes/add_notes', 'refresh');
            }
        }
    }

     
    public function edit_note($note_id = NULL) 
    {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['note_info'] = $this->notes_mdl->get_note_by_note_id_and_user_id($user_id, $note_id);
        if (!empty($data['note_info'])) 
        {
            $data['title'] = 'Edit note';
            $data['listing_info'] = $this->notes_mdl->get_all_listing($user_id);
            $data['notes_images'] = $this->notes_mdl->get_all_notes_images($note_id);
            $data['user_content'] = $this->load->view('directory_views/user/notes/edit_note_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } 
        else 
        { 
            redirect('user/notes', 'refresh');
        }
    }

    public function update_note_details($note_id = NULL) 
    {
        $user_id = $this->session->userdata('user_id');
        $notes_info = $this->notes_mdl->get_note_by_note_id_and_user_id($user_id, $note_id);
        if ($note_id == NULL || empty($notes_info)) {
            $sdata['exception'] = 'note not found !';
            $this->session->set_userdata($sdata);
            redirect('user/notes', 'refresh');
        }
        $config = array(
            array(
                'field' => 'note_name',
                'label' => 'note name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'note_details',
                'label' => 'note details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->edit_note($note_id);
        } 
        else 
        {
            $data['note_name'] = $this->input->post('note_name', TRUE);
            $data['note_details'] = $this->input->post('note_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s'); 
             
            $insert_id = $this->notes_mdl->update_note_info($note_id, $data);
            
            $picture_name=$_FILES["picture_name"];  
            if($picture_name["name"][0]!="")
            { 
                for($i=0;$i<count($picture_name["name"]);$i++)
                { 
                    $uploads_dir = "./assets/uploaded_files/company_notes";  
                    $tmp_name = $_FILES["picture_name"]["tmp_name"][$i];
                    $name = basename($_FILES["picture_name"]["name"][$i]);
                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    $image_data['image_path'] = $_FILES['picture_name']['name'][$i]; 
                    $a = $_FILES['picture_name']['name'][$i];     
        			 
    	            $event_image_data['notes_id'] = $note_id;
    	            $event_image_data['image'] = $a; 
                    $this->notes_mdl->insert_notes_image($event_image_data); 
                }
            }  
            
            
            if (!empty($insert_id)) {
                $sdata['success'] = 'note update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/notes', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/notes/edit_note/' . $note_id, 'refresh');
            }
        }
    }
    
    public function remove_note($note_id = NULL) 
    {
        $user_id = $this->session->userdata('user_id');
        $note_info = $this->notes_mdl->get_note_by_note_id_and_user_id($user_id, $note_id);
        if (!empty($note_info)) {
            $result = $this->notes_mdl->remove_note_by_id($note_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/notes', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/notes', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/notes', 'refresh');
        }
    }

     

}
