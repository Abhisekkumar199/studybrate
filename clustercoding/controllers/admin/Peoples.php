<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peoples extends CC_Controller {
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
        $this->load->model('admin_models/peoples_model', 'peoples_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Users';
        $data['active_menu'] = 'peoples';
        $data['active_sub_menu'] = 'users';
        $data['active_sub_sub_menu'] = '';
        $data['users_info'] = $this->peoples_mdl->get_users_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/peoples/users/manage_users_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_user() {
        $data = array();
        $data['title'] = 'Add User';
        $data['active_menu'] = 'peoples';
        $data['active_sub_menu'] = 'users';
        $data['active_sub_sub_menu'] = '';
        $data['packages_info'] = $this->peoples_mdl->get_all_packages();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/peoples/users/add_user_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_user() {
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
                'field' => 'username',
                'label' => 'user name',
                'rules' => 'trim|required|max_length[50]|is_unique[tbl_users.username]'
            ),
            array(
                'field' => 'email_address',
                'label' => 'email address',
                'rules' => 'trim|required|max_length[50]|is_unique[tbl_users.email_address]'
            ),
            array(
                'field' => 'mobile_number',
                'label' => 'mobile number',
                'rules' => 'trim|required|max_length[25]'
            ),
            array(
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'package_id',
                'label' => 'package',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'activation_status',
                'label' => 'activation status',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_user();
        } else {
            $data['first_name'] = $this->input->post('first_name', TRUE);
            $data['last_name'] = $this->input->post('last_name', TRUE);
            $data['username'] = $this->input->post('username', TRUE);
            $data['email_address'] = $this->input->post('email_address', TRUE);
            $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
            $data['gender'] = $this->input->post('gender', TRUE);
            $data['package_id'] = $this->input->post('package_id', TRUE);
            $data['activation_status'] = $this->input->post('activation_status', TRUE);
            $data['password'] = md5(12345678);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['access_label'] = 5;
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
            {
                $data['avatar'] = $this->add_picture();
            }

            $insert_id = $this->peoples_mdl->store_user($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('users/add_user', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('users/add_user', 'refresh');
            }
        }
    }

    public function add_picture() {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/profile_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['error'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('users/add_user', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->picture_resize($path, $file);
                return $picture_name;
            }
        } else {
            $sdata['error'] = 'Picture is required. Please <b>upload a picture</b> and try again !';
            $this->session->set_userdata($sdata);
            redirect('users/add_user', 'refresh');
        }
    }

    public function picture_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 400;
        $config_resize['height'] = 300;
        $config_resize['new_image'] = 'assets/uploaded_files/profile_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['error'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('users/add_user', 'refresh');
        }
        return TRUE;
    }

    public function activate_user($user_id) {
        $user_info = $this->peoples_mdl->get_user_by_user_id($user_id);
        if (!empty($user_info)) {
            $result = $this->peoples_mdl->activate_user_by_user_id($user_id);
            if (!empty($result)) {
                $sdata['success'] = 'Activate successfully .';
                $this->session->set_userdata($sdata);
                redirect('users', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('users', 'refresh');
            }
        } else {
            $sdata['exception'] = 'User not found !';
            $this->session->set_userdata($sdata);
            redirect('users', 'refresh');
        }
    }

    public function deactivate_user($user_id) {
        $user_info = $this->peoples_mdl->get_user_by_user_id($user_id);
        if (!empty($user_info)) {
            $result = $this->peoples_mdl->deactivate_user_by_user_id($user_id);
            if (!empty($result)) {
                $sdata['success'] = 'Deactivate successfully .';
                $this->session->set_userdata($sdata);
                redirect('users', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('users', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('users', 'refresh');
        }
    }

    public function edit_user($user_id) {
        $data = array();
        $data['user_info'] = $this->peoples_mdl->get_user_by_user_id($user_id);
        if (!empty($data['user_info'])) {
            $data['title'] = 'Edit User';
            $data['active_menu'] = 'peoples';
            $data['active_sub_menu'] = 'users';
            $data['active_sub_sub_menu'] = 'users';
            $data['packages_info'] = $this->peoples_mdl->get_all_packages();
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/peoples/users/edit_user_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'User not found !';
            $this->session->set_userdata($sdata);
            redirect('users', 'refresh');
        }
    }

    public function update_user($user_id) {
        $user_info = $this->peoples_mdl->get_user_by_user_id($user_id);
        if (!empty($user_info)) {
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
                    'field' => 'username',
                    'label' => 'user name',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'email_address',
                    'label' => 'email address',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'mobile_number',
                    'label' => 'mobile number',
                    'rules' => 'trim|required|max_length[25]'
                ),
                array(
                    'field' => 'package_id',
                    'label' => 'package',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'gender',
                    'label' => 'gender',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'activation_status',
                    'label' => 'activation status',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_user($user_id);
            } else {
                $data['first_name'] = $this->input->post('first_name', TRUE);
                $data['last_name'] = $this->input->post('last_name', TRUE);
                $data['username'] = $this->input->post('username', TRUE);
                $data['email_address'] = $this->input->post('email_address', TRUE);
                $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
                $data['gender'] = $this->input->post('gender', TRUE);
                $data['package_id'] = $this->input->post('package_id', TRUE);
                $data['activation_status'] = $this->input->post('activation_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');
                $data['avatar'] = $this->update_picture($user_id);

                $result = $this->peoples_mdl->update_user($user_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('users', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('users', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('users', 'refresh');
        }
    }

    public function update_picture($user_id) {
        $current_image = $this->input->post('current_image', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/profile_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['error'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('users/edit_user/' . $user_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file, $user_id);
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

    public function update_picture_resize($path, $file, $user_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 400;
        $config_resize['height'] = 300;
        $config_resize['new_image'] = 'assets/uploaded_files/profile_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['error'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('users/edit_user/' . $user_id, 'refresh');
        }
        return TRUE;
    }

    public function remove_user($user_id) {
        $user_info = $this->peoples_mdl->get_user_by_user_id($user_id);
        if (!empty($user_info)) {
            $result = $this->peoples_mdl->remove_user_by_user_id($user_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('users', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('users', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('users', 'refresh');
        }
    }

    // For Employees
    public function employees() {
        $data = array();
        $data['title'] = 'Manage Users';
        $data['active_menu'] = 'peoples';
        $data['active_sub_menu'] = 'employees';
        $data['active_sub_sub_menu'] = '';
        $data['employees_info'] = $this->peoples_mdl->get_employees_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/peoples/employees/manage_employees_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_employee() {
        $data = array();
        $data['title'] = 'Add User';
        $data['active_menu'] = 'peoples';
        $data['active_sub_menu'] = 'employees';
        $data['active_sub_sub_menu'] = '';
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/peoples/employees/add_employee_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_employee() {
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
                'field' => 'username',
                'label' => 'employee name',
                'rules' => 'trim|required|max_length[50]|is_unique[tbl_users.username]'
            ),
            array(
                'field' => 'email_address',
                'label' => 'email address',
                'rules' => 'trim|required|max_length[50]|is_unique[tbl_users.email_address]'
            ),
            array(
                'field' => 'mobile_number',
                'label' => 'mobile number',
                'rules' => 'trim|required|max_length[25]'
            ),
            array(
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'activation_status',
                'label' => 'activation status',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'access_label',
                'label' => 'access label',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_employee();
        } else {
            $data['first_name'] = $this->input->post('first_name', TRUE);
            $data['last_name'] = $this->input->post('last_name', TRUE);
            $data['username'] = $this->input->post('username', TRUE);
            $data['email_address'] = $this->input->post('email_address', TRUE);
            $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
            $data['gender'] = $this->input->post('gender', TRUE);
            $data['activation_status'] = $this->input->post('activation_status', TRUE);
            $data['password'] = md5(12345678);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['access_label'] = $this->input->post('access_label', TRUE);
            ;
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
                $data['avatar'] = $this->add_employee_picture();
            }

            $insert_id = $this->peoples_mdl->store_employee($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('employees/add_employee', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('employees/add_employee', 'refresh');
            }
        }
    }

    public function add_employee_picture() {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/profile_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['error'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('employees/add_employee', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->employee_picture_resize($path, $file);
                return $picture_name;
            }
        } else {
            $sdata['error'] = 'Picture is required. Please <b>upload a picture</b> and try again !';
            $this->session->set_userdata($sdata);
            redirect('employees/add_employee', 'refresh');
        }
    }

    public function employee_picture_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 400;
        $config_resize['height'] = 300;
        $config_resize['new_image'] = 'assets/uploaded_files/profile_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['error'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('employees/add_employee', 'refresh');
        }
        return TRUE;
    }

    public function activate_employee($user_id) {
        $employee_info = $this->peoples_mdl->get_employee_by_user_id($user_id);
        if (!empty($employee_info)) {
            $result = $this->peoples_mdl->activate_employee_by_user_id($user_id);
            if (!empty($result)) {
                $sdata['success'] = 'Activate successfully .';
                $this->session->set_userdata($sdata);
                redirect('employees', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('employees', 'refresh');
            }
        } else {
            $sdata['exception'] = 'User not found !';
            $this->session->set_userdata($sdata);
            redirect('employees', 'refresh');
        }
    }

    public function deactivate_employee($user_id) {
        $employee_info = $this->peoples_mdl->get_employee_by_user_id($user_id);
        if (!empty($employee_info)) {
            $result = $this->peoples_mdl->deactivate_employee_by_user_id($user_id);
            if (!empty($result)) {
                $sdata['success'] = 'Deactivate successfully .';
                $this->session->set_userdata($sdata);
                redirect('employees', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('employees', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('employees', 'refresh');
        }
    }

    public function edit_employee($user_id) {
        $data = array();
        $data['employee_info'] = $this->peoples_mdl->get_employee_by_user_id($user_id);
        if (!empty($data['employee_info'])) {
            $data['title'] = 'Edit User';
            $data['active_menu'] = 'peoples';
            $data['active_sub_menu'] = 'employees';
            $data['active_sub_sub_menu'] = 'employees';
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/peoples/employees/edit_employee_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } else {
            $sdata['exception'] = 'User not found !';
            $this->session->set_userdata($sdata);
            redirect('employees', 'refresh');
        }
    }

    public function update_employee($user_id) {
        $employee_info = $this->peoples_mdl->get_employee_by_user_id($user_id);
        if (!empty($employee_info)) {
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
                    'field' => 'username',
                    'label' => 'employee name',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'email_address',
                    'label' => 'email address',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'mobile_number',
                    'label' => 'mobile number',
                    'rules' => 'trim|required|max_length[25]'
                ),
                array(
                    'field' => 'gender',
                    'label' => 'gender',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'activation_status',
                    'label' => 'activation status',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'access_label',
                    'label' => 'access label',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_employee($user_id);
            } else {
                $data['first_name'] = $this->input->post('first_name', TRUE);
                $data['last_name'] = $this->input->post('last_name', TRUE);
                $data['username'] = $this->input->post('username', TRUE);
                $data['email_address'] = $this->input->post('email_address', TRUE);
                $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
                $data['gender'] = $this->input->post('gender', TRUE);
                $data['activation_status'] = $this->input->post('activation_status', TRUE);
                $data['access_label'] = $this->input->post('access_label', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');
                $data['avatar'] = $this->update_employee_picture($user_id);

                $result = $this->peoples_mdl->update_employee($user_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('employees', 'refresh');
                } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('employees', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('employees', 'refresh');
        }
    }

    public function update_employee_picture($user_id) {
        $current_image = $this->input->post('current_image', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/profile_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['error'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('employees/edit_employee/' . $user_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_employee_picture_resize($path, $file, $user_id);
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

    public function update_employee_picture_resize($path, $file, $user_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 400;
        $config_resize['height'] = 300;
        $config_resize['new_image'] = 'assets/uploaded_files/profile_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['error'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('employees/edit_employee/' . $user_id, 'refresh');
        }
        return TRUE;
    }

    public function remove_employee($user_id) {
        $employee_info = $this->peoples_mdl->get_employee_by_user_id($user_id);
        if (!empty($employee_info)) {
            $result = $this->peoples_mdl->remove_employee_by_user_id($user_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('employees', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('employees', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('employees', 'refresh');
        }
    }

}
