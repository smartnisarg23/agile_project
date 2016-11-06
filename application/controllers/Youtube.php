<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('HotelsModel');
        $this->load->model('AuthModel');
        $this->load->model('FlightsModel');
        $this->load->model('PlacesModel');
    }

    public function index() {
        $data['page_title'] = "Team Video";
        $data['page_name'] = "youtube/index";
        $this->load->view('index', $data);
    }

}
