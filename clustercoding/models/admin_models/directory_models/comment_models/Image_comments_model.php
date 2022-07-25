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

class Image_comments_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_img_comments = 'dir_image_comments';

    public function get_image_comments_info() {
        $this->db->select('comment.comment_id, comment.comment, comment.publication_status, comment.date_added, image.image_id, image.caption, user.first_name, user.last_name')
                ->from('dir_image_comments as comment')
                ->join('dir_images as image', 'comment.image_id = image.image_id')
                ->join('tbl_users as user', 'comment.user_id = user.user_id')
                ->where('comment.deletion_status', 0)
                ->order_by('comment.comment_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_comment_by_comment_id($comment_id) {
        $result = $this->db->get_where($this->_img_comments, array('comment_id' => $comment_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_comment_by_id($comment_id) {
        $this->db->update($this->_img_comments, array('publication_status' => 1), array('comment_id' => $comment_id));
        return $this->db->affected_rows();
    }

    public function unpublished_comment_by_id($comment_id) {
        $this->db->update($this->_img_comments, array('publication_status' => 0), array('comment_id' => $comment_id));
        return $this->db->affected_rows();
    }

    public function remove_comment_by_id($comment_id) {
        $this->db->update($this->_img_comments, array('deletion_status' => 1), array('comment_id' => $comment_id));
        return $this->db->affected_rows();
    }

}
