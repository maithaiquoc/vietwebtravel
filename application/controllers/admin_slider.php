<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');

class Admin_slider extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('crud_model');
        $this->load->library('../controllers/crud');
        $this->load->library("pagination");
    }

    public function upload()
    {
        $result = $this->crud->upload('slider_imagesAdd', 'sliderFile');
        echo $result;
    }

    
}