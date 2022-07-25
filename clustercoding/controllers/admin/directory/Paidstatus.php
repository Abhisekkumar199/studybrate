<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paidstatus extends CC_Controller {
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

    public function __construct() 
    {
        parent::__construct();
        // Check Login Status
        $this->user_login_authentication();
        // Load Model
        $this->load->model('admin_models/directory_models/paidstatus_model', 'paidstatus_mdl');
    }

    public function index($listingid) 
    {  
        $data = array();
        $data['title'] = 'Manage Paid status';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'Paid status';
        $data['active_sub_sub_menu'] = '';
        $data['listingid'] = $listingid;
        $data['listing_info'] = $this->paidstatus_mdl->get_status_by_listing_id($listingid); 
        //print_r($data['listing_info']);
        //die();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/paidstatus/paidstatus_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function update_status() 
    {
        $listingid = $this->input->post('listingid', TRUE); 
        $listing_info = $this->paidstatus_mdl->get_status_by_listing_id($listingid);
        if (!empty($listing_info)) 
        {
            
            $data = array();
            $data['paid_status'] = $this->input->post('paid_status', TRUE);
            $data['package'] = $this->input->post('package', TRUE);
            $data['expire_date'] = $this->input->post('expire_date', TRUE);
            $result = $this->paidstatus_mdl->update_status_by_listing_id($listingid,$data);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Status updated .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/paidstatus/'.$listingid, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/paidstatus/'.$listingid, 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/paidstatus/'.$listingid, 'refresh');
        }
    }

    
}
