<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Staticpages_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }
 
    private $_table = 'dir_staticpages';

   

    public function get_page_info($slug) 
    {
        $result = $this->db->get_where($this->_table, array('page_name' => $slug));
        return $result->row_array();
    }
 

}
