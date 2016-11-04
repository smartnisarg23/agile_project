<?php

class FlightsModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->flights = "flights";
        $this->flights_provider = "flights_provider";
        $this->flight_alerts = "flight_alerts";
        $this->citys = "citys";
        $this->places = "places";
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

    function getAllFlightProviders() {
        $this->db->select();
        $this->db->from($this->flights_provider);
        return $this->db->get()->result_array();
    }

    function getFlightDetail($flight_id) {
        $this->db->select();
        $this->db->from($this->flights);
        $this->db->where("id", $flight_id);
        return $this->db->get()->row_array();
    }
    function getPlaceImages($city_id) {
        $this->db->select();
        $this->db->from($this->places);
        $this->db->where("place_id", $city_id);
        return $this->db->get()->result_array();
    }
    
    function getFlightProvider($id) {
        $this->db->select();
        $this->db->from($this->flights_provider);
        $this->db->where("id", $id);
        return $this->db->get()->row_array();
    }

    function getAllFlightAlerts() {
        $this->db->select();
        $this->db->from($this->flight_alerts);
        $this->db->where("status", '0');
        return $this->db->get()->result_array();
    }

    function updateFlightAlerts($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->flight_alerts, $data);
    }

    function createFlightAlert($data) {
        $this->db->insert($this->flight_alerts, $data);
        return $this->db->insert_id();
    }

    function searchFlights($origin, $destination, $date, $filter = "") {
        $this->db->select('f.*, c1.name as origin, c2.name as destination, fp.provider_name, fp.provider_logo');
        $this->db->from($this->flights . " as f");
        $this->db->join($this->citys . " as c1 ", "c1.id = f.origin_id");
        $this->db->join($this->citys . " as c2 ", "c2.id = f.destination_id");
        $this->db->join($this->flights_provider . " as fp ", "fp.id = f.flight_provider_id");
        $this->db->where("f.origin_id", $origin);
        $this->db->where("f.destination_id", $destination);
        if ($filter != "") {
            $this->db->where("f.flight_provider_id", $filter);
        }
        $this->db->like('f.departure_time', $date);
        $this->db->order_by('f.departure_time');
        return $this->db->get()->result_array();
    }

}
