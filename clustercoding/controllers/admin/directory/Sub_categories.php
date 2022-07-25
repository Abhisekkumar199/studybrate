<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_categories extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/sub_categories_model', 'sub_categories_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Sub_categories';
        $data['active_menu'] = 'category';
        $data['active_sub_menu'] = 'sub_categories';
        $data['active_sub_sub_menu'] = '';
        $data['sub_categories_info'] = $this->sub_categories_mdl->get_sub_categories_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/sub_categories/manage_sub_categories_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_sub_category() {
        $data = array();
        $data['title'] = 'Add Sub-category';
        $data['active_menu'] = 'category';
        $data['active_sub_menu'] = 'sub_categories';
        $data['active_sub_sub_menu'] = '';
        $data['categories_info'] = $this->sub_categories_mdl->get_categories_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/sub_categories/add_sub_category_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_sub_category() {
        $config = array(
            array(
                'field' => 'sub_category_name',
                'label' => 'sub_category name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'description',
                'label' => 'sub_category description',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'category_id',
                'label' => 'category name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'publication_status',
                'label' => 'publication status',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_sub_category();
        } else {
            $data['sub_category_name'] = $this->input->post('sub_category_name', TRUE);
            $data['category_id'] = $this->input->post('category_id', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->sub_categories_mdl->store_sub_category($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            }
        }
    }

    public function published_sub_category($sub_category_id) {
        $sub_category_info = $this->sub_categories_mdl->get_sub_category_by_sub_category_id($sub_category_id);
        if (!empty($sub_category_info)) {
            $result = $this->sub_categories_mdl->published_sub_category_by_id($sub_category_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/sub_categories', 'refresh');
        }
    }

    public function unpublished_sub_category($sub_category_id) {
        $sub_category_info = $this->sub_categories_mdl->get_sub_category_by_sub_category_id($sub_category_id);
        if (!empty($sub_category_info)) {
            $result = $this->sub_categories_mdl->unpublished_sub_category_by_id($sub_category_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/sub_categories', 'refresh');
        }
    }

    public function edit_sub_category($sub_category_id) {
        $data = array();
        $data['sub_category_info'] = $this->sub_categories_mdl->get_sub_category_by_sub_category_id($sub_category_id);
        if (!empty($data['sub_category_info'])) {
            $data['title'] = 'Edit Sub-category';
            $data['active_menu'] = 'category';
            $data['active_sub_menu'] = 'sub_categories';
            $data['active_sub_sub_menu'] = '';
            $data['categories_info'] = $this->sub_categories_mdl->get_categories_info();
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/sub_categories/edit_sub_category_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/sub_categories', 'refresh');
        }
    }

    public function update_sub_category($sub_category_id) {
        $sub_category_info = $this->sub_categories_mdl->get_sub_category_by_sub_category_id($sub_category_id);
        if (!empty($sub_category_info)) {
            $config = array(
                array(
                    'field' => 'sub_category_name',
                    'label' => 'sub_category name',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'description',
                    'label' => 'description',
                    'rules' => 'trim|required|max_length[250]'
                ),
                array(
                    'field' => 'category_id',
                    'label' => 'category name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'publication_status',
                    'label' => 'publication status',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_sub_category($sub_category_id);
            } else {
                $data['sub_category_name'] = $this->input->post('sub_category_name', TRUE);
                $data['category_id'] = $this->input->post('category_id', TRUE);
                $data['description'] = $this->input->post('description', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');

                $result = $this->sub_categories_mdl->update_sub_category($sub_category_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/sub_categories', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/sub_categories', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/sub_categories', 'refresh');
        }
    }

    public function remove_sub_category($sub_category_id) {
        $sub_category_info = $this->sub_categories_mdl->get_sub_category_by_sub_category_id($sub_category_id);
        if (!empty($sub_category_info)) {
            $result = $this->sub_categories_mdl->remove_sub_category_by_id($sub_category_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/sub_categories', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/sub_categories', 'refresh');
        }
    }

}
