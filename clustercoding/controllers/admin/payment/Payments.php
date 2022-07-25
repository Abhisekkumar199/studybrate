<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/payments_model', 'pay_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Payments';
        $data['active_menu'] = 'payments';
        $data['active_sub_menu'] = '';
        $data['active_sub_sub_menu'] = '';
        $data['paymments_info'] = $this->pay_mdl->get_payments_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/payments/manage_payments_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function confirm_payment($payment_id) {
        $payment_info = $this->pay_mdl->get_payment_info_by_payment_id($payment_id);
        if (!empty($payment_info)) {
            $result = $this->pay_mdl->confirm_payment_by_payment_id($payment_id);
            if (!empty($result)) {
                $sdata['success'] = 'Confirm successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/payments', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/payments', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/payments', 'refresh');
        }
    }

}
