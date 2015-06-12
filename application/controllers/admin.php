<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library("pagination");
    }

    public function index()
    {
        $this->session->set_userdata('linkAdmin', base_url().'admin');
        $data['title'] = "Trang Quản Trị | Bảng điều khiển";
        $this->load->view('admin/index', $data);
    }

    public function dashboard()
    {
        $this->session->set_userdata('linkAdmin', base_url().'admin/dashboard');
        $data['title'] = "Trang Quản Trị | Bảng điều khiển";
        $this->load->view('admin/index', $data);
    }

    public function slider()
    {
        $this->session->set_userdata('linkAdmin', base_url().'admin/slider');
        $data['title'] = "Trang Quản Trị | Slider";
        $this->load->view('admin/slider', $data);
    }

    public function login()
    {
        $data['title'] = "Trang Quản Trị | Đăng nhập";
        $this->load->view('admin/login', $data);
    }
}