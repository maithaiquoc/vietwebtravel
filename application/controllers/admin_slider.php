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

    public function getTableSliderManager($start_from = 0)
    {
        $per_page = 4;
        $config = array();
        $config["base_url"] = base_url() . "/admin_slider/getTableSliderManager/";
        $config["total_rows"] = $this->crud_model->selectNumOfPagination("*", "sliders AS sli, images AS im", "sli.id_image = im.id_image AND sli.slider_flag = 0 ORDER BY sli.slider_order, sli.addition_datetime DESC");
        $config["per_page"] = $per_page;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li> ';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li> ';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li> ';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['use_page_numbers'] = TRUE;
        $start = $per_page * ($start_from-1);
        if($start < 0){
            $start = 0;
        }
        $data['sliderList'] = $this->crud_model->selectPagination($per_page, $start, "*", "sliders AS sli, images AS im", "sli.id_image = im.id_image AND sli.slider_flag = 0 ORDER BY sli.slider_order, sli.addition_datetime DESC");
        $this->load->view('admin/slider/slider_list', $data);
    }

    public function getPage()
    {
        $result = $this->crud_model->selectNumOfPagination("*", "sliders AS sli, images AS im", "sli.id_image = im.id_image AND sli.slider_flag = 0 ORDER BY sli.slider_order, sli.addition_datetime DESC");
        $data['num_links'] = $result/4;
        $this->load->view('admin/slider/page', $data);
    }

    public function upload()
    {
        $result = $this->crud->upload('slider_imagesAdd', 'sliderFile');
        echo $result;
    }

    public function uploadEdit()
    {
        $result = $this->crud->upload('slider_imagesEdit', 'sliderEditFile');
        echo $result;
    }

    public function insertNewSlider(){
        $dt = date("Y-m-d H:i:s");

        $idUser = $this->session->userdata('id');

        $sliderName = $this->input->post('sliderName', true);
        $sliderDescription = $this->input->post('sliderDescription', true);
        $sliderLink = $this->input->post('sliderLink', true);
        $sliderTitle = $this->input->post('sliderTitle', true);
        $sliderOrder = $this->input->post('sliderOrder', true);
        $sliderImage = $this->session->userdata('slider_imagesAdd');
        $active = $this->input->post('active', true);

        $idImage = $this->crud->insertImage($sliderImage, $sliderTitle);
        if($idImage != -1){
            $data = array(
                'slider_name' => $sliderName,
                'slider_description' => $sliderDescription,
                'slider_link' => $sliderLink,
                'slider_order' => $sliderOrder,
                'slider_active' => $active,
                'slider_flag' => 0,
                'addition_datetime' => $dt,
                'id_image' => $idImage,
                'id_user' => $idUser
            );
            $query = $this->crud_model->insert("sliders", $data);
            echo $query;
        }
        else{
            echo "Đã xảy ra lỗi! Xin vui lòng tải lại trình duyệt và thử lại...";
        }
    }

    public function updateSlider(){
        $dt = date("Y-m-d H:i:s");

        $sliderName = $this->input->post('sliderName', true);
        $sliderDescription = $this->input->post('sliderDescription', true);
        $sliderLink = $this->input->post('sliderLink', true);
        $sliderTitle = $this->input->post('sliderTitle', true);
        $sliderOrder = $this->input->post('sliderOrder', true);
        $sliderID = $this->input->post('sliderID', true);
        $imageID = $this->input->post('imageID', true);

        $sliderImage = $this->session->userdata('slider_imagesEdit');
        if($sliderImage == ''){
            $sliderImage = $this->input->post('imageLink', true);
        }

        $active = $this->input->post('active', true);

        $images = array(
            'image_link' => $sliderImage,
            'image_title' => $sliderTitle
        );
        $queryImage = $this->crud_model->update("id_image", $imageID, "images", $images);

        if($queryImage == 0){
            $sliders = array(
                'slider_name' => $sliderName,
                'slider_description' => $sliderDescription,
                'slider_link' => $sliderLink,
                'slider_order' => $sliderOrder,
                'slider_active' => $active,
                'update_datetime' => $dt,
            );
            $querySlider = $this->crud_model->update("id_slider", $sliderID, "sliders", $sliders);
            echo $querySlider;
        }
        else{
            echo "Đã xảy ra lỗi! Xin vui lòng tải lại trình duyệt và thử lại...";
        }
    }

    public function deleteSlider(){
        $id = $this->input->post('id');
        $query = $this->crud_model->deleteID('id_slider', $id, "sliders", "slider_flag");
        echo $query;
    }

    public function emptyImageAdd(){
        echo $this->crud->emptySession('slider_imagesAdd');
    }

    public function emptyImageEdit(){
        echo $this->crud->emptySession('slider_imagesEdit');
    }
}