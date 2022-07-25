<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Listing extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }
         
        $this->load->model('user_models/listing_model', 'listing_mdl');
        $this->load->model('admin_models/directory_models/subjects_model', 'sub_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Profile';
        $data['listing_info'] = $this->listing_mdl->get_all_listing($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/listing/manage_listing_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_listing() 
    {
        $data = array();
        $data['title'] = 'Add Profile';
        $data['count_listing'] = $this->listing_mdl->count_all_listing_by_user_id($this->session->userdata('user_id')); 
        $data['cities_info'] = $this->listing_mdl->get_all_cities();
        $data['categories_info'] = $this->cat_mdl->get_categories_info(0); 
            
        $data['user_content'] = $this->load->view('directory_views/user/listing/add_listing_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function store_company_details() 
    { 
        $subjectids = $this->input->post('subject', TRUE);
        for($z=0;$z<count($this->input->post('subject', TRUE));$z++)
        { 
           $subject = $this->sub_mdl->get_subject_by_subject_id($subjectids[$z]);  
           $subjects1 .=   ", ".$subject['subject_name'];
        }
        $subjects =  ltrim($subjects1,",");  
        
        $config = array(
            array(
                'field' => 'company_name',
                'label' => 'company name',
                'rules' => 'trim|required|max_length[100]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->add_listing();
        } 
        else 
        { 
            
            
            $data['company_name'] = $this->input->post('company_name', TRUE);
            $data['category_id'] = $this->input->post('subcat', TRUE);
            $data['subjects'] = $subjects;
            $data['subject_id'] = implode(', ',$this->input->post('subject', TRUE));
            $data['experiance'] = $this->input->post('experiance', TRUE);
            $data['vat_registration'] = $this->input->post('vat_registration', TRUE);
            $data['company_manager'] = $this->input->post('company_manager', TRUE);
            $data['type'] = $this->input->post('employees', TRUE); 
            
            $data['other_from'] = $this->input->post('other_from', TRUE);  
            $data['other_board'] = $this->input->post('other_board', TRUE); 
            $data['other_year'] = $this->input->post('other_year', TRUE);
            $data['twelve_from'] = $this->input->post('twelve_from', TRUE); 
            $data['twelve_board'] = $this->input->post('twelve_board', TRUE); 
            $data['twelve_year'] = $this->input->post('twelve_year', TRUE); 
            $data['graduation_from'] = $this->input->post('graduation_from', TRUE); 
            $data['graduation_collage'] = $this->input->post('graduation_collage', TRUE); 
            $data['graduation_year'] = $this->input->post('graduation_year', TRUE); 
            $data['post_graduation_from'] = $this->input->post('post_graduation_from', TRUE); 
            $data['post_graduation_collage'] = $this->input->post('post_graduation_collage', TRUE); 
            $data['post_graduation_year'] = $this->input->post('post_graduation_year', TRUE); 
            $data['is_hindi'] = $this->input->post('is_hindi', TRUE); 
            $data['is_english'] = $this->input->post('is_english', TRUE); 
            $data['taught_in_school'] = $this->input->post('taught_in_school', TRUE); 
            $data['demo_class'] = $this->input->post('demo_class', TRUE); 
            $data['demo_class_is_paid'] = $this->input->post('demo_class_is_paid', TRUE); 
            $data['proficiency_level'] = $this->input->post('proficiency_level', TRUE); 
            $data['gender'] = $this->input->post('gender', TRUE); 
            $data['student_age_group'] = $this->input->post('student_age_group', TRUE); 
            $data['fee'] = $this->input->post('fee', TRUE); 
            $data['taught_in_school_name'] = $this->input->post('taught_in_school_name', TRUE); 
            $data['class_location_student_home'] = $this->input->post('class_location_student_home', TRUE);   
            $data['class_location_tutor_home'] = $this->input->post('class_location_tutor_home', TRUE);   
            $data['online'] = $this->input->post('online', TRUE);   
            $data['mother_tongue'] = $this->input->post('mother_tongue', TRUE); 
            $data['boards'] = $this->input->post('boards', TRUE); 
            $data['cbse_board_subject'] = $this->input->post('cbse_board_subject', TRUE); 
            $data['icsc_board_subject'] = $this->input->post('icsc_board_subject', TRUE); 
            $data['other_board_subject'] = $this->input->post('other_board_subject', TRUE); 
            $data['title'] = $this->input->post('title', TRUE);  
            
            $data['about_company'] = $this->input->post('about_company', TRUE);
            $data['city_id'] = $this->input->post('city_id', TRUE);
            $data['state'] = $this->input->post('state', TRUE);
            $data['address'] = $this->input->post('address', TRUE);
            $data['zip'] = $this->input->post('zip', TRUE);
            $data['mobile'] = $this->input->post('mobile', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['award'] = $this->input->post('award', TRUE);
            $data['type_of_class'] = $this->input->post('type_of_class', TRUE);
            $data['website'] = $this->input->post('website', TRUE);
            $data['contact_person'] = $this->input->post('contact_person', TRUE); 
            $data['lat'] = $this->input->post('lat', TRUE);
            $data['lng'] = $this->input->post('lng', TRUE);   
            
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');
            
            if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/company_logo";  
                $tmp_name = $_FILES["company_logo"]["tmp_name"];
                $name = basename($_FILES["company_logo"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['company_logo'] = $_FILES['company_logo']['name'];
            }
            //if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) 
            //{
              //  $data['company_logo'] = $this->add_company_logo();
            //}

            $insert_id = $this->listing_mdl->store_company_info($data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'Congratulation!! Profile added successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/listing/add_listing', 'refresh');
            }
        }
    }


    public function edit_listing($listing_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['listing_info'] = $this->listing_mdl->get_listing_by_listing_id_and_user_id($user_id, $listing_id);
         $category = $data['listing_info']['category_id'];
          $user_subject_id = $data['listing_info']['subject_id']; 
         
        if (!empty($data['listing_info'])) 
        {
            $data['title'] = 'Edit Listing'; 
            $data['categories_info'] = $this->cat_mdl->get_categories_info(0); 
            
            $data['sub_categories_info'] = $this->cat_mdl->get_categories_info2($category); 
            
            $data['subjectlist'] = $this->sub_mdl->get_subjects_list_categorywise($category); 
            $data['cities_info'] = $this->listing_mdl->get_all_cities();
            
            $data['user_parent_category'] = $data['sub_categories_info'][0]['parent_id'];   
            $data['user_category'] = $category; 
            $data['user_subject'] = $user_subject_id; 
            $data['user_content'] = $this->load->view('directory_views/user/listing/edit_listing_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } 
        else 
        {
//            $sdata = array();
//            $sdata['exception'] = 'Listing not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/listing', 'refresh');
        }
    }

    public function update_company_details($listing_id = NULL) 
    { 
        $subjectids = $this->input->post('subject', TRUE);
        for($z=0;$z<count($this->input->post('subject', TRUE));$z++)
        { 
           $subject = $this->sub_mdl->get_subject_by_subject_id($subjectids[$z]);  
           $subjects1 .=   ", ".$subject['subject_name'];
        }
        $subjects =  ltrim($subjects1,",");  
        
        $user_id = $this->session->userdata('user_id');
        $listing_info = $this->listing_mdl->get_listing_by_listing_id_and_user_id($user_id, $listing_id);
        
        if ($listing_id == NULL || empty($listing_info)) 
        {
            $sdata['exception'] = 'Profile not found !';
            $this->session->set_userdata($sdata);
            redirect('user/listing', 'refresh');
        }
        $config = array(
            array(
                'field' => 'company_name',
                'label' => 'company name',
                'rules' => 'trim|required|max_length[100]'
            ) 
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        { 
            $this->edit_listing($listing_id);
        } 
        else 
        { 
            $data['company_name'] = $this->input->post('company_name', TRUE);
            $data['category_id'] = $this->input->post('subcat', TRUE);
            $data['subject_id'] = implode(', ',$this->input->post('subject', TRUE));
            $data['subjects'] = $subjects;
            $data['experiance'] = $this->input->post('experiance', TRUE);
            $data['vat_registration'] = $this->input->post('vat_registration', TRUE);
            $data['company_manager'] = $this->input->post('company_manager', TRUE);
            $data['type'] = $this->input->post('employees', TRUE); 

            
            $data['other_from'] = $this->input->post('other_from', TRUE);  
            $data['other_board'] = $this->input->post('other_board', TRUE); 
            $data['other_year'] = $this->input->post('other_year', TRUE); 
            $data['twelve_from'] = $this->input->post('twelve_from', TRUE); 
            $data['twelve_board'] = $this->input->post('twelve_board', TRUE); 
            $data['twelve_year'] = $this->input->post('twelve_year', TRUE); 
            $data['graduation_from'] = $this->input->post('graduation_from', TRUE); 
            $data['graduation_collage'] = $this->input->post('graduation_collage', TRUE); 
            $data['graduation_year'] = $this->input->post('graduation_year', TRUE); 
            $data['post_graduation_from'] = $this->input->post('post_graduation_from', TRUE); 
            $data['post_graduation_collage'] = $this->input->post('post_graduation_collage', TRUE); 
            $data['post_graduation_year'] = $this->input->post('post_graduation_year', TRUE); 
            $data['is_hindi'] = $this->input->post('is_hindi', TRUE); 
            $data['is_english'] = $this->input->post('is_english', TRUE); 
            $data['taught_in_school'] = $this->input->post('taught_in_school', TRUE); 
            $data['demo_class'] = $this->input->post('demo_class', TRUE); 
            $data['demo_class_is_paid'] = $this->input->post('demo_class_is_paid', TRUE); 
            $data['proficiency_level'] = $this->input->post('proficiency_level', TRUE); 
            $data['gender'] = $this->input->post('gender', TRUE); 
            $data['student_age_group'] = $this->input->post('student_age_group', TRUE); 
            $data['fee'] = $this->input->post('fee', TRUE); 
            $data['taught_in_school_name'] = $this->input->post('taught_in_school_name', TRUE); 
            $data['class_location_student_home'] = $this->input->post('class_location_student_home', TRUE);   
            $data['class_location_tutor_home'] = $this->input->post('class_location_tutor_home', TRUE);   
            $data['online'] = $this->input->post('online', TRUE);   
            $data['mother_tongue'] = $this->input->post('mother_tongue', TRUE); 
            $data['boards'] = $this->input->post('boards', TRUE); 
            $data['cbse_board_subject'] = $this->input->post('cbse_board_subject', TRUE); 
            $data['icsc_board_subject'] = $this->input->post('icsc_board_subject', TRUE); 
            $data['other_board_subject'] = $this->input->post('other_board_subject', TRUE); 
            $data['title'] = $this->input->post('title', TRUE);  




            $data['about_company'] = $this->input->post('about_company', TRUE);
            $data['city_id'] = $this->input->post('city_id', TRUE);
            $data['state'] = $this->input->post('state', TRUE);
            $data['address'] = $this->input->post('address', TRUE);
            $data['zip'] = $this->input->post('zip', TRUE);
            $data['mobile'] = $this->input->post('mobile', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['award'] = $this->input->post('award', TRUE);
            $data['type_of_class'] = $this->input->post('type_of_class', TRUE);
            $data['website'] = $this->input->post('website', TRUE);
            $data['contact_person'] = $this->input->post('contact_person', TRUE); 
            $data['lat'] = $this->input->post('lat', TRUE);
            $data['lng'] = $this->input->post('lng', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s'); 
           
            if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/company_logo";  
                $tmp_name = $_FILES["company_logo"]["tmp_name"];
                $name = basename($_FILES["company_logo"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['company_logo'] = $_FILES['company_logo']['name'];
            }

            $result = $this->listing_mdl->update_company_info($listing_id, $data);
            if (!empty($result)) {
                $sdata['success'] = 'Profile update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/listing', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/listing/edit_listing/' . $listing_id, 'refresh');
            }
        }
    }

    
    public function remove_listing($listing_id= NULL) {
        
        //echo "hhh";
        //die();
        $result = $this->listing_mdl->delete_listing($listing_id);
        
        $sdata['success'] = 'Profile deleted successfully. ';
       $this->session->set_userdata($sdata);
        redirect('user/listing', 'refresh');
    }
    
    
    public function add_company_logo() {
        if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('company_logo')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/listing/add_listing', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $company_logo = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->logo_resize($path, $file);
                return $company_logo;
            }
        }
    }

    public function logo_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_logo/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
        return TRUE;
    }
    
    public function update_company_logo($listing_id) 
    {
        $current_logo = $this->input->post('current_logo', TRUE);
        if (isset($_FILES['company_logo']['name']) && !empty($_FILES['company_logo']['name'])) 
        {
            $config['upload_path'] = './assets/uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config); 
            
            if (!$this->upload->do_upload('company_logo')) 
            {
                $sdata['exception'] = $this->upload->display_errors();
                print_r($sdata['exception']);
                die();
                $this->session->set_userdata($sdata);
                redirect('user/listing/edit_listing/' . $listing_id, 'refresh');
            }
            $fdata = $this->upload->data();
            $company_logo = $fdata['file_name']; 
            return $company_logo;
            //else 
            //{
            //    $fdata = $this->upload->data();
            //    $company_logo = $fdata['file_name'];
            //    $data = array('upload_data' => $this->upload->data());
            //    $path = $data['upload_data']['full_path'];
            //    $file = $data['upload_data']['file_name'];
            //    $this->update_logo_resize($path, $file, $listing_id);
            //    if (!empty($current_logo)) {
            //       unlink('assets/uploaded_files/company_logo/' . $current_logo);
            //        unlink('assets/uploaded_files/company_logo/resize/' . $current_logo);
            //    }
            //    return $company_logo;
            //}
        } 
        else 
        {
            return $current_logo;
        }
    }

    public function update_logo_resize($path, $file, $listing_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_logo/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/listing/edit_listing/' . $listing_id, 'refresh');
        }
        return TRUE;
    }

}
