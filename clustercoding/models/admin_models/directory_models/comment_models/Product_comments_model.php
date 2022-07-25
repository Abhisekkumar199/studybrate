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

class Product_comments_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_product_comments = 'dir_product_comments';

    public function get_product_comments_info() {
        $this->db->select('comment.comment_id, comment.comment, comment.publication_status, comment.date_added, product.product_id, product.product_name, user.first_name, user.last_name')
                ->from('dir_product_comments as comment')
                ->join('dir_products as product', 'comment.product_id = product.product_id')
                ->join('tbl_users as user', 'comment.user_id = user.user_id')
                ->where('comment.deletion_status', 0)
                ->order_by('comment.comment_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_comment_by_comment_id($comment_id) {
        $result = $this->db->get_where($this->_product_comments, array('comment_id' => $comment_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_comment_by_id($comment_id) {
        $this->db->update($this->_product_comments, array('publication_status' => 1), array('comment_id' => $comment_id));
        return $this->db->affected_rows();
    }

    public function unpublished_comment_by_id($comment_id) {
        $this->db->update($this->_product_comments, array('publication_status' => 0), array('comment_id' => $comment_id));
        return $this->db->affected_rows();
    }

    public function remove_comment_by_id($comment_id) {
        $this->db->update($this->_product_comments, array('deletion_status' => 1), array('comment_id' => $comment_id));
        return $this->db->affected_rows();
    }

}
