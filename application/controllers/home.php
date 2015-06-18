<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('crud_model');
    }

    public function index()
    {
        $data['type'] = 1;
        $data['sliders'] = $this->crud_model->selectAllWithCondition("sliders AS sli, images AS im", "sli.id_image = im.id_image", "slider_order, addition_datetime DESC");
        $this->load->view('index', $data);
    }
}
