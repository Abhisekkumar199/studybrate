<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class teachers_listing extends CC_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/listing_model', 'list_mdl');
        $this->load->model('directory_models/categories_model', 'cat_mdl');
        $this->load->model('directory_models/home_model', 'home_mdl');
    }

    public function index() 
    {
        $data = array();
        $data['title'] = 'Listing';
        $data['all_listing'] = $this->list_mdl->get_all_listing_t();
        $data['recent_listing'] = $this->list_mdl->get_recent_listing();
        $data['popular_listing'] = $this->list_mdl->get_popural_listing();
        $data['static_pages'] = $this->home_mdl->static_pages();
        $data['main_content'] = $this->load->view('directory_views/listing/listing_content_t', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }

    

    public function category_listing($category_id = NULL) 
    {
        
        $data = array();
        $data['header_menu'] = $this->cat_mdl->headerMenu();  
        $data['static_pages'] = $this->home_mdl->static_pages();
        
        $data1 = explode('-', $category_id);
        $category_id = $data1[0];
        $parent_category = $data1[1];
         
        $data['current_category'] = $parent_category;
        $data['child_categories'] = $this->cat_mdl->get_child_categories_list($parent_category);
        $data['category_info'] = $this->list_mdl->get_category_info_by_category_id($category_id);
        
        if (!empty($data['category_info'])) 
        {
            $data['title'] = 'Listing by Category';
            $data['all_listing'] = $this->list_mdl->get_all_listing_by_category_id($category_id);
            $data['main_content'] = $this->load->view('directory_views/listing/filter_listing_v', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);
        } 
        else 
        {
            redirect();
        }
    }
    
    public function location_listing($city_id = NULL) 
    {
        $data = array();
        $data['header_menu'] = $this->cat_mdl->headerMenu();  
        $data['static_pages'] = $this->home_mdl->static_pages();
        $data1 = explode('-', $city_id);
        $city_id = $data1[0];
        $parent_category = $data1[1];
        
        $data['current_category'] = $parent_category;
        $data['child_categories'] = $this->cat_mdl->get_child_categories_list($parent_category);
        $data['city_info'] = $this->list_mdl->get_city_info_by_city_id($city_id);
        if (!empty($data['city_info'])) 
        {
            $data['title'] = 'Listing by Category';
            $data['all_listing'] = $this->list_mdl->get_all_listing_by_city_id($city_id);
            $data['main_content'] = $this->load->view('directory_views/listing/filter_listing_v', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);
        } 
        else 
        {
            redirect();
        }
    }
    
    public function load_more_listing() 
    {
        $listing_id = $this->input->post('id', TRUE); 
        $listing_info = $this->list_mdl->more_listing_t($listing_id); 
        $output = '';
        $id = '';
        if (count($listing_info) > 0) 
        {
            foreach ($listing_info as $v_listing) 
            {
                $company_logo = '';
                if (!empty($v_listing['company_logo'])) 
                {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_listing['company_logo'];
                } 
                else 
                {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                }
                $output .= '<div class="col-md-6">
                  <div class="strip grid">
                    <figure>
                      <a href="institute.html" class="wish_bt"></a>
                      <a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '"><img src="' . base_url($company_logo) . '" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
                      <small>IIT/AIEEE</small>
                    </figure>
                    <div class="wrapper">
                      <h3><a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '">' . $v_listing['company_name'] . '</a></h3>
                      <p>' . character_limiter($v_listing['about_company'], 250) . '</p>
                      <a class="address" href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361">Get directions</a>
                    </div>
                    <ul>
                      <li><span class="loc_open">' . $v_listing['city_name'] . '</span></li>
                      <li><div class="score"><span>Superb<em>'.$v_listing['totalreview'].' Reviews</em></span><strong>'.$v_listing['averagerating'].'</strong></div></li>
                    </ul>
                  </div>
                </div>';
                $id = $v_listing['listing_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="" data-link="listing/load_more_listing" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } 
        else 
        {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No More Institutes Found !!! </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function load_more_category_listing() 
    {
        $listing_id = $this->input->post('id', TRUE);
        $category_id = $this->input->post('cid', TRUE);
        $listing_info = $this->list_mdl->more_category_listing($listing_id, $category_id);

        $output = '';
        $id = '';
        if (count($listing_info) > 0) 
        {
            foreach ($listing_info as $v_listing) 
            {
                $company_logo = '';
                if (!empty($v_listing['company_logo'])) 
                {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_listing['company_logo'];
                } 
                else 
                {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                }
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url($company_logo) . '" width="270" alt="' . $v_listing['company_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                <h6><a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '">' . character_limiter($v_listing['company_name'], 15) . '</a></h6>
                            </div>
                            <div class="listing-disc">
                                <p>' . character_limiter($v_listing['about_company'], 250) . '</p>
                            </div>
                            <div class="listing-location pull-left"><!-- location-->
                                <a href="#"><i class="fa fa-briefcase"></i> ' . character_limiter($v_listing['company_name'], 24) . '</a>
                                <a href="#"><i class="fa fa-map-marker"></i> ' . $v_listing['address'] . ", " . $v_listing['state'] . ", " . $v_listing['city_name'] . ", " . $v_listing['zip'] . '</a>
                            </div><!-- location end-->
                            <div class="star-rating pull-right"><!-- rating-->
                                <!--<div class="score-callback" data-score="5"></div>-->
                            </div><!-- rating end-->
                        </div>
                    </div>
                    <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_listing['listing_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="' . $category_id . '" data-link="listing/load_more_category_listing" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } 
        else 
        {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No listing available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    
    
    
    
    
    
    
    
    
    

    public function load_more_location_listing() 
    {
        $listing_id = $this->input->post('id', TRUE);
        $city_id = $this->input->post('cid', TRUE);
        $listing_info = $this->list_mdl->more_city_listing($listing_id, $city_id);

        $output = '';
        $id = '';
        if (count($listing_info) > 0) {
            foreach ($listing_info as $v_listing) {
                $company_logo = '';
                if (!empty($v_listing['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_listing['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                }
                $output .= '
                <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                    <div class="listing-item clearfix">
                        <div class="figure">
                            <img src="' . base_url($company_logo) . '" width="270" alt="' . $v_listing['company_name'] . '"/>
                            <div class="listing-overlay">
                                <div class="listing-overlay-inner rgba-bgyallow-1">
                                    <div class="overlay-content">
                                        <ul class="listing-links">
                                            <li><a class="bgwhite nohover" href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '"><i class="fa fa-search green-1 "></i></a></li>
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
                                <h6><a href="' . base_url('listing/listing_details/' . $v_listing['listing_id'] . '.html') . '">' . character_limiter($v_listing['company_name'], 15) . '</a></h6>
                            </div>
                            <div class="listing-disc">
                                <p>' . character_limiter($v_listing['about_company'], 250) . '</p>
                            </div>
                            <div class="listing-location pull-left"><!-- location-->
                                <a href="#"><i class="fa fa-briefcase"></i> ' . character_limiter($v_listing['company_name'], 24) . '</a>
                                <a href="#"><i class="fa fa-map-marker"></i> ' . $v_listing['address'] . ", " . $v_listing['state'] . ", " . $v_listing['city_name'] . ", " . $v_listing['zip'] . '</a>
                            </div><!-- location end-->
                            <div class="star-rating pull-right"><!-- rating-->
                                <!--<div class="score-callback" data-score="5"></div>-->
                            </div><!-- rating end-->
                        </div>
                    </div>
                    <div class="listing-border-bottom bgyallow-1"></div>
                </div>';
                $id = $v_listing['listing_id'];
            }
            $output .= '
                <div id="remove_row">
                    <center>
                        <button type="button" name="btn_more" data-id="' . $id . '" data-cid="' . $city_id . '" data-link="listing/load_more_location_listing" id="btn_more" class="btn bggreen-1 btn-sm">Load more...</button>
                    </center>
                </div>';
        } else {
            $output .= '
                <div>
                    <center>
                        <button type="button" name="btn_more"  id="" class="btn bggreen-1 btn-sm">No listing available </button>
                    </center>
                </div>';
        }
        echo $output;
    }

    public function teacher_details($listing_id = NULL) 
    { 
        $data = array();
        
        $data['listing_id'] = $listing_id;
        $data['header_menu'] = $this->cat_mdl->headerMenu(); 
        $data['static_pages'] = $this->home_mdl->static_pages();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) 
        {
            $data['title'] = $data['listing_info']['company_name'];
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            $data['recent_blogs'] = $this->list_mdl->get_recent_blogs_by_listing_id($listing_id);
            $data['recent_notes'] = $this->list_mdl->get_recent_notes_by_listing_id($listing_id);
            $data['recent_galaries'] = $this->list_mdl->get_recent_gallary_by_listing_id($listing_id);
            $data['review_list'] = $this->list_mdl->get_all_reviews_published($listing_id);
            $data['question_list'] = $this->list_mdl->get_all_questions_published($listing_id);
            
            $data['recent_courses'] = $this->list_mdl->get_recent_courses_by_listing_id($listing_id);
            $data['recent_images'] = $this->list_mdl->get_recent_images_by_listing_id($listing_id);
            $data['recent_videos'] = $this->list_mdl->get_recent_videos_by_listing_id($listing_id);
            // update total views
            $total_views = $data['listing_info']['total_views'] + 1;
            $this->list_mdl->update_total_views($listing_id, $total_views);
            $data['main_content'] = $this->load->view('directory_views/listing/teacher_details', $data, TRUE);
            $this->load->view('directory_views/user_master_inner', $data);
        } 
        else 
        {
            redirect();
        }
    }

    public function images($listing_id = NULL) 
    {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['images_info'] = $this->list_mdl->get_images_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/images_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function products($listing_id = NULL) 
    {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['products_info'] = $this->list_mdl->get_products_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/products_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function services($listing_id = NULL) 
    {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['services_info'] = $this->list_mdl->get_services_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/services_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function articles($listing_id = NULL) 
    {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['articles_info'] = $this->list_mdl->get_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/articles_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

    public function videos($listing_id = NULL) 
    {
        $data = array();
        $data['listing_info'] = $this->list_mdl->get_listing_info_by_listing_id($listing_id);
        if (!empty($data['listing_info'])) {
            $data['title'] = $data['listing_info']['company_name'];
            $data['videos_info'] = $this->list_mdl->get_videos_by_listing_id($listing_id);
            $data['recent_articles'] = $this->list_mdl->get_recent_articles_by_listing_id($listing_id);
            // count all
            $data['total_images'] = $this->list_mdl->count_total_images_by_listing_id($listing_id);
            $data['total_videos'] = $this->list_mdl->count_total_videos_by_listing_id($listing_id);
            $data['total_products'] = $this->list_mdl->count_total_products_by_listing_id($listing_id);
            $data['total_services'] = $this->list_mdl->count_total_services_by_listing_id($listing_id);
            $data['total_articles'] = $this->list_mdl->count_total_articles_by_listing_id($listing_id);
            $data['main_content'] = $this->load->view('directory_views/listing/videos_v', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            redirect();
        }
    }

}
