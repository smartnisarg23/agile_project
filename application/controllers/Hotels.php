<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('HotelsModel');
        $this->load->model('AuthModel');
        $this->load->model('FlightsModel');
        $this->load->model('FavouriteModel');
    }

    public function search() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('check_in', 'Check In', 'trim|required');
            $this->form_validation->set_rules('check_out', 'Check Out', 'trim');
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
        if (isset($this->session->userdata['login_uer_data']['id']) && $this->session->userdata['login_uer_data']['id'] != "") {
            $data['fav_data'] = $this->FavouriteModel->checkFavourites(array('user_id' => $this->session->userdata['login_uer_data']['id'], 'hotel_id' => $id));
        }
        $data['hotel_images'] = $this->HotelsModel->getHotelImages($id);
        $data['hotel_rooms'] = $this->HotelsModel->getHotelRoomDetails($id);
        $data['hotel_id'] = $id;
        $data['page_title'] = "Hotel Search";
        $data['page_name'] = "hotels/viewHotel";
        $this->load->view('index', $data);
    }

    public function setAlert() {
        $hotel_id = $this->input->post('hotel_id');
        if ($this->input->post('hotel_room_type') != "") {
            $room_type = $this->input->post('hotel_room_type');
        } else {
            $room_type = 'general';
        }
        $expected_price = $this->input->post('price');
        $user_id = $this->session->userdata['login_uer_data']['id'];
        $alert_details = $this->HotelsModel->createHotelAlert(array('hotel_id' => $hotel_id, "class_type" => $room_type, "expected_price" => $expected_price, 'user_id' => $user_id));
    }

    public function checkAlert() {
        $alert_details = $this->HotelsModel->getAllHotelAlerts();
        foreach ($alert_details as $key => $value) {
            if ($value['class_type'] == "general") {
                $hotel_detail = $this->HotelsModel->getHotelDetail($value['hotel_id']);
                if ($hotel_detail['minimum_rate'] < $value['expected_price']) {
                    $data['user_data'] = $this->AuthModel->getUserData($value['user_id']);
                    $data['hotel_data'] = $hotel_detail;
                    $data['alert_data'] = $value;
                    $data['current_price'] = $hotel_detail['minimum_rate'];
                    $message = $this->load->view('alert_email_hotel', $data, true);
                    send_email($data['user_data']['email_id'], "Alert message from AgileVihar", $message);
                }
            } else {
                $hotel_detail = $this->HotelsModel->getHotelDetail($value['hotel_id']);
                $room_detail = $this->HotelsModel->getHotelRoomDetails($value['hotel_id']);
                foreach ($room_detail as $key => $room) {
                    if ($room['room_type'] == $value['class_type'] && $room['price'] <= $value['expected_price']) {
                        $data['user_data'] = $this->AuthModel->getUserData($value['user_id']);
                        $data['hotel_data'] = $hotel_detail;
                        $data['alert_data'] = $value;
                        $data['current_price'] = $room['price'];
                        $message = $this->load->view('alert_email_hotel', $data, true);
                        send_email($data['user_data']['email_id'], "Alert message from AgileVihar", $message);
                    }
                }
            }
        }
    }

}
