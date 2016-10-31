<?php

class AuthModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->users = "users";
    }

    function getLoginData($data) {
        $this->db->select("u.*, r.role_name");
        $this->db->from($this->users . " as u");
        $this->db->join("roles as r", "r.id = u.role_id");
        $this->db->where("(u.email_id = '" . $data['email_id'] . "')");
        $this->db->where("u.password", md5($data['password']));
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    function getUserData($user_id) {
        $this->db->select();
        $this->db->from($this->users);
        $this->db->where("id", $user_id);
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    function checkFacebookUser($facebook_id) {
        $this->db->select();
        $this->db->from($this->users);
        $this->db->where("facebook_id", $facebook_id);
        return $this->db->get()->row_array();
    }

    function updateLastLogin($id) {
        $this->db->where('id', $id);
        return $this->db->update($this->users, array("last_login" => date("Y-m-d H:i:s")));
    }

    function createUser($data) {
        $this->db->insert($this->users, $data);
        return $this->db->insert_id();
    }

    function checkEmailId($email_id) {
        $this->db->select();
        $this->db->from($this->users);
        $this->db->where("email_id", $email_id);
        $this->db->limit(1);
        return $this->db->get()->num_rows();
    }

}
