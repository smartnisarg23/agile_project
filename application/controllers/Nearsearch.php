<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nearsearch extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function search($search_type = "") {
        $data['page_title'] = "Flight Search";
        $data['page_name'] = "nearsearch/search";
        $this->load->view('index', $data);
    }

    
}
