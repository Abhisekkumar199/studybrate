<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/cities_model', 'cities_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Cities';
        $data['active_menu'] = 'location';
        $data['active_sub_menu'] = 'cities';
        $data['active_sub_sub_menu'] = '';
        $data['cities_info'] = $this->cities_mdl->get_cities_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/cities/manage_cities_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_city() {
        $data = array();
        $data['title'] = 'Add City';
        $data['active_menu'] = 'location';
        $data['active_sub_menu'] = 'cities';
        $data['active_sub_sub_menu'] = '';
        $data['countries_info'] = $this->cities_mdl->get_countries_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/cities/add_city_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_city() {
        $config = array(
            array(
                'field' => 'city_name',
                'label' => 'city name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'description',
                'label' => 'city description',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'country_id',
                'label' => 'country name',
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
            $this->add_city();
        } else {
            $data['city_name'] = $this->input->post('city_name', TRUE);
            $data['country_id'] = $this->input->post('country_id', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->cities_mdl->store_city($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            }
        }
    }

    public function published_city($city_id) {
        $city_info = $this->cities_mdl->get_city_by_city_id($city_id);
        if (!empty($city_info)) {
            $result = $this->cities_mdl->published_city_by_id($city_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/cities', 'refresh');
        }
    }

    public function unpublished_city($city_id) {
        $city_info = $this->cities_mdl->get_city_by_city_id($city_id);
        if (!empty($city_info)) {
            $result = $this->cities_mdl->unpublished_city_by_id($city_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/cities', 'refresh');
        }
    }

    public function edit_city($city_id) {
        $data = array();
        $data['city_info'] = $this->cities_mdl->get_city_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'Edit City';
            $data['active_menu'] = 'location';
            $data['active_sub_menu'] = 'cities';
            $data['active_sub_sub_menu'] = '';
            $data['countries_info'] = $this->cities_mdl->get_countries_info();
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/cities/edit_city_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/cities', 'refresh');
        }
    }

    public function update_city($city_id) {
        $city_info = $this->cities_mdl->get_city_by_city_id($city_id);
        if (!empty($city_info)) {
            $config = array(
                array(
                    'field' => 'city_name',
                    'label' => 'city name',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'description',
                    'label' => 'description',
                    'rules' => 'trim|required|max_length[250]'
                ),
                array(
                    'field' => 'country_id',
                    'label' => 'country name',
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
                $this->edit_city($city_id);
            } else {
                $data['city_name'] = $this->input->post('city_name', TRUE);
                $data['country_id'] = $this->input->post('country_id', TRUE);
                $data['description'] = $this->input->post('description', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');

                $result = $this->cities_mdl->update_city($city_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/cities', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/cities', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/cities', 'refresh');
        }
    }

    public function remove_city($city_id) {
        $city_info = $this->cities_mdl->get_city_by_city_id($city_id);
        if (!empty($city_info)) {
            $result = $this->cities_mdl->remove_city_by_id($city_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/cities', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/cities', 'refresh');
        }
    }

}
