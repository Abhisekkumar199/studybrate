<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staticpages extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/staticpages_model', 'sub_mdl');
        $this->load->model('admin_models/directory_models/categories_model', 'cat_mdl');
    }

    public function index() {
        
        $data = array();
        $category = $this->input->get('category', TRUE); 
        if($category < 1)
        {
            $category = 0;
        } 
        
        $data['title'] = 'Manage staticpage';
        $data['active_menu'] = 'staticpage';
        $data['active_sub_menu'] = 'staticpages';
        $data['active_sub_sub_menu'] = '';
        
        $data['categories_info'] = $this->cat_mdl->get_categories_info($category);
        
        $data['staticpage_info'] = $this->sub_mdl->get_staticpages_info($category);
         
        $data['category'] = $category;
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/staticpages/manage_staticpages_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    //  get categoryList
	public function get_staticpage_list()
	{  
        $categoryId = $this->uri->segment(2);
        $staticpagelist = $this->sub_mdl->get_staticpages_list_categorywise($categoryId);   
        echo json_encode($staticpagelist);
    }

    public function add_staticpage() {
        $data = array();
        $data['title'] = 'Add staticpage';
        $data['active_menu'] = 'staticpage';
        $data['active_sub_menu'] = 'staticpages';
        $data['active_sub_sub_menu'] = ''; 
        $data['categories_info'] = $this->cat_mdl->get_categories_info(0); 
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/staticpages/add_staticpage_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_staticpage() {
        $config = array(
            array(
                'field' => 'page_name',
                'label' => 'Page title',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'description',
                'label' => 'staticpage description',
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
            $this->add_staticpage();
        } 
        else 
        {  
            $data['page_name'] = $this->input->post('page_name', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['page_title'] = $this->input->post('page_title', TRUE); 
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->sub_mdl->store_staticpage($data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages?category='.$categoryid, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages?category='.$categoryid, 'refresh');
            }
        }
    }

    public function published_staticpage($staticpage_id) 
    {
        $staticpage_info = $this->sub_mdl->get_staticpage_by_staticpage_id($staticpage_id);
        if (!empty($staticpage_info)) 
        {
            $result = $this->sub_mdl->published_staticpage_by_id($staticpage_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/staticpages', 'refresh');
        }
    }

    public function unpublished_staticpage($staticpage_id) 
    {
        $staticpage_info = $this->sub_mdl->get_staticpage_by_staticpage_id($staticpage_id);
        if (!empty($staticpage_info)) 
        {
            $result = $this->sub_mdl->unpublished_staticpage_by_id($staticpage_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/staticpages', 'refresh');
        }
    }

    public function edit_staticpage($staticpage_id) 
    {
        
        $data = array();
        $data['staticpage_info'] = $this->sub_mdl->get_staticpage_by_staticpage_id($staticpage_id);
        
        if (!empty($data['staticpage_info'])) 
        {
            $data['title'] = 'Edit staticpage';
            $data['active_menu'] = 'staticpage';
            $data['active_sub_menu'] = 'staticpages';
            $data['active_sub_sub_menu'] = '';
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/staticpages/edit_staticpage_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/staticpages', 'refresh');
        }
    }

    public function update_staticpage($staticpage_id) 
    { 
        $staticpage_info = $this->sub_mdl->get_staticpage_by_staticpage_id($staticpage_id);
        if (!empty($staticpage_info)) 
        {
            $config = array(
                array(
                    'field' => 'page_name',
                    'label' => 'page name',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'description',
                    'label' => 'description',
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
                $this->edit_staticpage($staticpage_id);
            } 
            else 
            {
                $data['page_title'] = $this->input->post('page_title', TRUE);
                $data['description'] = $this->input->post('description', TRUE); 
                $data['page_name'] = $this->input->post('page_name', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');

                $result = $this->sub_mdl->update_staticpage($staticpage_id, $data);
                if (!empty($result)) 
                {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/staticpages', 'refresh');
                } 
                else 
                {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/staticpages', 'refresh');
                }
            }
        }
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/staticpages', 'refresh');
        }
    }

    public function remove_staticpage($staticpage_id) 
    {
        $staticpage_info = $this->sub_mdl->get_staticpage_by_staticpage_id($staticpage_id);
        if (!empty($staticpage_info)) 
        {
            $result = $this->sub_mdl->remove_staticpage_by_id($staticpage_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/staticpages', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/staticpages', 'refresh');
        }
    }

}
