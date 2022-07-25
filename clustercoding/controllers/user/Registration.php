<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Registration extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            redirect('user/dashboard', 'refresh');
        }

        $this->load->model('user_models/registration_model', 'reg_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
        $this->load->model('directory_models/home_model', 'home_mdl');
    }

    public function index($package_id = NULL) {
        $data = array();
        $data['package_info'] = $this->reg_mdl->get_package_info_by_id($package_id);
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['static_pages'] = $this->home_mdl->static_pages();
        if (!empty($package_id && !empty($data['package_info']))) {
            $data['title'] = 'Registration';
            $data['main_content'] = $this->load->view('directory_views/user/registration/registration', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);
        } else {
            redirect('user/packages', 'refresh');
        }
    }

    public function create_account() {
        $package_id = $this->input->post('package_id', TRUE);
        $pdata['package_info'] = $this->reg_mdl->get_package_info_by_id($package_id);
        if (!empty($pdata['package_info'])) {
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
                    'field' => 'email_address',
                    'label' => 'email address',
                    'rules' => 'trim|required|valid_email|max_length[100]|is_unique[tbl_users.email_address]'
                ),
                array(
                    'field' => 'mobile_number',
                    'label' => 'mobile number',
                    'rules' => 'trim|required|min_length[10]|max_length[10]'
                ),
                array(
                    'field' => 'otp',
                    'label' => 'otp',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'username',
                    'label' => 'username',
                    'rules' => 'trim|required|max_length[50]|is_unique[tbl_users.username]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'trim|required|min_length[8]|max_length[20]'
                ),
                array(
                    'field' => 'confirm_password',
                    'label' => 'confirm password',
                    'rules' => 'trim|required|matches[password]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) 
            {
                $this->index($package_id);
            } 
            else if ($this->session->userdata('registration_otp') != $this->input->post('otp')) 
            {
                $this->index($package_id);
            } 
            else 
            {
                $data['first_name'] = $this->input->post('first_name', TRUE);
                $data['last_name'] = $this->input->post('last_name', TRUE);
                $data['email_address'] = $this->input->post('email_address', TRUE);
                $data['username'] = $this->input->post('username', TRUE);
                $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
                $data['password'] = $this->input->post('password', TRUE);
                $data['access_label'] = 5;
                $data['activation_status'] = 0;
                $data['package_id'] = $this->input->post('package_id', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');

                $user_id = $this->reg_mdl->store_user_registration_info($data);
                $settings_info = $this->reg_mdl->get_settings_info();

                $paypal_info = array();
                $paypal_info['package_name'] = $pdata['package_info']['package_name'];
                $paypal_info['price'] = $pdata['package_info']['price'];
                $paypal_info['paypal_id'] = $settings_info['paypal_id'];


                if (!empty($user_id)) 
                {
                    $pay_info = array();
                    $pay_info['user_id'] = $user_id;
                    $pay_info['payment_type'] = 1;
                    $pay_info['payment_purpose'] = 1;
                    $pay_info['amount'] = $paypal_info['price'];
                    $pay_info['date_added'] = date('Y-m-d H:i:s');

                    $this->reg_mdl->add_payment_report($pay_info);


                    if ($paypal_info['price'] > 0) {
                        $this->load->view('directory_views/user/registration/htmlWebsiteStandardPayment', $paypal_info);
                    } else {
                        $sdata['user_id'] = $user_id;
                        $sdata['first_name'] = $data['first_name'];
                        $sdata['last_name'] = $data['last_name'];
                        $sdata['package_id'] = $data['package_id'];
                        $this->session->set_userdata($sdata);
                        redirect('user/dashboard', 'refresh');
                    }
                } else {
                    $sdata['exception'] = 'Something went wrong ! Please try agian.';
                    $this->session->set_userdata($sdata);
                    redirect('user/registration/index/' . $package_id, 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Something went wrong ! Please try agian.';
            $this->session->set_userdata($sdata);
            redirect('user/registration/index/' . $package_id, 'refresh');
        }
    }

    public function send_otp() 
    {
       // echo "hello";
        //ie();
        $mobile_number = $this->uri->segment(2); 
        
        $otp = mt_rand(100000, 999999);
        $this->session->set_userdata('registration_otp', $otp);
        echo $otp;
        

    }

}
