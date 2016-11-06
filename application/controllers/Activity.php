<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('FlightsModel');
        $this->load->model('HotelsModel');
    }

    public function index() {
        $data['user_flights'] = $this->FlightsModel->getUserFlights($this->session->userdata['login_uer_data']['id']);
        $data['user_hotels'] = $this->HotelsModel->getUserHotels($this->session->userdata['login_uer_data']['id']);
//        echo '<pre>';print_r($data);echo '</pre>';die;
        $data['page_title'] = "User Activity";
        $data['page_name'] = "activity/index";
        $this->load->view('index', $data);
    }

}
