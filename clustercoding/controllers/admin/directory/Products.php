<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/products_model', 'products_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Products';
        $data['active_menu'] = 'directory';
        $data['active_sub_menu'] = 'products';
        $data['active_sub_sub_menu'] = '';
        $data['products_info'] = $this->products_mdl->get_products_info();
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/products/manage_products_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function published_product($product_id) {
        $product_info = $this->products_mdl->get_product_by_product_id($product_id);
        if (!empty($product_info)) {
            $result = $this->products_mdl->published_product_by_id($product_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/products', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/products', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/products', 'refresh');
        }
    }

    public function unpublished_product($product_id) {
        $product_info = $this->products_mdl->get_product_by_product_id($product_id);
        if (!empty($product_info)) {
            $result = $this->products_mdl->unpublished_product_by_id($product_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/products', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/products', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/products', 'refresh');
        }
    }

    public function remove_product($product_id) {
        $product_info = $this->products_mdl->get_product_by_product_id($product_id);
        if (!empty($product_info)) {
            $result = $this->products_mdl->remove_product_by_id($product_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/products', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/listing/products', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/listing/products', 'refresh');
        }
    }

}
