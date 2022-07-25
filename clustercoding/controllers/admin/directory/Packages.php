<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/packages_model', 'cat_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Packages';
        $data['active_menu'] = 'packages';
        $data['active_sub_menu'] = '';
        $data['active_sub_sub_menu'] = '';
        $data['packages_info'] = $this->cat_mdl->get_packages_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/packages/manage_packages_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_package() {
        $data = array();
        $data['title'] = 'Add Package';
        $data['active_menu'] = 'packages';
        $data['active_sub_menu'] = '';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/packages/add_package_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_package() {
        $config = array(
            array(
                'field' => 'package_name',
                'label' => 'package name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'price',
                'label' => 'price',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'listing',
                'label' => 'listing',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'images',
                'label' => 'image',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'videos',
                'label' => 'video',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'products',
                'label' => 'product',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'services',
                'label' => 'service',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'keywords',
                'label' => 'keyword',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'articles',
                'label' => 'article',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'description',
                'label' => 'package description',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'publication_status',
                'label' => 'publication status',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_package();
        } else {
            $data['package_name'] = $this->input->post('package_name', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['images'] = $this->input->post('images', TRUE);
            $data['listing'] = $this->input->post('listing', TRUE);
            $data['videos'] = $this->input->post('videos', TRUE);
            $data['products'] = $this->input->post('products', TRUE);
            $data['services'] = $this->input->post('services', TRUE);
            $data['articles'] = $this->input->post('articles', TRUE);
            $data['keywords'] = $this->input->post('keywords', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->cat_mdl->store_package($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            }
        }
    }

    public function published_package($package_id) {
        $package_info = $this->cat_mdl->get_package_by_package_id($package_id);
        if (!empty($package_info)) {
            $result = $this->cat_mdl->published_package_by_id($package_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/packages', 'refresh');
        }
    }

    public function unpublished_package($package_id) {
        $package_info = $this->cat_mdl->get_package_by_package_id($package_id);
        if (!empty($package_info)) {
            $result = $this->cat_mdl->unpublished_package_by_id($package_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/packages', 'refresh');
        }
    }

    public function edit_package($package_id) {
        $data = array();
        $data['package_info'] = $this->cat_mdl->get_package_by_package_id($package_id);
        if (!empty($data['package_info'])) {
            $data['title'] = 'Edit Package';
            $data['active_menu'] = 'packages';
            $data['active_sub_menu'] = '';
            $data['active_sub_sub_menu'] = '';
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/packages/edit_package_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/packages', 'refresh');
        }
    }

    public function update_package($package_id) {
        $package_info = $this->cat_mdl->get_package_by_package_id($package_id);
        if (!empty($package_info)) {
            $config = array(
            array(
            'field' => 'package_name',
            'label' => 'package name',
            'rules' => 'trim|required|max_length[100]'
            ),
            array(
            'field' => 'price',
            'label' => 'price',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'listing',
            'label' => 'listing',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'images',
            'label' => 'image',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'videos',
            'label' => 'video',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'products',
            'label' => 'product',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'services',
            'label' => 'service',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'keywords',
            'label' => 'keyword',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'articles',
            'label' => 'article',
            'rules' => 'trim|required|numeric'
            ),
            array(
            'field' => 'description',
            'label' => 'description',
            'rules' => 'trim|required|max_length[250]'
            ),
            array(
            'field' => 'publication_status',
            'label' => 'publication status',
            'rules' => 'trim|required'
            )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_package($package_id);
            } else {
                $data['package_name'] = $this->input->post('package_name', TRUE);
                $data['price'] = $this->input->post('price', TRUE);
                $data['listing'] = $this->input->post('listing', TRUE);
                $data['images'] = $this->input->post('images', TRUE);
                $data['videos'] = $this->input->post('videos', TRUE);
                $data['products'] = $this->input->post('products', TRUE);
                $data['services'] = $this->input->post('services', TRUE);
                $data['articles'] = $this->input->post('articles', TRUE);
                $data['keywords'] = $this->input->post('keywords', TRUE);
                $data['description'] = $this->input->post('description', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');

                $result = $this->cat_mdl->update_package($package_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/packages', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/packages', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/packages', 'refresh');
        }
    }

    public function remove_package($package_id) {
        $package_info = $this->cat_mdl->get_package_by_package_id($package_id);
        if (!empty($package_info)) {
            $result = $this->cat_mdl->remove_package_by_id($package_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/packages', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/packages', 'refresh');
        }
    }

}
