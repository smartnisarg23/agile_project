<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('FlightsModel');
    }

    public function index() {
        $allCities = $this->FlightsModel->getAllCitys();
        $data['allCities'] = $allCities;
        $data['page_title'] = "Home";
        $data['page_name'] = "welcome";
        $this->load->view('index', $data);
    }

}
