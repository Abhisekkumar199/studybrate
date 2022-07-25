<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Qa extends CC_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/home_model', 'qa_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'All Questions/Answers';
        $data['qa'] = $this->qa_mdl->get_all_qa();
        $data['main_content'] = $this->load->view('directory_views/qa/all_qa', $data, TRUE);
        $this->load->view('directory_views/user_master_inner', $data);
    }


}
