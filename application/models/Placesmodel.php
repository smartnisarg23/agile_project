<?php

class PlacesModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->hotels = "hotels";
        $this->hotel_images = "hotel_images";
        $this->hotel_room_details = "hotel_room_details";
        $this->hotel_alerts = "hotel_alerts";
        $this->citys = "citys";
        $this->places = "places";
    }

    function getCity($city_id) {
        $this->db->select();
        $this->db->from($this->citys);
        return $this->db->get()->row_array();
    }

    function getPlaceDetail($city_id) {
        $this->db->select();
        $this->db->from($this->places);
        $this->db->where("place_id", $city_id);
        return $this->db->get()->result_array();
    }

}
