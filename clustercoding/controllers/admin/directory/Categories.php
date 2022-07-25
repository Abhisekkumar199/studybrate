<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CC_Controller {
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
        $this->load->model('admin_models/directory_models/categories_model', 'cat_mdl');
        $this->load->model('admin_models/directory_models/subjects_model', 'sub_mdl');
    }

    public function index() 
    {
        $data = array();
          $parentid = $this->input->get('parent', TRUE); 
        //die();
        if($parentid < 1)
        {
            $parentid = 0;
        } 
        $data['title'] = 'Manage Categories';
        $data['active_menu'] = 'category';
        $data['active_sub_menu'] = 'categories';
        $data['active_sub_sub_menu'] = '';
        $data['categories_info'] = $this->cat_mdl->get_categories_info($parentid);
        $data['parentcategory'] = $parentid;
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/categories/manage_categories_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function add_category() {
        $data = array();
        $data['title'] = 'Add Category';
        $data['active_menu'] = 'category';
        $data['active_sub_menu'] = 'categories';
        $data['active_sub_sub_menu'] = ''; 
        $parentid = $this->input->get('parent', TRUE); 
        if($parentid < 1)
        {
            $parentid = 0;
        } 
        $data['parentcategory'] = $parentid;
        $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
        $data['main_content'] = $this->load->view('admin_views/directory/categories/add_category_v', $data, TRUE);
        $this->load->view('admin_views/admin_master_v', $data);
    }

    public function create_category() {
        $config = array(
            array(
                'field' => 'category_name',
                'label' => 'category name',
                'rules' => 'trim|required|max_length[250]'
            ), 
            array(
                'field' => 'publication_status',
                'label' => 'publication status',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->add_category();
        } 
        else 
        {
            
            
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/category_img";  
                $tmp_name = $_FILES["picture_name"]["tmp_name"];
                $name = basename($_FILES["picture_name"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['category_image'] = $_FILES['picture_name']['name'];
            }
            
             
            
            $parentid = $this->input->post('parent_category', TRUE);
            $data['category_name'] = $this->input->post('category_name', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['icon_name'] = $this->input->post('icon_name', TRUE);
            $data['color_name'] = $this->input->post('color_name', TRUE);
            $data['parent_id'] = $this->input->post('parent_category', TRUE);
            $data['publication_status'] = $this->input->post('publication_status', TRUE);
            $data['user_id'] = $this->session->userdata('admin_id');
            $data['date_added'] = date('Y-m-d H:i:s');

            $insert_id = $this->cat_mdl->store_category($data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
                redirect('directory/categories?parent='.$parentid, 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/categories?parent='.$parentid, 'refresh');
            }
        }
    }

    public function published_category($category_id) {
        $category_info = $this->cat_mdl->get_category_by_category_id($category_id);
        if (!empty($category_info)) {
            $result = $this->cat_mdl->published_category_by_id($category_id);
            if (!empty($result)) {
                $sdata['success'] = 'Published successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/categories', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/categories', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/categories', 'refresh');
        }
    }

    public function unpublished_category($category_id) {
        $category_info = $this->cat_mdl->get_category_by_category_id($category_id);
        if (!empty($category_info)) {
            $result = $this->cat_mdl->unpublished_category_by_id($category_id);
            if (!empty($result)) {
                $sdata['success'] = 'Unublished successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/categories', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/categories', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/categories', 'refresh');
        }
    }

    public function edit_category($category_id) {
        $data = array();
        $data['category_info'] = $this->cat_mdl->get_category_by_category_id($category_id);
        if (!empty($data['category_info'])) 
        {
            $data['title'] = 'Edit Category';
            $data['active_menu'] = 'category';
            $data['active_sub_menu'] = 'categories';
            $data['active_sub_sub_menu'] = '';
            $data['main_menu'] = $this->load->view('admin_views/main_menu_v', $data, TRUE);
            $data['main_content'] = $this->load->view('admin_views/directory/categories/edit_category_v', $data, TRUE);
            $this->load->view('admin_views/admin_master_v', $data);
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/categories', 'refresh');
        }
    }

    public function update_category($category_id) 
    {
        $category_info = $this->cat_mdl->get_category_by_category_id($category_id); 
        if(!empty($category_info)) 
        {
            $config = array(
                array(
                    'field' => 'category_name',
                    'label' => 'category name',
                    'rules' => 'trim|required|max_length[100]'
                ),
                array(
                    'field' => 'description',
                    'label' => 'description',
                    'rules' => 'trim|required|max_length[250]'
                ),
                array(
                    'field' => 'icon_name',
                    'label' => 'icon name',
                    'rules' => 'trim|required|max_length[50]'
                ),
                array(
                    'field' => 'color_name',
                    'label' => 'color name',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'publication_status',
                    'label' => 'publication status',
                    'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) 
            {
                $this->edit_category($category_id);
            } 
            else 
            { 
                $data['category_name'] = $this->input->post('category_name', TRUE);
                $data['description'] = $this->input->post('description', TRUE);
                $data['icon_name'] = $this->input->post('icon_name', TRUE);
                $data['color_name'] = $this->input->post('color_name', TRUE);
                $data['publication_status'] = $this->input->post('publication_status', TRUE);
                $data['last_updated'] = date('Y-m-d H:i:s');
                 
                if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
                {
                    $uploads_dir = "./assets/uploaded_files/category_img";  
                    $tmp_name = $_FILES["picture_name"]["tmp_name"];
                    $name = basename($_FILES["picture_name"]["name"]);
                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    $data['category_image'] = $_FILES['picture_name']['name'];
                }
                
                
                $result = $this->cat_mdl->update_category($category_id, $data);
                if (!empty($result)) 
                {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
                    redirect('directory/categories', 'refresh');
                } 
                else 
                {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('directory/categories', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/categories', 'refresh');
        }
    }

    public function remove_category($category_id) {
        $category_info = $this->cat_mdl->get_category_by_category_id($category_id);
        if (!empty($category_info)) 
        {
            $result = $this->cat_mdl->delete_category_by_id($category_id);
            if (!empty($result)) 
            {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('directory/categories', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('directory/categories', 'refresh');
            }
        } 
        else 
        {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('directory/categories', 'refresh');
        }
    }

    //  get categoryList
	public function get_child_category()
	{  
        $parentid = $this->uri->segment(2);
        $categoryList = $this->cat_mdl->get_categories_info($parentid);   
        echo json_encode($categoryList);
    }
     
    public function add_picture() 
    {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
        {
            $config['upload_path'] = 'assets/uploaded_files/category_img/';
            $config['allowed_types'] = 'jpg|svg|png|jpeg|gif'; 
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);
            //$this->load->library('upload'); 
            if (!$this->upload->do_upload('picture_name')) 
            {
                print_r($_FILES);
                echo $this->upload->display_errors();
                die();
                $sdata['error'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
              
                redirect('users/add_category', 'refresh');
            } 
            $fdata = $this->upload->data();
            $picture_name = $fdata['file_name'];
            return $picture_name;
            //else 
            //{ 
                //$fdata = $this->upload->data();
                //$picture_name = $fdata['file_name'];
               // $data = array('upload_data' => $this->upload->data());
                //$path = $data['upload_data']['full_path'];
                //$file = $data['upload_data']['file_name'];
                //$this->picture_resize($path, $file);
                //return $picture_name;
            //}
        } 
        else 
        {
            $sdata['error'] = 'Picture is required. Please <b>upload a picture</b> and try again !';
           echo  $this->session->set_userdata($sdata);
            die();
            redirect('users/add_category', 'refresh');
        }
    }

    public function picture_resize($path, $file) 
    {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 400;
        $config_resize['height'] = 300;
        $config_resize['new_image'] = 'assets/uploaded_files/category_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) 
        {
            echo "hello";
            $sdata['error'] = $this->image_lib->display_errors();
            echo $this->session->set_userdata($sdata);
            die();
            redirect('users/add_category', 'refresh');
        }
        return TRUE;
    }

}
