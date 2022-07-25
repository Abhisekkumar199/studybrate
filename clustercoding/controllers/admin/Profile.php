<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CC_Controller {
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
        $this->load->model('admin_models/profile_model', 'pro_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Profile';
        $data['active_menu'] = 'portfolio';
        $data['active_sub_menu'] = 'about_me';
        $data['active_sub_sub_menu'] = 'profile';
        $user_id = $this->session->userdata('admin_id');
        $data['user_info'] = $this->pro_mdl->get_user_info_by_id($user_id);
        $data['skills_info'] = $this->pro_mdl->get_user_skills_info_by_user_id($user_id);
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/profile/profile_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function update_basic_info() {
        $config = array(
            array(
                'field' => 'first_name',
                'label' => 'first name',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'last_name',
                'label' => 'last name',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'education',
                'label' => 'education',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'work',
                'label' => 'work',
                'rules' => 'trim|required|max_length[100]'
            ),
            array(
                'field' => 'company',
                'label' => 'company',
                'rules' => 'trim|max_length[100]'
            ),
            array(
                'field' => 'date_of_birth',
                'label' => 'birthday',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'intro',
                'label' => 'intro',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'about',
                'label' => 'about',
                'rules' => 'trim|required|max_length[1000]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['first_name'] = $this->input->post('first_name', TRUE);
            $data['last_name'] = $this->input->post('last_name', TRUE);
            $data['education'] = $this->input->post('education', TRUE);
            $data['work'] = $this->input->post('work', TRUE);
            $data['company'] = $this->input->post('company', TRUE);
            $data['date_of_birth'] = $this->input->post('date_of_birth', TRUE);
            $data['gender'] = $this->input->post('gender', TRUE);
            $data['intro'] = $this->input->post('intro', TRUE);
            $data['about'] = $this->input->post('about', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            $user_id = $this->session->userdata('admin_id');

            $result = $this->pro_mdl->update_user_info($user_id, $data);
            if (!empty($result)) {
                $sdata['success'] = 'Update successfully . ';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            }
        }
    }

    public function update_contact_info() {
        $config = array(
            array(
                'field' => 'mobile_number',
                'label' => 'mobile number',
                'rules' => 'trim|required|max_length[25]'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim|required|max_length[250]'
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
                'field' => 'zip_code',
                'label' => 'zip code',
                'rules' => 'trim|max_length[25]'
            ),
            array(
                'field' => 'country',
                'label' => 'country',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
            $data['address'] = $this->input->post('address', TRUE);
            $data['state'] = $this->input->post('state', TRUE);
            $data['city'] = $this->input->post('city', TRUE);
            $data['zip_code'] = $this->input->post('zip_code', TRUE);
            $data['country'] = $this->input->post('country', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            $user_id = $this->session->userdata('admin_id');

            $result = $this->pro_mdl->update_user_info($user_id, $data);
            if (!empty($result)) {
                $sdata['success'] = 'Update successfully . ';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            }
        }
    }

    public function update_social_info() {
        $config = array(
            array(
                'field' => 'facebook',
                'label' => 'facebook url',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'twitter',
                'label' => 'twitter url',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'google_plus',
                'label' => 'google plus',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'linkedin',
                'label' => 'linkedin',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'youtube',
                'label' => 'youtube',
                'rules' => 'trim|valid_url'
            ),
            array(
                'field' => 'github',
                'label' => 'github',
                'rules' => 'trim|valid_url'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['facebook'] = $this->input->post('facebook', TRUE);
            $data['twitter'] = $this->input->post('twitter', TRUE);
            $data['google_plus'] = $this->input->post('google_plus', TRUE);
            $data['linkedin'] = $this->input->post('linkedin', TRUE);
            $data['youtube'] = $this->input->post('youtube', TRUE);
            $data['github'] = $this->input->post('github', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            $user_id = $this->session->userdata('admin_id');

            $result = $this->pro_mdl->update_user_info($user_id, $data);
            if (!empty($result)) {
                $sdata['success'] = 'Update successfully . ';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            }
        }
    }

    public function change_password() {
        $config = array(
            array(
                'field' => 'old_password',
                'label' => 'old password',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'new_password',
                'label' => 'new password',
                'rules' => 'trim|required|min_length[8]|max_length[20]'
            ),
            array(
                'field' => 'confirm_password',
                'label' => 'confirm password',
                'rules' => 'trim|required|matches[new_password]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $old_password = md5($this->input->post('old_password', TRUE));
            $data['password'] = md5($this->input->post('new_password', TRUE));
            $data['last_updated'] = date('Y-m-d H:i:s');
            $user_id = $this->session->userdata('admin_id');

            $check_password = $this->pro_mdl->check_old_password($user_id, $old_password);

            if (!empty($check_password)) {
                $result = $this->pro_mdl->update_user_info($user_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully . ';
                    $this->session->set_userdata($sdata);
                    redirect('profile', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('profile', 'refresh');
                }
            } else {
                $sdata['error'] = 'Old password does not match ! Please give right password.';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            }
        }
    }

    public function update_profile_picture() {
        if (empty($_FILES['picture_name']['name'])) {
            $this->form_validation->set_rules('picture_name', 'picture', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->index();
            }
        } else {
            $data['avatar'] = $this->update_picture();
            $data['last_updated'] = date('Y-m-d H:i:s');

            $user_id = $this->session->userdata('admin_id');

            $result = $this->pro_mdl->update_user_info($user_id, $data);
            if (!empty($result)) {
                $sdata['admin_avatar'] = $data['avatar'];
                $sdata['success'] = 'Update successfully . ';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            }
        }
    }

    public function update_picture() {
        $current_image = $this->input->post('current_image', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/profile_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = ''; 
            $config['max_width'] = '';
            $config['max_height'] = '';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['error'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('profile', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file);
                if (!empty($current_image)) {
                    unlink('assets/uploaded_files/profile_img/' . $current_image);
                    unlink('assets/uploaded_files/profile_img/resize/' . $current_image);
                }
                return $picture_name;
            }
        } else {
            return $current_image;
        }
    }

    public function update_picture_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "100%";
        $config_resize['width'] = 100;
        $config_resize['height'] = 100;
        $config_resize['new_image'] = 'assets/uploaded_files/profile_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['error'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('profile', 'refresh');
        }
        return TRUE;
    }

}
