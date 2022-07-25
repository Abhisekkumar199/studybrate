<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class blogs extends CC_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/blogs_model', 'blg_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
    }

    public function index() 
    {
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['title'] = 'blogs';
        $data['all_blogs'] = $this->blg_mdl->get_all_blogs();
        
        $data['main_content'] = $this->load->view('directory_views/blogs', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }

    public function load_more_blogs() 
    {
        $blog_id = $this->input->post('id', TRUE);
        $blogs_info = $this->blg_mdl->more_blogs($blog_id);

        $output = '';
        $id = '';
        if (count($blogs_info) > 0) {
            foreach ($blogs_info as $v_blog_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_blogs/resize/' . $v_blog_info['image_path']) . '" width="270" alt="' . $v_blog_info['blog_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('blogs/blog_details/' . $v_blog_info['blog_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="listing-content clearfix">
                                <div class="listing-meta-cat">
                                    <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                </div>
                                <div class="listing-title">
                                    <h6><a href="' . base_url('blogs/blog_details/' . $v_blog_info['blog_id'] . '.html') . '">' . character_limiter($v_blog_info['blog_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_blog_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_blog_info['address'] . ", " . $v_blog_info['state'] . ", " . $v_blog_info['city_name'] . ", " . $v_blog_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_blog_info['blog_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="blogs/load_more_blogs" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No blog available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_blogs($category_id = NULL) 
    {
        $data = array();
        $data['category_info'] = $this->blg_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'blogs by Category';
            $data['all_blogs'] = $this->blg_mdl->get_all_blogs_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/blogs/category_blogs_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_category_blogs()
    {
        $blog_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $blogs_info = $this->blg_mdl->more_category_blogs($blog_id, $category_id);

        $output = '';
        $id = '';
        if (count($blogs_info) > 0) {
            foreach ($blogs_info as $v_blog_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_blogs/resize/' . $v_blog_info['image_path']) . '" width="270" alt="' . $v_blog_info['blog_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('blogs/blog_details/' . $v_blog_info['blog_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="listing-content clearfix">
                                <div class="listing-meta-cat">
                                    <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                </div>
                                <div class="listing-title">
                                    <h6><a href="' . base_url('blogs/blog_details/' . $v_blog_info['blog_id'] . '.html') . '">' . character_limiter($v_blog_info['blog_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_blog_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_blog_info['address'] . ", " . $v_blog_info['state'] . ", " . $v_blog_info['city_name'] . ", " . $v_blog_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_blog_info['blog_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="blogs/load_more_category_blogs" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No blog available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_blogs($city_id = NULL) 
    {
        $data = array();
        $data['city_info'] = $this->blg_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'blogs by Category';
            $data['all_blogs'] = $this->blg_mdl->get_all_blogs_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/blogs/location_blogs_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_location_blogs()
    {
        $blog_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $blogs_info = $this->blg_mdl->more_city_blogs($blog_id, $city_id);

        $output = '';
        $id = '';
        if (count($blogs_info) > 0) {
            foreach ($blogs_info as $v_blog_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_blogs/resize/' . $v_blog_info['image_path']) . '" width="270" alt="' . $v_blog_info['blog_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('blogs/blog_details/' . $v_blog_info['blog_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="listing-content clearfix">
                                <div class="listing-meta-cat">
                                    <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                </div>
                                <div class="listing-title">
                                    <h6><a href="' . base_url('blogs/blog_details/' . $v_blog_info['blog_id'] . '.html') . '">' . character_limiter($v_blog_info['blog_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_blog_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_blog_info['address'] . ", " . $v_blog_info['state'] . ", " . $v_blog_info['city_name'] . ", " . $v_blog_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_blog_info['blog_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="blogs/load_more_location_blogs" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No blog available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function blog_details($blog_id = NULL) 
    {
      
        $data = array();
        $data['blog'] = $this->blg_mdl->get_blog_info_by_blog_id($blog_id);
        
        
            $data['title'] = $data['blog']['blog_name'];
            $data['main_content'] = $this->load->view('directory_views/blogs/blog_details', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);

    }

    public function give_heart($blog_id = NULL) 
    {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['blog_id'] = $blog_id;
        $blog_check = $this->blg_mdl->get_blog_info_by_blog_id($blog_id);
        $heart_check = $this->blg_mdl->count_heart_by_user_id_and_blog_id($data['user_id'], $blog_id);
        if (!empty($blog_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->blg_mdl->give_heart_by_user_id_and_blog_id($data);
            if (!empty($result)) {
                redirect('blogs/blog_details/' . $blog_id);
            } else {
                redirect('blogs/blog_details/' . $blog_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($blog_id = NULL) 
    {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['blog_id'] = $blog_id;
        $blog_check = $this->blg_mdl->get_blog_info_by_blog_id($blog_id);
        if (!empty($blog_check) && !empty($data['user_id'])) {
            $config = array(
                array(
                    'field' => 'comment',
                    'label' => 'message',
                    'rules' => 'trim|required|max_length[1000]'
                ),
                array(
                    'field' => 'security_code',
                    'label' => 'ans',
                    'rules' => 'trim'
                ),
                array(
                    'field' => 'confirm_security_code',
                    'label' => 'result',
                    'rules' => 'trim|required|matches[security_code]'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $sdata['exception'] = validation_errors();
                $this->session->set_userdata($sdata);
                redirect('blogs/blog_details/' . $blog_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->blg_mdl->store_blog_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('blogs/blog_details/' . $blog_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('blogs/blog_details/' . $blog_id);
                }
            }
        } else {
            redirect();
        }
    }

}
