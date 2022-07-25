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

class Videos_model extends CC_Model {

    public function __construct() {
        parent::__construct();
    }

    private $_videos = 'dir_videos';

    public function get_videos_info() {
        $this->db->select('videos.video_id, videos.video_name, videos.video_url, videos.date_added, videos.publication_status, listing.listing_id, listing.company_name, cat.category_name, cities.city_name')
                ->from('dir_videos as videos')
                ->join('dir_listing as listing', 'videos.listing_id = listing.listing_id')
                ->join('dir_cities as cities', 'listing.city_id = cities.city_id')
                ->join('dir_categories as cat', 'listing.category_id = cat.category_id')
                ->where('videos.deletion_status', 0)
                ->order_by('videos.video_id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result_array();
        return $result;
    }

    public function get_video_by_video_id($video_id) {
        $result = $this->db->get_where($this->_videos, array('video_id' => $video_id, 'deletion_status' => 0));
        return $result->row_array();
    }

    public function published_video_by_id($video_id) {
        $this->db->update($this->_videos, array('publication_status' => 1), array('video_id' => $video_id));
        return $this->db->affected_rows();
    }

    public function unpublished_video_by_id($video_id) {
        $this->db->update($this->_videos, array('publication_status' => 0), array('video_id' => $video_id));
        return $this->db->affected_rows();
    }

    public function remove_video_by_id($video_id) {
        $this->db->update($this->_videos, array('deletion_status' => 1), array('video_id' => $video_id));
        return $this->db->affected_rows();
    }

}
