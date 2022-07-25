<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Notes_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_listing = 'dir_listing';
    private $_notes = 'dir_notes';

    public function store_note_info($data) 
    {
        $this->db->insert($this->_notes, $data);
        return $this->db->insert_id();
    }
    
    public function insert_notes_image($data) 
    {
        $this->db->insert('dir_notes_images', $data);
        return $this->db->insert_id();
    }

    public function get_all_notes($user_id) 
    {
        $this->db->select('note.*, listing.company_name')
                ->from('dir_notes as note')
                ->join('dir_listing as listing', 'note.listing_id = listing.listing_id')
                ->where('note.user_id', $user_id)
                ->where('note.deletion_status', 0)
                ->where('note.publication_status', 1)
                ->order_by('note.note_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_all_listing($user_id) 
    {
        $result = $this->db->order_by('listing_id', 'desc')->get_where($this->_listing, array('user_id' => $user_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->result_array();
    }
    
    public function get_all_notes_images($note_id) 
    {
        $result = $this->db->order_by('id', 'dascesc')->get_where('dir_notes_images', array('notes_id' => $note_id));
        return $result->result_array();
    }

    public function count_all_notes_by_user_id($user_id) 
    {
        $result = $this->db->get_where($this->_notes, array('user_id' => $user_id, 'deletion_status' => 0));
        return $result->num_rows();
    }

    public function get_note_by_note_id_and_user_id($user_id, $note_id) 
    {
        $result = $this->db->get_where($this->_notes, array('user_id' => $user_id, 'note_id' => $note_id, 'publication_status' => 1, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function update_note_info($note_id, $data) 
    {
        $this->db->update($this->_notes, $data, array('note_id' => $note_id));
        return $this->db->affected_rows();
    }

    public function remove_note_by_id($note_id) 
    {
        $this->db->update($this->_notes, array('deletion_status' => 1), array('note_id' => $note_id));
        return $this->db->affected_rows();
    }

}
