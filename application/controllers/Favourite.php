<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('HotelsModel');
        $this->load->model('AuthModel');
        $this->load->model('FlightsModel');
        $this->load->model('FavouriteModel');
    }

    public function index() {
        if (isset($this->session->userdata['login_uer_data']['id']) && $this->session->userdata['login_uer_data']['id'] != "") {
            $data['fav_data'] = $this->FavouriteModel->getAllFavourites($this->session->userdata['login_uer_data']['id']);
//            echo '<pre>';print_r($data['fav_data']);echo '</pre>';die;
            $data['page_title'] = "Your Favourites";
            $data['page_name'] = "favourite/index";
            $this->load->view('index', $data);
        } else {
            redirect(base_url("welcome/index"));
        }
    }

    public function addFavourite($hotel_id) {
        if (isset($this->session->userdata['login_uer_data']['id']) && $this->session->userdata['login_uer_data']['id'] != "") {
            $this->FavouriteModel->createFavourite(array('user_id' => $this->session->userdata['login_uer_data']['id'], 'hotel_id' => $hotel_id));
            $this->session->set_flashdata("success", "Hotel is successfully added in Favourite List");
        } else {
            $this->session->set_flashdata("error", "Please do login to save hotel");
        }
        redirect(base_url("hotels/viewHotel/" . $hotel_id));
    }

    public function removeFavourite($hotel_id) {
        if (isset($this->session->userdata['login_uer_data']['id']) && $this->session->userdata['login_uer_data']['id'] != "") {
            $this->FavouriteModel->removeFavourite($this->session->userdata['login_uer_data']['id'], $hotel_id);
            $this->session->set_flashdata("success", "Hotel is removed from Favourite List");
        } else {
            $this->session->set_flashdata("error", "Please do login to save hotel");
        }
        redirect(base_url("hotels/viewHotel/" . $hotel_id));
    }
    
    public function rmFavourite($hotel_id) {
        if (isset($this->session->userdata['login_uer_data']['id']) && $this->session->userdata['login_uer_data']['id'] != "") {
            $this->FavouriteModel->removeFavourite($this->session->userdata['login_uer_data']['id'], $hotel_id);
            $this->session->set_flashdata("success", "Hotel is removed from Favourite List");
            redirect(base_url("favourite/index"));
        } else {
            $this->session->set_flashdata("error", "Please do login");
            redirect(base_url("welcome/index"));
        }
    }
}
