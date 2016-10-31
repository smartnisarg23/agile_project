<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('AuthModel');
    }

//end __construct()

    public function session($provider) {

        $this->load->helper('url_helper');
        //facebook
        if ($provider == 'facebook') {
//            $app_id = $this->config->item('fb_appid');
//            $app_secret = $this->config->item('fb_appsecret');
            $app_id = '1374392492794102';
            $app_secret = 'f3af4745176cb1daa94fcdedd73a14c5';
            $provider = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
            ));
        }
        //google
        else if ($provider == 'google') {

//            $app_id = $this->config->item('googleplus_appid');
//            $app_secret = $this->config->item('googleplus_appsecret');
            $app_id = '291204050966-mmrnln8s7hme3tr0vi9ivihrjffs5kk7.apps.googleusercontent.com';
            $app_secret = 'BU-J1H8BB8K1k8NUIB6cWWAM';
            $provider = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
            ));
        }

        //foursquare
        else if ($provider == 'foursquare') {

            $app_id = $this->config->item('foursquare_appid');
            $app_secret = $this->config->item('foursquare_appsecret');
            $provider = $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
            ));
        }

        if (!$this->input->get('code')) {
            // By sending no options it'll come back here
            $provider->authorize();
            redirect('social?error');
        } else {
            // Howzit?
            try {
                $token = $provider->access($_GET['code']);
                $user = $provider->get_user_info($token);

                if ($this->uri->segment(3) == 'google') {
                    //Your code stuff here 
                } elseif ($this->uri->segment(3) == 'facebook') {
                    //your facebook stuff here         
                    $user = $provider->get_user_info($token);
                    $checkFbUser = $this->AuthModel->checkFacebookUser($user['uid']);
                    if (count($checkFbUser) > 0) {
                        $this->AuthModel->updateLastLogin($checkFbUser["id"]);
                        $this->session->set_userdata('login_uer_data', $checkFbUser);
                        redirect(base_url('welcome/index'));
                    } else {
                        $insert_data = array('role_id' => '2',
                            'email_id' => $user['email'],
                            'first_name' => $user['first_name'],
                            'last_name' => $user['last_name'],
                            'facebook_id' => $user['uid'],
                            'status' => 1
                        );
                        $login_data = $this->AuthModel->createUser($insert_data);
                        $insert_data['id'] = $login_data;
                        $this->AuthModel->updateLastLogin($login_data);
                        $this->session->set_userdata('login_uer_data', $insert_data);
                        redirect(base_url('welcome/index'));
                    }
                } elseif ($this->uri->segment(3) == 'foursquare') {
                    // your code stuff here
                }

                $this->session->set_flashdata('info', $message);
                redirect('social?tabindex=s&status=sucess');
            } catch (OAuth2_Exception $e) {
                show_error('That didnt work: ' . $e);
            }
        }
    }

}
