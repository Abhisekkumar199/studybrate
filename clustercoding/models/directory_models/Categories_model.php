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

class Categories_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_cat = 'dir_categories';
    
    // category list
    public function get_categories_info($catid) 
    { 
        $this->db->select('cat.*, user.first_name, user.last_name')
                ->from('dir_categories as cat')
                ->join('tbl_users as user', 'cat.user_id = user.user_id')
                ->where('cat.deletion_status', 0) 
                ->where('cat.publication_status', 1) 
                ->where("parent_id", $catid)
                ->order_by('cat.sort_id', 'asc');
        $query_result = $this->db->get();  
        $result = $query_result->result_array();
        return $result;
    }
    
    // get child  catgory 
    public function getChildCategory($id) 
    {  
        $rows = $this->db
        ->select('category_id,parent_id,category_name')
        ->where('parent_id', $id)
        ->order_by('category_id','asc')
        ->get('dir_categories')
        ->result();
    
        $categorylist = '';
        if (count($rows) > 0) 
        {
            foreach ($rows as $row) 
            {
                $categorylist .=  $row->category_id.","; 
                $categorylist .= $this->getChildCategory($row->category_id);
            }
        }
        return  $categorylist;
    }
    
    
    
    // get  menu
    public function headerMenu()
    {
        $res = array();
        $this->db->select('category_id,parent_id as parent_id1,category_name,category_image,cat_slug'); 
        $this->db->from('dir_categories'); 
        $array = array('parent_id' => '0', 'publication_status' => '1');
        $this->db->where($array);
        $this->db->order_by("sort_id", "asc");
        $query =  $this->db->get(); 
        $res =  $query->result(); 
        //print_r($res);
        //die();
        $menu = ''; 
        foreach ($res as $category)
        { 
            
            $rowscat = $this->getSubMenu($category->category_id); 
            if(count($rowscat) > 0)
            {
                $menu .="<li class='menuListing sub-listing'>";
                
            }
            else
            {
                $menu .="<li class='menuListing '>";
            }
            
            $menu .="<span><a href='#'>".$category->category_name."</a></span>";  
            if(count($rowscat) > 0)
            { 
			    $menu .="<ul>";
			    foreach ($rowscat as $cat) 
			    { 
			    $menu .="<li><p><a href='https://studybrate.com/search/". $cat->cat_slug."'>".$cat->category_name."</a></p>";
                $rowssub = $this->getSubject($cat->category_id); 
                foreach ($rowssub as $sub) 
			    { 
				    $menu.="<a href='https://studybrate.com/subject/". $sub->subject_id."'>".$sub->subject_name."</a>"; 
			    }  
		        $menu.="</li>";
			    }
		        $menu.="</ul>";
            }	   
    		$menu .="</li>";  
        }  
        return $menu;
    }
    
    
    //get admin sub menu
    public function getSubMenu($parent_id)
    {
        $this->db->select('category_id,parent_id,category_name,cat_slug'); 
        $this->db->from('dir_categories'); 
        $array = array('publication_status' => '1', 'parent_id' => $parent_id);
        $this->db->where($array);
        $this->db->order_by("sort_id", "asc"); 
       // $this->db->limit(5);
        $query1 =  $this->db->get();
        return $query1->result();
    }
    
    //get category wise subject
    public function getSubject($catid)
    {
        $this->db->select('subject_id,subject_name'); 
        $this->db->from('dir_subjects'); 
        $array = array('publication_status' => '1', 'category_id' => $catid);
        $this->db->where($array);
        $this->db->order_by("subject_name", "asc");   
        $query1 =  $this->db->get();
        return $query1->result();
    } 
  
    

    public function get_categories_info2($catid) 
    { 
        $this->db->select('cat.*')
                ->from('dir_categories as cat') 
                ->where('cat.deletion_status', 0) 
                ->where("cat.category_id", $catid)
                ->order_by('cat.category_name', 'asc');
        $query_result = $this->db->get();  
        $result = $query_result->result_array();
        return $result;
    }

    public function get_child_categories_list($catid) 
    {
        $this->db->select('*')
                ->from('dir_categories')
                ->where('deletion_status', 0)  
                ->where("parent_id", $catid)
                ->order_by('category_name', 'asc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_category_by_category_id($category_id) {
        $result = $this->db->get_where($this->_cat, array('category_id' => $category_id, 'deletion_status' => 0));
        return $result->row_array();
    }
 
    

}
