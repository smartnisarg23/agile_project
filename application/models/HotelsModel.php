<?php

class HotelsModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->hotels = "hotels";
        $this->hotel_images = "hotel_images";
        $this->hotel_room_details = "hotel_room_details";
        $this->hotel_alerts = "hotel_alerts";
        $this->citys = "citys";
    }

    function getAllCitys() {
        $this->db->select();
        $this->db->from($this->citys . " as c");
        return $this->db->get()->result_array();
    }

    function getCity($city_id) {
        $this->db->select();
        $this->db->from($this->citys);
        return $this->db->get()->row_array();
    }

    function getCountHotelByStars() {
        $this->db->select("count(*) as count,class");
        $this->db->from($this->hotels);
        $this->db->group_by('class');
        $result = $this->db->get()->result_array();
        $output = array();
        foreach ($result as $key => $value) {
            $output[$value['class']] = $value['count'];
        }
        return $output;
    }

    function getHotelDetail($hotel_id) {
        $this->db->select();
        $this->db->from($this->hotels);
        $this->db->where("id", $hotel_id);
        return $this->db->get()->row_array();
    }

    function getHotelRoomDetails($hotel_id) {
        $this->db->select();
        $this->db->from($this->hotel_room_details);
        $this->db->where("hotel_id", $hotel_id);
        return $this->db->get()->result_array();
    }

    function getHotelImages($hotel_id) {
        $this->db->select();
        $this->db->from($this->hotel_images);
        $this->db->where("hotel_id", $hotel_id);
        return $this->db->get()->result_array();
    }

    function getAllHotelAlerts() {
        $this->db->select();
        $this->db->from($this->hotel_alerts);
        $this->db->where("status", '0');
        return $this->db->get()->result_array();
    }

    function updateHotelAlerts($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->hotel_alerts, $data);
    }

    function createHotelAlert($data) {
        $this->db->insert($this->hotel_alerts, $data);
        return $this->db->insert_id();
    }

    function searchHotels($filter = array()) {
        $this->db->select('h.*, hi.*');
        $this->db->from($this->hotels . " as h");
        $this->db->join($this->hotel_images . " as hi", "h.id = hi.hotel_id and hi.main_image = 1", 'left');
        if (count($filter) > 0) {
            if (!empty($filter['city'])) {
                $this->db->where("h.city_id", $filter['city']);
            }
            if (!empty($filter['search_class'])) {
                $this->db->where('h.class', $filter['search_class']);
            }
        }
        return $this->db->get()->result_array();
    }

    function getUserHotels($user_id) {
        $this->db->select('ha.*, h.*, hi.*');
        $this->db->from($this->hotel_alerts . " as ha");
        $this->db->join($this->hotels . " as h ", "h.id = ha.hotel_id");
        $this->db->join($this->hotel_images . " as hi ", "h.id = hi.hotel_id and hi.main_image = 1", 'left');
        $this->db->where('ha.user_id', $user_id);
        return $this->db->get()->result_array();
    }

}
