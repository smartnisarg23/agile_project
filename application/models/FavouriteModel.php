<?php

class FavouriteModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->favourite = "favourite";
        $this->hotels = "hotels";
        $this->hotel_images = "hotel_images";
        $this->hotel_room_details = "hotel_room_details";
        $this->hotel_alerts = "hotel_alerts";
        $this->citys = "citys";
        $this->places = "places";
    }

    function createFavourite($data) {
        $this->db->insert($this->favourite, $data);
        return $this->db->insert_id();
    }

    function removeFavourite($user_id, $hotel_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('hotel_id', $hotel_id);
        $this->db->delete($this->favourite);
    }

    function checkFavourites($data) {
        $this->db->select();
        $this->db->from($this->favourite);
        $this->db->where("user_id", $data['user_id']);
        $this->db->where("hotel_id", $data['hotel_id']);
        return $this->db->get()->result_array();
    }

    function getAllFavourites($user_id) {
        $this->db->select("f.*, h.*, h.id as hotel_id, c.name as city");
        $this->db->from($this->favourite . " as f ");
        $this->db->join($this->hotels . " as h ", "h.id = f.hotel_id");
        $this->db->join($this->citys . " as c ", "c.id = h.city_id");
        $this->db->where("f.user_id", $user_id);
        return $this->db->get()->result_array();
    }

}
