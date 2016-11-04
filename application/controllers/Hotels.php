<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('HotelsModel');
        $this->load->model('AuthModel');
        $this->load->model('FlightsModel');
    }

    public function search() {
        if ($this->input->post() != "") {
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('check_in', 'Check In', 'trim|required');
            $this->form_validation->set_rules('check_out', 'Check Out', 'trim|required');
            $data = $this->input->post();
            if ($this->form_validation->run($this) === TRUE) {
                $data['all_hotels'] = $this->HotelsModel->searchHotels($data);
            }
        }
        $data['hotels_stars_count'] = $this->HotelsModel->getCountHotelByStars();
        $allCities = $this->FlightsModel->getAllCitys();
        $data['allCities'] = $allCities;
        $data['page_title'] = "Hotel Search";
        $data['page_name'] = "hotels/search";
        $this->load->view('index', $data);
    }

    public function viewHotel($id) {
        $data['hotel'] = $this->HotelsModel->getHotelDetail($id);
        $data['hotel_images'] = $this->HotelsModel->getHotelImages($id);
        $data['hotel_rooms'] = $this->HotelsModel->getHotelRoomDetails($id);
        $data['hotel_id'] = $id;
        $data['page_title'] = "Hotel Search";
        $data['page_name'] = "hotels/viewHotel";
        $this->load->view('index', $data);
    }

    public function setAlert() {
        $hotel_id = $this->input->post('hotel_id');
        if ($this->input->post('hotel_room_id') != "") {
            $room_type = $this->input->post('hotel_room_id');
        } else {
            $room_type = 'general';
        }
        $expected_price = $this->input->post('price');
        $user_id = $this->session->userdata['login_uer_data']['id'];
        $alert_details = $this->HotelsModel->createHotelAlert(array('hotel_id' => $hotel_id, "class_type" => $room_type, "expected_price" => $expected_price, 'user_id' => $user_id));
    }

}
