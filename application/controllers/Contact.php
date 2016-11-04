<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index() {
        $data['page_title'] = "Contact us";
        $data['page_name'] = "contact_us";
        $this->load->view('index', $data);
    }

}
