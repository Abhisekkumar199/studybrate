<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Career_councelling_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }
 
    private $_table = 'dir_career_councelling'; 
   

    public function add_student_query_info($data) {
        $this->db->insert('dir_career_councelling', $data);
         
        return $this->db->insert_id();
    }
 
}
