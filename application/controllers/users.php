<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('crud_model');
        $this->load->library('../controllers/crud');
        $this->load->library('email');
        $this->load->helper('captcha');
    }

    public function checkEmail()
    {
        $email = $this->input->post('email');
        $checkEmail = $this->users_model->getEmail($email);
        echo $checkEmail;
    }

    public function checkLogin()
    {
        echo $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $remember = $this->input->post('remember');

        $field = "active";
        $active = $this->users_model->getInfoUser($field, $email);
        $checkEmail = $this->users_model->getEmail($email);
        $checkAdminLogin = $this->users_model->getAdminLoginInfo($email, $password);
        if($checkEmail == 0){
            echo "000";
        }
        else{
            if($active == 0){
                echo "00";
            }
            else{
                if($checkAdminLogin != 0){
                    if($remember == 1){
                        $this->storeSession($email);
                        $this->session->set_userdata('new_expiration',1209600); //2 weeks
                        $this->session->sess_update(); //force the session to update the cookie and/or database
                    }
                    $this->setInfoLogin($email);
                }
                else{
                    echo "0";
                }
            }
        }
    }

    public function setEmptyAdminLink()
    {
        $this->session->set_userdata('linkAdmin', '');
    }

    public function setInfoLogin($email)
    {
        $field1 = 'name';
        $name = $this->users_model->getInfoUser($field1, $email);

        $field2 = 'id';
        $id = $this->users_model->getInfoUser($field2, $email);

        $data = array(
            'email' => $email,
            'name' => $name,
            'id' => $id
        );
        $this->session->set_userdata($data);
    }

    public function storeSession($email){
        $session_id = $this->session->userdata('session_id');
        $ip_address = $this->session->userdata('ip_address');
        $user_agent = $this->session->userdata('user_agent');
        $last_activity = $this->session->userdata('last_activity');
        $user_data = $email;

        $data = array(
            'session_id' => $session_id,
            'ip_address' => $ip_address,
            'user_agent' => $user_agent,
            'last_activity' => $last_activity,
            'user_data' => $user_data
        );
        $this->crud_model->insert('ci_sessions', $data);
    }
}