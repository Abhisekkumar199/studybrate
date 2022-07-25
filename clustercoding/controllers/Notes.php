<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class notes extends CC_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/notes_model', 'notes_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
    }

    public function index() {
        $data = array(); 
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['title'] = 'notes';
        $data['all_notes'] = $this->notes_mdl->get_all_notes();
        $data['main_content'] = $this->load->view('directory_views/notes', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }

    public function load_more_notes() {
        $note_id = $this->input->post('id', TRUE);
        $notes_info = $this->notes_mdl->more_notes($note_id);

        $output = '';
        $id = '';
        if (count($notes_info) > 0) {
            foreach ($notes_info as $v_note_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure"> 
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('notes/note_details/' . $v_note_info['note_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('notes/note_details/' . $v_note_info['note_id'] . '.html') . '">' . character_limiter($v_note_info['note_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_note_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_note_info['address'] . ", " . $v_note_info['state'] . ", " . $v_note_info['city_name'] . ", " . $v_note_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_note_info['note_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="notes/load_more_notes" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No note available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function category_notes($category_id = NULL) 
    {
        $data = array();
        $data['category_info'] = $this->notes_mdl->get_category_info_by_category_id($category_id);
        if (!empty($data['category_info'])) {
            $data['title'] = 'notes by Category';
            $data['all_notes'] = $this->notes_mdl->get_all_notes_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/notes/category_notes_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_category_notes(){
        $note_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $notes_info = $this->notes_mdl->more_category_notes($note_id, $category_id);

        $output = '';
        $id = '';
        if (count($notes_info) > 0) {
            foreach ($notes_info as $v_note_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_notes/resize/' . $v_note_info['image_path']) . '" width="270" alt="' . $v_note_info['note_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('notes/note_details/' . $v_note_info['note_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('notes/note_details/' . $v_note_info['note_id'] . '.html') . '">' . character_limiter($v_note_info['note_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_note_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_note_info['address'] . ", " . $v_note_info['state'] . ", " . $v_note_info['city_name'] . ", " . $v_note_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_note_info['note_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$category_id.'" data-link="notes/load_more_category_notes" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No note available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function location_notes($city_id = NULL) {
        $data = array();
        $data['city_info'] = $this->notes_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) {
            $data['title'] = 'notes by Category';
            $data['all_notes'] = $this->notes_mdl->get_all_notes_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/notes/location_notes_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function load_more_location_notes(){
        $note_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $notes_info = $this->notes_mdl->more_city_notes($note_id, $city_id);

        $output = '';
        $id = '';
        if (count($notes_info) > 0) {
            foreach ($notes_info as $v_note_info) {
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url('assets/uploaded_files/company_notes/resize/' . $v_note_info['image_path']) . '" width="270" alt="' . $v_note_info['note_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('notes/note_details/' . $v_note_info['note_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                    <h6><a href="' . base_url('notes/note_details/' . $v_note_info['note_id'] . '.html') . '">' . character_limiter($v_note_info['note_name'], 15) . '</a></h6>
                                </div>
                                <div class="listing-disc">
                                    <p></p>
                                </div>
                                <div class="listing-location pull-left"><!-- location-->
                                    <a href="#"><i class="fa fa-briefcase"></i>' . character_limiter($v_note_info['company_name'], 24) . '</a>
                                    <a href="#"><i class="fa fa-map-marker"></i>' . $v_note_info['address'] . ", " . $v_note_info['state'] . ", " . $v_note_info['city_name'] . ", " . $v_note_info['zip'] . '</a>
                                </div><!-- location end-->
                                <div class="star-rating pull-right"><!-- rating-->
                                    <!--<div class="score-callback" data-score="5"></div>-->
                                </div><!-- rating end-->
                            </div>
                        </div>
                        <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_note_info['note_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="'.$city_id.'" data-link="notes/load_more_location_notes" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No note available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function note_details($note_id = NULL) {
      
        $data = array();
        $data['note'] = $this->notes_mdl->get_note_info_by_note_id($note_id); 
        $data['notes_images'] = $this->notes_mdl->get_all_notes_images($note_id);
            $data['title'] = $data['note']['note_name'];
            $data['main_content'] = $this->load->view('directory_views/notes/note_details', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);

    }

    public function give_heart($note_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['note_id'] = $note_id;
        $note_check = $this->notes_mdl->get_note_info_by_note_id($note_id);
        $heart_check = $this->notes_mdl->count_heart_by_user_id_and_note_id($data['user_id'], $note_id);
        if (!empty($note_check) && !empty($data['user_id']) && $heart_check == 0) {
            $data['date_added'] = date('Y-m-d H:i:s');
            $result = $this->notes_mdl->give_heart_by_user_id_and_note_id($data);
            if (!empty($result)) {
                redirect('notes/note_details/' . $note_id);
            } else {
                redirect('notes/note_details/' . $note_id);
            }
        } else {
            redirect();
        }
    }

    public function submit_comment($note_id = NULL) {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['note_id'] = $note_id;
        $note_check = $this->notes_mdl->get_note_info_by_note_id($note_id);
        if (!empty($note_check) && !empty($data['user_id'])) {
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
                redirect('notes/note_details/' . $note_id);
            } else {
                $data['comment'] = $this->input->post('comment', TRUE);
                $data['date_added'] = date('Y-m-d H:i:s');
                $result = $this->notes_mdl->store_note_comment($data);
                $sdata = array();
                if (!empty($result)) {
                    $sdata['success'] = 'Comment published successfully.';
                    $this->session->set_userdata($sdata);
                    redirect('notes/note_details/' . $note_id);
                } else {
                    $sdata['exception'] = 'Operation failed! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('notes/note_details/' . $note_id);
                }
            }
        } else {
            redirect();
        }
    }

}
