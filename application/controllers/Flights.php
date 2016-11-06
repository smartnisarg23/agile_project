<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('FlightsModel');
        $this->load->model('AuthModel');
    }

    public function search($search_type = "") {
        if ($search_type == "oneway") {
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                if ($this->input->post('submit') == "Refine") {
                    $data = $this->input->post();
                    $departure_date = date("Y-m-d", strtotime($this->input->post('departure_date')));
                    $all_flights = $this->FlightsModel->searchFlights($data['origin_id'], $data['destination_id'], $departure_date, $data['airline_refine']);
                    $data['all_flights'] = $all_flights;
                } else {
                    $this->form_validation->set_rules('origin_id', 'Origin', 'trim|required');
                    $this->form_validation->set_rules('destination_id', 'Destination', 'trim|required');
                    $this->form_validation->set_rules('departure_date', 'Departure date', 'trim|required');
                    $data = $this->input->post();
                    if ($this->form_validation->run($this) === TRUE) {
                        $departure_date = date("Y-m-d", strtotime($this->input->post('departure_date')));
                        $all_flights = $this->FlightsModel->searchFlights($data['origin_id'], $data['destination_id'], $departure_date);
                        $data['all_flights'] = $all_flights;
                        $data['city'] = $data['destination_id'];
                    }
                }
            } else {
                redirect(base_url("welcome/index"));
            }
        }
        if ($search_type == "twoway") {
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                if ($this->input->post('submit') == "Refine") {
                    $data = $this->input->post();
                    $departure_date = date("Y-m-d", strtotime($this->input->post('departure_date')));
                    $return_date = date("Y-m-d", strtotime($this->input->post('return_date')));
                    $depart_flights = $this->FlightsModel->searchFlights($data['origin_id'], $data['destination_id'], $departure_date, $data['airline_refine']);
                    $return_flights = $this->FlightsModel->searchFlights($data['destination_id'], $data['origin_id'], $return_date, $data['airline_refine']);
                    foreach ($depart_flights as $key => $value) {
                        if (isset($return_flights[$key])) {
                            $data['all_flights'][$key]['depart'] = $value;
                            $data['all_flights'][$key]['return'] = $return_flights[$key];
                        }
                    }
                } else {
                    $this->form_validation->set_rules('origin_id', 'Origin', 'trim|required');
                    $this->form_validation->set_rules('destination_id', 'Destination', 'trim|required');
                    $this->form_validation->set_rules('departure_date', 'Departure date', 'trim|required');
                    $this->form_validation->set_rules('return_date', 'Return date', 'trim|required');
                    $data = $this->input->post();
                    if ($this->form_validation->run($this) === TRUE) {
                        $departure_date = date("Y-m-d", strtotime($this->input->post('departure_date')));
                        $return_date = date("Y-m-d", strtotime($this->input->post('return_date')));
                        $depart_flights = $this->FlightsModel->searchFlights($data['origin_id'], $data['destination_id'], $departure_date);
                        $return_flights = $this->FlightsModel->searchFlights($data['destination_id'], $data['origin_id'], $return_date);
                        foreach ($depart_flights as $key => $value) {
                            if (isset($return_flights[$key])) {
                                $data['all_flights'][$key]['depart'] = $value;
                                $data['all_flights'][$key]['return'] = $return_flights[$key];
                            }
                        }
                        $data['city'] = $data['destination_id'];
                    }
                }
            } else {
                redirect(base_url("welcome/index"));
            }
        }
        $data['search_type'] = $search_type;
        $data['all_providers'] = $this->FlightsModel->getAllFlightProviders();
        $allCities = $this->FlightsModel->getAllCitys();
        $data['allCities'] = $allCities;
        $data['page_title'] = "Flight Search";
        $data['page_name'] = "flights/search";
        $this->load->view('index', $data);
    }

    public function setAlert() {
        $flight_id = $this->input->post('flight_id');
        $expected_price = $this->input->post('price');
        $flight_class = $this->input->post('flight_class');
        $user_id = $this->session->userdata['login_uer_data']['id'];
        $flight_details = $this->FlightsModel->getFlightDetail($flight_id);
        $alert_details = $this->FlightsModel->createFlightAlert(array('flight_id' => $flight_id, "expected_price" => $expected_price, 'user_id' => $user_id, 'class_type' => $flight_class));
    }

    public function checkAlert() {
        $flight_alerts = $this->FlightsModel->getAllFlightAlerts();
        foreach ($flight_alerts as $key => $value) {
            $flight_details = $this->FlightsModel->getFlightDetail($value['flight_id']);
            if ($value['class_type'] == "economy" && $flight_details['fare_economy'] <= $value['expected_price']) {
                $data['user_data'] = $this->AuthModel->getUserData($value['user_id']);
                $data['flight_provider'] = $this->FlightsModel->getFlightProvider($flight_details['flight_provider_id']);
                $data['flight_details'] = $flight_details;
                $data['alert_data'] = $value;
                $data['current_price'] = $flight_details['fare_economy'];
                $message = $this->load->view('alert_email_flight', $data, true);
                send_email($data['user_data']['email_id'], "Alert message from AgileVihar", $message);
            }
            if ($value['class_type'] == "business" && $flight_details['fare_business'] <= $value['expected_price']) {
                $data['user_data'] = $this->AuthModel->getUserData($value['user_id']);
                $data['flight_provider'] = $this->FlightsModel->getFlightProvider($flight_details['flight_provider_id']);
                $data['flight_details'] = $flight_details;
                $data['alert_data'] = $value;
                $data['current_price'] = $flight_details['fare_business'];
                $message = $this->load->view('alert_email_flight', $data, true);
                send_email($data['user_data']['email_id'], "Alert message from AgileVihar", $message);
            }
        }
    }

    public function places($city_id) {
        $place_images = $this->FlightsModel->getPlaceImages($city_id);
        $place_images = $this->FlightsModel->getPlaceDetail($city_id);
        $data['place_images'] = $place_images;
        $data['page_title'] = "Flight Search";
        $data['page_name'] = "flights/places";
        $this->load->view('index', $data);
    }

}
