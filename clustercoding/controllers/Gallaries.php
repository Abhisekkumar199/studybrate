<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallaries extends CC_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/gallary_model', 'gallary_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
    }

    public function index() {
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['title'] = 'gallary';
        $data['all_gallary'] = $this->gallary_mdl->get_all_gallary();
        $data['main_content'] = $this->load->view('directory_views/gallary', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }

    public function load_more_gallary() {
        $gallary_id = $this->input->post('id', TRUE);
        $gallary_info = $this->gallary_mdl->more_gallary($gallary_id);

        $output = '';
        $id = '';
        if (count($gallary_info) > 0) {
            foreach ($gallary_info as $v_gallary_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_gallary/resize/' . $v_gallary_info['image_path']) . '" width="270" alt="' . $v_gallary_info['gallary_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('gallary/gallary_details/' . $v_gallary_info['gallary_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('gallary/gallary_details/' . $v_gallary_info['gallary_id'] . '.html') . '">' . character_limiter($v_gallary_info['gallary_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_gallary_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_gallary_info['address'] . ", " . $v_gallary_info['state'] . ", " . $v_gallary_info['city_name'] . ", " . $v_gallary_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_gallary_info['gallary_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="gallary/load_more_gallary" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No gallary available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_gallary($category_id = NULL) {
        $data = array();
        $data['category_info'] = $this->gallary_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'gallary by Category';
            $data['all_gallary'] = $this->gallary_mdl->get_all_gallary_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/gallary/category_gallary_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_category_gallary(){
        $gallary_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $gallary_info = $this->gallary_mdl->more_category_gallary($gallary_id, $category_id);

        $output = '';
        $id = '';
        if (count($gallary_info) > 0) {
            foreach ($gallary_info as $v_gallary_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_gallary/resize/' . $v_gallary_info['image_path']) . '" width="270" alt="' . $v_gallary_info['gallary_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('gallary/gallary_details/' . $v_gallary_info['gallary_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('gallary/gallary_details/' . $v_gallary_info['gallary_id'] . '.html') . '">' . character_limiter($v_gallary_info['gallary_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_gallary_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_gallary_info['address'] . ", " . $v_gallary_info['state'] . ", " . $v_gallary_info['city_name'] . ", " . $v_gallary_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_gallary_info['gallary_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="gallary/load_more_category_gallary" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No gallary available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_gallary($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->gallary_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'gallary by Category';
            $data['all_gallary'] = $this->gallary_mdl->get_all_gallary_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/gallary/location_gallary_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_location_gallary(){
        $gallary_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $gallary_info = $this->gallary_mdl->more_city_gallary($gallary_id, $city_id);

        $output = '';
        $id = '';
        if (count($gallary_info) > 0) {
            foreach ($gallary_info as $v_gallary_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_gallary/resize/' . $v_gallary_info['image_path']) . '" width="270" alt="' . $v_gallary_info['gallary_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('gallary/gallary_details/' . $v_gallary_info['gallary_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('gallary/gallary_details/' . $v_gallary_info['gallary_id'] . '.html') . '">' . character_limiter($v_gallary_info['gallary_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_gallary_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_gallary_info['address'] . ", " . $v_gallary_info['state'] . ", " . $v_gallary_info['city_name'] . ", " . $v_gallary_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_gallary_info['gallary_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="gallary/load_more_location_gallary" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No gallary available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function gallary_details($gallary_id = NULL) {
      
        $data = array();
        $data['gallary'] = $this->gallary_mdl->get_gallary_info_by_gallary_id($gallary_id);
        
        
            $data['title'] = $data['gallary']['gallary_name'];
            $data['main_content'] = $this->load->view('directory_views/gallary/gallary_details', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);

    }

    public function give_heart($gallary_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['gallary_id'] = $gallary_id;
        $gallary_check = $this->gallary_mdl->get_gallary_info_by_gallary_id($gallary_id);
        $heart_check = $this->gallary_mdl->count_heart_by_user_id_and_gallary_id($data['user_id'], $gallary_id);
        if (!empty($gallary_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->gallary_mdl->give_heart_by_user_id_and_gallary_id($data);
            if (!empty($result)) {
                redirect('gallary/gallary_details/' . $gallary_id);
            } else {
                redirect('gallary/gallary_details/' . $gallary_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($gallary_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['gallary_id'] = $gallary_id;
        $gallary_check = $this->gallary_mdl->get_gallary_info_by_gallary_id($gallary_id);
        if (!empty($gallary_check) && !empty($data['user_id'])) {
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
                redirect('gallary/gallary_details/' . $gallary_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->gallary_mdl->store_gallary_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('gallary/gallary_details/' . $gallary_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('gallary/gallary_details/' . $gallary_id);
                }
            }
        } else {
            redirect();
        }
    }

}
