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
        $this->user_login_authentication();
        // Load Model
        $this->load->model('admin_models/directory_models/subjects_model', 'sub_mdl');
        $this->load->model('admin_models/directory_models/categories_model', 'cat_mdl');
    }

    public function index() {
        $data = array();
        $category = $this->input->get('category', TRUE); 
        if($category < 1)
        {
            $category = 0;
        } 

        $data['title'] = 'Manage Subject';
        $data['active_menu'] = 'subject';
        $data['active_sub_menu'] = 'subjects';
        $data['active_sub_sub_menu'] = '';
        $data['categories_info'] = $this->cat_mdl->get_categories_info($category);
        $data['subject_info'] = $this->sub_mdl->get_subjects_info($category);
        $data['category'] = $category;
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/subjects/manage_subject_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    //  get categoryList
	public function get_subject_list()
	{  
        $categoryId = $this->uri->segment(2);
        $subjectlist = $this->sub_mdl->get_subjects_list_categorywise($categoryId);   
        echo json_encode($subjectlist);
    }

    public function add_subject() {
        $data = array();
        $data['title'] = 'Add Subject';
        $data['active_menu'] = 'subject';
        $data['active_sub_menu'] = 'subjects';
        $data['active_sub_sub_menu'] = ''; 
        $data['categories_info'] = $this->cat_mdl->get_categories_info(0); 
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/subjects/add_subject_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_subject() {
        $config = array(
            array(
                'field' => 'subject_name',
                'label' => 'subject name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'description',
                'label' => 'subject description',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'color_name',
                'label' => 'category  ',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'publication_status',
                'label' => 'publication status',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->add_subject();
        } 
        else 
        { 
            $categoryid = $this->input->post('parent_category', TRUE);
            $data['subject_name'] = $this->input->post('subject_name', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['category_id'] = $this->input->post('subcat', TRUE); 
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->sub_mdl->store_subject($data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects?category='.$categoryid, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects?category='.$categoryid, 'refresh');
            }
        }
    }

    public function published_subject($subject_id) 
    {
        $subject_info = $this->sub_mdl->get_subject_by_subject_id($subject_id);
        if (!empty($subject_info)) 
        {
            $result = $this->sub_mdl->published_subject_by_id($subject_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/subjects', 'refresh');
        }
    }

    public function unpublished_subject($subject_id) 
    {
        $subject_info = $this->sub_mdl->get_subject_by_subject_id($subject_id);
        if (!empty($subject_info)) 
        {
            $result = $this->sub_mdl->unpublished_subject_by_id($subject_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/subjects', 'refresh');
        }
    }

    public function edit_subject($subject_id) 
    {
        $data = array();
        $data['subject_info'] = $this->sub_mdl->get_subject_by_subject_id($subject_id);
        if (!empty($data['subject_info'])) 
        {
            $data['title'] = 'Edit Subject';
            $data['active_menu'] = 'subject';
            $data['active_sub_menu'] = 'subjects';
            $data['active_sub_sub_menu'] = '';
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/categories/edit_subject_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/subjects', 'refresh');
        }
    }

    public function update_subject($subject_id) 
    {
        $subject_info = $this->sub_mdl->get_subject_by_subject_id($subject_id);
        if (!empty($subject_info)) 
        {
            $config = array(
                array(
                    'field' => 'subject_name',
                    'label' => 'subject name',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'description',
                    'label' => 'description',
                    'rules' => 'trim|required|max_length[250]'
                ),
                array(
                    'field' => 'category',
                    'label' => 'category',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'publication_status',
                    'label' => 'publication status',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) 
            {
                $this->edit_subject($subject_id);
            } 
            else 
            {
                $data['subject_name'] = $this->input->post('subject_name', TRUE);
                $data['description'] = $this->input->post('description', TRUE); 
                $data['category_id'] = $this->input->post('category', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');

                $result = $this->sub_mdl->update_subject($subject_id, $data);
                if (!empty($result)) 
                {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/subjects', 'refresh');
                } 
                else 
                {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/subjects', 'refresh');
                }
            }
        }
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/subjects', 'refresh');
        }
    }

    public function remove_subject($subject_id) 
    {
        $subject_info = $this->sub_mdl->get_subject_by_subject_id($subject_id);
        if (!empty($subject_info)) 
        {
            $result = $this->sub_mdl->remove_subject_by_id($subject_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/subjects', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/subjects', 'refresh');
        }
    }

}
