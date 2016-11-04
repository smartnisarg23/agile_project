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
        $this->db->from($this->citys);
        return $this->db->get()->row_array();
    }

    function getCountHotelByStars() {
        $this->db->select("count(*) as count,class");
        $this->db->from($this->hotels);
        $this->db->group_by('class');
        $result = $this->db->get()->result_array();
//        print_r($result);
//        exit;
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
        $this->db->select('h.*, c1.name as city, hi.image_source as image');
        $this->db->from($this->hotels . " as h");
        $this->db->join($this->citys . " as c1 ", "c1.id = h.city_id");
        $this->db->join($this->hotel_images . " as hi", "h.id = hi.hotel_id and hi.main_image = 1", 'left');
        if (count($filter) > 0) {
            if(!empty($filter['city'])){
                $this->db->like("c1.name",$filter['city']);
                $this->db->or_like("h.name",$filter['city']);
            }
            if(!empty($filter['hotel_class']) && count($filter['hotel_class']) > 0){
                $this->db->where_in('h.class',$filter['hotel_class']);
            }
        }
        return $this->db->get()->result_array();
    }

}
