<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Gallary_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_gallary = 'dir_gallary';

    public function store_gallary_info($data) {
        $this->db->insert($this->_gallary, $data);
        return $this->db->insert_id();
    }

    public function get_all_gallary($user_id) {
        $this->db->select('gallary.*, listing.company_name')
                ->from('dir_gallary as gallary')
                ->join('dir_listing as listing', 'gallary.listing_id = listing.listing_id')
                ->where('gallary.user_id', $user_id)
                ->where('gallary.deletion_status', 0)
                ->where('gallary.publication_status', 1)
                ->order_by('gallary.gallary_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }

    public function count_all_gallary_by_user_id($user_id) {
        $result = $this->db->get_where($this->_gallary, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_gallary_by_gallary_id_and_user_id($user_id, $gallary_id) {
        $result = $this->db->get_where($this->_gallary, array('user_id' => $user_id, 'gallary_id' => $gallary_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_gallary_info($gallary_id, $data) {
        $this->db->update($this->_gallary, $data, array('gallary_id' => $gallary_id));
        return $this->db->affected_rows();
    }

    public function remove_gallary_by_id($gallary_id) {
        $this->db->update($this->_gallary, array('deletion_status' => 1), array('gallary_id' => $gallary_id));
        return $this->db->affected_rows();
    }

}
