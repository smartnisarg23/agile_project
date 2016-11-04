<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function login() {
        if (isset($this->session->userdata['login_uer_data']) && $this->session->userdata['login_uer_data'] != "") {
            redirect(base_url('welcome/index'));
        }
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('email_id', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run($this) === TRUE) {
                $post_data = $this->input->post();
                $login_data = $this->AuthModel->getLoginData($post_data);
                if ($login_data == "") {
                    $this->session->set_flashdata("error", "Your credentials are not correct.");
                    redirect(base_url('auth/login'));
                }
                $this->AuthModel->updateLastLogin($login_data["id"]);
                $this->session->set_userdata('login_uer_data', $login_data);
                redirect(base_url('welcome/index'));
            } else {
                $this->session->set_flashdata("error", "Your credentials are not correct.");
                redirect(base_url('auth/login'));
            }
        }
        $data['page_title'] = "Login";
        $data['page_name'] = "auth/login";
        $this->load->view('index', $data);
    }

    public function logout() {
        if (isset($this->session->userdata['login_uer_data']) && $this->session->userdata['login_uer_data'] != "") {
            $this->session->unset_userdata('login_uer_data');
        }
        redirect(base_url('welcome/index'));
    }

    public function signUp() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email_id', 'Email', 'trim|required|callback_checkEmailId');
            $this->form_validation->set_rules('contact_no', 'Contact No', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('re_password', 'Re-Password', 'trim|required|matches[password]');
            $post_data = $this->input->post();
            if ($this->form_validation->run($this) === TRUE) {
                unset($post_data['re_password']);
                $post_data['role_id'] = 2;
                $post_data['password'] = md5($post_data['re_password']);
                $login_data = $this->AuthModel->createUser($post_data);
                $this->session->set_flashdata("success", "You are successfully register with us. Now you can do login.");
                redirect(base_url("auth/signup"));
            } else {
                $data = $post_data;
            }
        }
        $data['page_title'] = "SignUp";
        $data['page_name'] = "auth/signup";
        $this->load->view('index', $data);
    }

    public function checkEmailId($email) {
        $rows = $this->AuthModel->checkEmailId($email);
        if ($rows > 0) {
            $this->form_validation->set_message('checkEmailId', 'Email id already exist. Please try another.');
            return false;
        } else {
            return true;
        }
    }

    public function checkLogin() {
        if (isset($this->session->userdata['login_uer_data']) && $this->session->userdata['login_uer_data'] != "") {
            echo "success";
        } else {
            echo "error";
        }
    }

}
