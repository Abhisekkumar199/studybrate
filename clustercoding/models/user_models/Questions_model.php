<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Questions_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }
 
    private $_questions = 'dir_questions';

    public function store_question_info($data) 
    {
        $this->db->insert($this->_questions, $data);
        
        return $this->db->insert_id();
    }
    
    public function reply_answer($data,$question_id ) 
    {
        $this->db->update($this->_questions, $data, array('question_id' => $question_id));
        return $this->db->affected_rows();
    }
    
    public function get_all_questions() 
    {
        $this->db->select('*')
                ->from('dir_user_questions')  
                ->order_by('question_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }
    
    public function get_listing_ids($user_id) 
    {
        $rows = $this->db->select('listing_id')
                ->from('dir_listing')  
                ->where('user_id', $user_id);
        $query_result = $this->db->get(); 
        $result = $query_result->result_array();
        return $result;
    }
    
     public function get_questions_info($listing_ids) 
     {
        $this->db->select('questions.question_id, questions.name, questions.email, questions.question, questions.answer, questions.date_added, questions.remarks, questions.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_questions as questions')
                ->join('dir_listing as listing', 'questions.listing_id = listing.listing_id','left')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id','left')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id','left') 
                ->where_in('questions.listing_id', $listing_ids)  
                ->order_by('questions.question_id', 'desc');
        $query_result = $this->db->get();
         
        $result = $query_result->result_array();
        return $result;
    }

    public function get_question_by_question_id($question_id) 
    {
        $result = $this->db->get_where($this->_questions, array('question_id' => $question_id));
        
        return $result->row_array();
    }

    public function published_question_by_id($question_id) {
        $this->db->update($this->_questions, array('publication_status' => 1), array('question_id' => $question_id));
        return $this->db->affected_rows();
    }

    public function unpublished_question_by_id($question_id) {
        $this->db->update($this->_questions, array('publication_status' => 0), array('question_id' => $question_id));
        return $this->db->affected_rows();
    }

    public function remove_question_by_id($question_id) 
    {
        $this->db->where('question_id', $question_id);
        $this->db->delete($this->_questions);
        return $this->db->affected_rows();
    }

    public function get_all_questions_published() 
    {
        $this->db->select('*')
                ->from('dir_questions') 
                ->where('publication_status', 1)  
                ->order_by('question_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function remove_blog_by_id($question_id) 
    { 
        $this->db->where('question_id', $question_id);
        $this->db->delete($this->_questions);
        return $this->db->affected_rows();
    }

}
