<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Blogs extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/Blogs_model', 'blogs_mdl');
    }

    public function index() 
    {
        $data = array();
        $data['title'] = 'Manage Blogs';
        $data['blogs_info'] = $this->blogs_mdl->get_all_blogs($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/blogs/manage_blogs_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_blogs() 
    {
        $data = array();
        $data['listing_info'] = $this->blogs_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) 
        {
            $data['title'] = 'Add blog';
            $data['count_blogs'] = $this->blogs_mdl->count_all_blogs_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/blogs/add_blog_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } 
        else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_blog_details() {
        $config = array(
            array(
                'field' => 'blog_name',
                'label' => 'blog name',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'blog_details',
                'label' => 'blog details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        if (empty($_FILES['picture_name']['name'])) 
        {
            $this->form_validation->set_rules('picture_name', 'picture', 'required');
        }
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->add_blogs();
        } 
        else 
        {
            $data['blog_name'] = $this->input->post('blog_name', TRUE);
            $data['blog_details'] = $this->input->post('blog_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');
            
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/company_blogs";  
                $tmp_name = $_FILES["picture_name"]["tmp_name"];
                $name = basename($_FILES["picture_name"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['image_path'] = $_FILES['picture_name']['name'];
            }
            
            //$data['image_path'] = $this->add_picture();

            $insert_id = $this->blogs_mdl->store_blog_info($data);
            if (!empty($insert_id)) 
            {
                $sdata['success'] = 'blog add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/blogs', 'refresh');
            } 
            else 
            {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/blogs/add_blogs', 'refresh');
            }
        }
    }

    public function add_picture() 
    {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
        {
            $config['upload_path'] = 'assets/uploaded_files/company_blogs/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) 
            {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/blogs/add_blogs', 'refresh');
            } 
            else 
            {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->picture_resize($path, $file);
                return $picture_name;
            }
        } 
        else
        {
            $sdata['exception'] = 'Picture is required. Please <b>upload a picture</b> and try again !';
            $this->session->set_userdata($sdata);
            redirect('user/blogs/add_blogs', 'refresh');
        }
    }

    public function picture_resize($path, $file) 
    {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_blogs/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/blogs/add_blogs', 'refresh');
        }
        return TRUE;
    }

    public function edit_blog($blog_id = NULL) 
    {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['blog_info'] = $this->blogs_mdl->get_blog_by_blog_id_and_user_id($user_id, $blog_id);
        if (!empty($data['blog_info'])) {
            $data['title'] = 'Edit blog';
            $data['listing_info'] = $this->blogs_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/blogs/edit_blog_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata['exception'] = 'Content not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/blogs', 'refresh');
        }
    }

    public function update_blog_details($blog_id = NULL) 
    {
        $user_id = $this->session->userdata('user_id');
        $blogs_info = $this->blogs_mdl->get_blog_by_blog_id_and_user_id($user_id, $blog_id);
        if ($blog_id == NULL || empty($blogs_info)) {
            $sdata['exception'] = 'blog not found !';
            $this->session->set_userdata($sdata);
            redirect('user/blogs', 'refresh');
        }
        $config = array(
            array(
                'field' => 'blog_name',
                'label' => 'blog name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'blog_details',
                'label' => 'blog details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->edit_blog($blog_id);
        } 
        else 
        {
            $data['blog_name'] = $this->input->post('blog_name', TRUE);
            $data['blog_details'] = $this->input->post('blog_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s'); 
            
            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) 
            {
                $uploads_dir = "./assets/uploaded_files/company_blogs";  
                $tmp_name = $_FILES["picture_name"]["tmp_name"];
                $name = basename($_FILES["picture_name"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $data['image_path'] = $_FILES['picture_name']['name'];
            }

            $insert_id = $this->blogs_mdl->update_blog_info($blog_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'blog update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/blogs', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/blogs/edit_blog/' . $blog_id, 'refresh');
            }
        }
    }
    
    public function remove_blog($blog_id = NULL) 
    {
        $user_id = $this->session->userdata('user_id');
        $blog_info = $this->blogs_mdl->get_blog_by_blog_id_and_user_id($user_id, $blog_id);
        if (!empty($blog_info)) {
            $result = $this->blogs_mdl->remove_blog_by_id($blog_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/blogs', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/blogs', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/blogs', 'refresh');
        }
    }

    public function update_picture($blog_id) 
    {
        $current_picture = $this->input->post('current_picture', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_blogs/';
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
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/blogs/edit_blog/' . $blog_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file, $blog_id);
                if (!empty($current_picture)) {
                    unlink('assets/uploaded_files/company_blogs/' . $current_picture);
                    unlink('assets/uploaded_files/company_blogs/resize/' . $current_picture);
                }
                return $picture_name;
            }
        } else {
            return $current_picture;
        }
    }

    public function update_picture_resize($path, $file, $blog_id) 
    {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_blogs/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/blogs/edit_blog/' . $blog_id, 'refresh');
        }
        return TRUE;
    }

    

}
