<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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

class Payments_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_payments = 'dir_payments';

    public function get_payments_info() {
        $this->db->select('payment.*, user.first_name, user.last_name, listing.company_name, package.package_name, package.price')
                ->from('dir_payments as payment')
                ->join('dir_listing as listing', 'payment.listing_id = listing.listing_id','left')
                ->join('tbl_users as user', 'payment.user_id = user.user_id','left')
                ->join('dir_packages as package', 'user.package_id = package.package_id','left')
                ->order_by('payment.payment_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_payment_info_by_payment_id($payment_id){
        $result = $this->db->get_where($this->_payments, array('payment_id' => $payment_id, 'status' => 0));
        return $result->row_array();
    }

    public function confirm_payment_by_payment_id($payment_id) {
        $this->db->update($this->_payments, array('status' => 1), array('payment_id' => $payment_id));
        return $this->db->affected_rows();
    }

}
