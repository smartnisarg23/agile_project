<?php

function pre($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}

function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function get_status($status) {
    if ($status == "-1") {
        return "Removed";
    } elseif ($status == "0") {
        return "Unactive";
    } elseif ($status == "1") {
        return "Active";
    }
}

function last_query() {
    $CI = & get_instance();
    echo "<pre>";
    print_r($CI->db->last_query());
    echo "</pre>";
    die;
}

function check_permission() {
    $CI = & get_instance();
    if (!empty($CI->session->userdata['login_uer_data'])) {
        redirect('auth/index');
    } else {
        redirect(base_url('auth/index'));
    }
}

function get_user_domain($role_id, $user_id) {
    $CI = & get_instance();
    if ($role_id == "2") {
        $data = $CI->UserModel->getSupplierData($user_id);
        return $data['supplier_subdomain'];
    }
    if ($role_id == "3") {
        $data = $CI->UserModel->getClientData($user_id);
        return $data['client_subdomain'];
    }
}

function send_email($to, $subject, $message) {
    $CI = & get_instance();
    $CI->load->library('email');
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = 465;
    $config['smtp_timeout'] = '30';
    $config['smtp_user'] = 'nisarg.phpdeveloper@gmail.com';
    $config['smtp_pass'] = 'Nisarg@90';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
    $CI->email->from('nisarg.phpdeveloper@gmail.com', 'Nisarg Patel');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($CI->email->send()) {
        return true;
    } else {
        return show_error($this->email->print_debugger());
    }
}