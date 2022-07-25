<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CC_Controller {
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
        $this->load->model('admin_models/settings_model', 'settings_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Settings';
        $data['active_menu'] = 'settings';
        $data['active_sub_menu'] = 'system_settings';
        $data['active_sub_sub_menu'] = '';
        $data['settings_info'] = $this->settings_mdl->get_settings_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/setting/system_setting_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function update_system_setting($setting_id) {

        $config = array(
            array(
                'field' => 'site_name',
                'label' => 'site name',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'email_address',
                'label' => 'email address',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'paypal_id',
                'label' => 'paypal email',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'web',
                'label' => 'web',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'language',
                'label' => 'language',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'time_zone',
                'label' => 'time zone',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'time_format',
                'label' => 'time format',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'date_format',
                'label' => 'date format',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'state',
                'label' => 'state',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'city',
                'label' => 'city',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'postal_code',
                'label' => 'postal code',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'fax',
                'label' => 'fax',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'mobile_number',
                'label' => 'mobile number',
                'rules' => 'trim|required|max_length[25]'
            ),
            array(
                'field' => 'phone_number',
                'label' => 'phone number',
                'rules' => 'trim'
            ),
            array(
                'field' => 'facebook',
                'label' => 'facebook',
                'rules' => 'trim'
            ),
            array(
                'field' => 'twitter',
                'label' => 'twitter',
                'rules' => 'trim'
            ),
            array(
                'field' => 'google_plus',
                'label' => 'google plus',
                'rules' => 'trim'
            ),
            array(
                'field' => 'youtube',
                'label' => 'youtube',
                'rules' => 'trim'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['site_name'] = $this->input->post('site_name', TRUE);
            $data['email_address'] = $this->input->post('email_address', TRUE);
            $data['paypal_id'] = $this->input->post('paypal_id', TRUE);
            $data['web'] = $this->input->post('web', TRUE);
            $data['language'] = $this->input->post('language', TRUE);
            $data['time_zone'] = $this->input->post('time_zone', TRUE);
            $data['time_format'] = $this->input->post('time_format', TRUE);
            $data['date_format'] = $this->input->post('date_format', TRUE);
            $data['address'] = $this->input->post('address', TRUE);
            $data['state'] = $this->input->post('state', TRUE);
            $data['city'] = $this->input->post('city', TRUE);
            $data['postal_code'] = $this->input->post('postal_code', TRUE);
            $data['fax'] = $this->input->post('fax', TRUE);
            $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
            $data['phone_number'] = $this->input->post('phone_number', TRUE);
            $data['facebook'] = $this->input->post('facebook', TRUE);
            $data['twitter'] = $this->input->post('twitter', TRUE);
            $data['google_plus'] = $this->input->post('google_plus', TRUE);
            $data['youtube'] = $this->input->post('youtube', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('admin_id');

            $result = $this->settings_mdl->update_system_setting($setting_id, $data);
            if (!empty($result)) {
                $sdata['success'] = 'Update successfully .';
                $this->session->set_userdata($sdata);
                redirect('system_settings', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('system_settings', 'refresh');
            }
        }
    }

    public function privacy_policy_setting() {
        $data = array();
        $data['title'] = 'Settings';
        $data['active_menu'] = 'settings';
        $data['active_sub_menu'] = 'privacy_policy';
        $data['active_sub_sub_menu'] = '';
        $data['settings_info'] = $this->settings_mdl->get_settings_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/setting/privacy_policy_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function update_privacy_policy($setting_id) {
        $config = array(
            array(
                'field' => 'terms_conditions',
                'label' => 'terms conditions',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'privacy_policy',
                'label' => 'privacy policy',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->privacy_policy_setting();
        } else {
            $data['terms_conditions'] = $this->input->post('terms_conditions', TRUE);
            $data['privacy_policy'] = $this->input->post('privacy_policy', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('admin_id');

            $result = $this->settings_mdl->update_system_setting($setting_id, $data);
            if (!empty($result)) {
                $sdata['success'] = 'Update successfully .';
                $this->session->set_userdata($sdata);
                redirect('privacy_policy_setting', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('privacy_policy_setting', 'refresh');
            }
        }
    }

    public function change_logo() {
        $data = array();
        $data['title'] = 'Settings';
        $data['active_menu'] = 'settings';
        $data['active_sub_menu'] = 'change_logo';
        $data['active_sub_sub_menu'] = '';
        $data['settings_info'] = $this->settings_mdl->get_settings_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/setting/change_logo_v', '', TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function update_site_logo($setting_id) {
        $data = array();
        $data['site_logo'] = $this->update_logo();
        $data['last_updated'] = date('Y-m-d H:i:s');
        $data['user_id'] = $this->session->userdata('admin_id');

        $result = $this->settings_mdl->update_system_setting($setting_id, $data);
        if (!empty($result)) {
            $sdata['success'] = 'Update successfully .';
            $this->session->set_userdata($sdata);
            redirect('change_logo', 'refresh');
        } else {
            $sdata['exception'] = 'Operation failed !';
            $this->session->set_userdata($sdata);
            redirect('change_logo', 'refresh');
        }
    }

    public function update_logo() {
        $current_logo = $this->input->post('current_logo', TRUE);
        if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
            $config['upload_path'] = 'assets/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('change_logo', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $logo_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->logo_resize($path, $file);
                if (!empty($current_logo)) {
                    unlink('assets/logo/' . $current_logo);
                    unlink('assets/logo/thumb/' . $current_logo);
                }
                return $logo_name;
            }
        } else {
            return $current_logo;
        }
    }

    public function logo_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "100%";
        $config_resize['width'] = 180;
        $config_resize['height'] = 60;
        $config_resize['new_image'] = 'assets/logo/thumb/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('change_logo', 'refresh');
        }
        return TRUE;
    }

    public function update_site_favicon($setting_id) {
        $data = array();
        $data['site_favicon'] = $this->update_favicon();
        $data['last_updated'] = date('Y-m-d H:i:s');
        $data['user_id'] = $this->session->userdata('admin_id');

        $result = $this->settings_mdl->update_system_setting($setting_id, $data);
        if (!empty($result)) {
            $sdata['success'] = 'Update successfully .';
            $this->session->set_userdata($sdata);
            redirect('change_logo', 'refresh');
        } else {
            $sdata['exception'] = 'Operation failed !';
            $this->session->set_userdata($sdata);
            redirect('change_logo', 'refresh');
        }
    }

    public function update_favicon() {
        $current_favicon = $this->input->post('current_favicon', TRUE);
        if (isset($_FILES['favicon']['name']) && !empty($_FILES['favicon']['name'])) {
            $config['upload_path'] = 'assets/favicon/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('favicon')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('change_logo', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $favicon_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->favicon_resize($path, $file);
                if (!empty($current_favicon)) {
                    unlink('assets/favicon/' . $current_favicon);
                    unlink('assets/favicon/thumb/' . $current_favicon);
                }
                return $favicon_name;
            }
        } else {
            return $current_favicon;
        }
    }

    public function favicon_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "100%";
        $config_resize['width'] = 32;
        $config_resize['height'] = 32;
        $config_resize['new_image'] = 'assets/favicon/thumb/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('change_logo', 'refresh');
        }
        return TRUE;
    }

}
