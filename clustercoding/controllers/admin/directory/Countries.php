<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/countries_model', 'countries_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Countries';
        $data['active_menu'] = 'location';
        $data['active_sub_menu'] = 'countries';
        $data['active_sub_sub_menu'] = '';
        $data['countries_info'] = $this->countries_mdl->get_countries_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/countries/manage_countries_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_country() {
        $data = array();
        $data['title'] = 'Add Country';
        $data['active_menu'] = 'location';
        $data['active_sub_menu'] = 'countries';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/countries/add_country_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_country() {
        $config = array(
            array(
                'field' => 'country_name',
                'label' => 'country name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'description',
                'label' => 'country description',
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
            $this->add_country();
        } else {
            $data['country_name'] = $this->input->post('country_name', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->countries_mdl->store_country($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            }
        }
    }

    public function published_country($country_id) {
        $country_info = $this->countries_mdl->get_country_by_country_id($country_id);
        if (!empty($country_info)) {
            $result = $this->countries_mdl->published_country_by_id($country_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/countries', 'refresh');
        }
    }

    public function unpublished_country($country_id) {
        $country_info = $this->countries_mdl->get_country_by_country_id($country_id);
        if (!empty($country_info)) {
            $result = $this->countries_mdl->unpublished_country_by_id($country_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/countries', 'refresh');
        }
    }

    public function edit_country($country_id) {
        $data = array();
        $data['country_info'] = $this->countries_mdl->get_country_by_country_id($country_id);
        if (!empty($data['country_info'])) {
            $data['title'] = 'Edit Country';
            $data['active_menu'] = 'location';
            $data['active_sub_menu'] = 'countries';
            $data['active_sub_sub_menu'] = '';
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/countries/edit_country_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/countries', 'refresh');
        }
    }

    public function update_country($country_id) {
        $country_info = $this->countries_mdl->get_country_by_country_id($country_id);
        if (!empty($country_info)) {
            $config = array(
                array(
                    'field' => 'country_name',
                    'label' => 'country name',
                    'rules' => 'trim|required|max_length[100]'
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
                $this->edit_country($country_id);
            } else {
                $data['country_name'] = $this->input->post('country_name', TRUE);
                $data['description'] = $this->input->post('description', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');

                $result = $this->countries_mdl->update_country($country_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/countries', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/countries', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/countries', 'refresh');
        }
    }

    public function remove_country($country_id) {
        $country_info = $this->countries_mdl->get_country_by_country_id($country_id);
        if (!empty($country_info)) {
            $result = $this->countries_mdl->remove_country_by_id($country_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/countries', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/countries', 'refresh');
        }
    }
}
