<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('HotelsModel');
        $this->load->model('AuthModel');
        $this->load->model('FlightsModel');
        $this->load->model('PlacesModel');
    }

    public function index($id) {
        $data['places'] = $this->PlacesModel->getPlaceDetail($id);
        $data['page_title'] = "Near By Places";
        $data['page_name'] = "places/index";
        $this->load->view('index', $data);
    }

}
