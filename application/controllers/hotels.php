<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('HotelsModel');
        $this->load->model('AuthModel');
    }

    public function search() {
        $input = $this->input->get();
        $data['all_hotels'] = $this->HotelsModel->searchHotels($input);
//        echo $this->db->last_query();
//        exit;
        $data['hotels_stars_count'] = $this->HotelsModel->getCountHotelByStars();
        $data['page_title'] = "Hotel Search";
        $data['page_name'] = "hotels/search";
        $this->load->view('index', $data);
    }
    public function viewHotel($id){
        $data['hotel'] = $this->HotelsModel->getHotelDetail($id);
        $data['hotel_images'] = $this->HotelsModel->getHotelImages($id);
        
        $data['page_title'] = "Hotel Search";
        $data['page_name'] = "hotels/viewHotel";
        $this->load->view('index', $data);
    }

    public function setAlert() {
        $hotel_id = $this->input->post('hotel_id');
        $expected_price = $this->input->post('price');
        $user_id = $this->session->userdata['login_uer_data']['id'];
        $hotel_details = $this->HotelsModel->getHotelDetail($hotel_id);
        $alert_details = $this->HotelsModel->createHotelAlert(array('hotel_id' => $hotel_id, "expected_price" => $expected_price, 'user_id' => $user_id));
    }

}
