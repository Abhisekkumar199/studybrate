<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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

class Settings_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_settings = 'tbl_settings';

    public function get_settings_info() {
        $result = $this->db->get($this->_settings);
        return $result->row_array();
    }

    public function update_system_setting($setting_id, $data) {
        $this->db->update($this->_settings, $data, array('setting_id' => $setting_id));
        return $this->db->affected_rows();
    }

}
