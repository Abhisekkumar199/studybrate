<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* #********************************************#
  #               ClusterCoding                 #
  #*********************************************#
  #      Author:     ClusterCoding              #
  #      Email:      info@clustercoding.com     #
  #      Website:    http://clustercoding.com   #
  #                                             #
  #      Version:    1.0.0                      #
  #      Copyright:  (c) 2017 - ClusterCoding   #
  #                                             #
  #*********************************************# */

class Forgot_password extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $logged_info = $this->session->userdata('logged_info');
        if ($logged_info != FALSE) {
            redirect('admin/dashboard', 'refresh');
        }

//        $this->load->model('admin_models/forgot_pass_model', 'forgot_pass_mdl');
//        $this->load->model('mailer_models/mailer_model', 'mailer_mdl');
    }

    public function index() {
        $data['title'] = 'Forgot Password';
        $this->load->view('admin_views/forgot_password/forgot_password_v', $data);
    }

    public function admin_pass_reset_request() {

        $this->form_validation->set_rules('email_address', 'email address', 'trim|required|max_length[50]|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $sdata['exception'] = validation_errors();
            $this->session->set_userdata($sdata);
            redirect('admin-forgot-password', 'refresh');
        } else {
            $email_address = $this->input->post('email_address', true);
            $result = $this->forgot_pass_mdl->email_exists($email_address);

            $en_user_id = $this->encrypt->encode($result['user_id']);
            $en_rep_user_id = str_replace("/", "%F2", $en_user_id);


            if (!empty($result)) {
                /* --------------Start Send Contact Email------------ */
                $mdata = array();
                $mdata['from_address'] = 'admin@tiptopshoppingonline.com';
                $mdata['to_address'] = $email_address;
                $mdata['subject'] = 'Password Reset Request';
                $mdata['message'] = 'Click the following link to change your password.';
                $mdata['user_id'] = $en_rep_user_id;
                $mdata['full_name'] = $result['first_name'] . " " . $result['last_name'];
                $this->mailer_mdl->sendEmail($mdata, 'admin_reset_password');
                /* --------------End Send Contact Email------------ */
                $sdata = array();
                $sdata['message'] = "Password-reset link send to your <b>email </b>. Please check your email.";
                $this->session->set_userdata($sdata);
                redirect('admin-forgot-password', 'refresh');
            } else {
                $sdata = array();
                $sdata['exception'] = "Account does not exist for this <strong>email</strong> !";
                $this->session->set_userdata($sdata);
                redirect('admin-forgot-password', 'refresh');
            }
        }
    }

    public function admin_reset_password($user_id) {
        $data['title'] = 'UMS - Reset Password';
        $data['user_id'] = $user_id;
        $this->load->view('admin/reset_pass', $data);
    }

    public function confirm_new_password($u_id) {
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $sdata['exception'] = validation_errors();
            $this->session->set_userdata($sdata);
            redirect('admin-reset-password/' . $u_id, 'refresh');
        } else {
            $de_rep_id = str_replace("%F2", "/", $u_id);
            $user_id = $this->encrypt->decode($de_rep_id);
            $user_password = md5($this->input->post('password', TRUE));

            $result = $this->forgot_pass_mdl->change_forgot_password($user_id, $user_password);

            if (!empty($result)) {
                $sdata['message'] = 'Password change successfully. You may login now..';
                $this->session->set_userdata($sdata);
                redirect('cms', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong ! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('admin-reset-password/' . $u_id, 'refresh');
            }
        }
    }

}
