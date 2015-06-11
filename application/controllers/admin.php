<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->library("pagination");
    }

    public function dashboard()
    {
        $this->session->set_userdata('linkAdmin', base_url().'admin');
        $this->load->view('admin/dashboard');
    }

    public function newsCategory(){
        $this->session->set_userdata('linkAdmin', base_url().'admin/newsCategory');
        $this->load->view('admin/news_category');
    }

    public function news(){
        $field = "max(id)";
        $data['idNews'] = $this->admin_news_model->getInfoNews($field)+1;
        $this->session->set_userdata('linkAdmin', base_url().'admin/news');
        $this->load->view('admin/news', $data);
    }

    public function partner(){
        $this->session->set_userdata('linkAdmin', base_url().'admin/partner');
        $this->load->view('admin/partner');
    }

    public function banner(){
        $this->session->set_userdata('linkAdmin', base_url().'admin/banner');
        $this->load->view('admin/banner');
    }

    public function hotline(){
        $data['provinceAdmin'] = $this->hotline_model->getCityInfo();
        $this->session->set_userdata('linkAdmin', base_url().'admin/hotline');
        $this->load->view('admin/hotline', $data);
    }

    public function advertisement(){
        $this->session->set_userdata('linkAdmin', base_url().'admin/advertisement');
        $this->load->view('admin/advertisement');
    }

    public function emptyLink(){
        $this->session->set_userdata('linkAdmin', '');
//        $ip = $this->session->userdata('ip_address');
//        $check = $this->users_model->getSessionTable($ip);
//        if($check != 0){
//            $field= "user_data";
//            $email = $this->users_model->getEmailSessionTable($field, $ip);
//            $this->session->set_userdata('email', $email);
//            $field2 = 'admin';
//            $admin = $this->users_model->getInfoUser($field2, $email);
//            $this->session->set_userdata('isAdmin', $admin);
//            echo $this->session->userdata('email');
//        }
//        else{
//            echo $check;
//        }
    }

    public function deny(){
        $this->load->view('head');
        $this->load->view('admin/deny');
    }

    public function getTableNews()
    {
        $dbCategories = $this->admin_category_model->getCategoryTable();
        $menu = array(
            'items' => array(),
            'parents' => array()
        );
        foreach($dbCategories as $cat){
            $menu['items'][$cat['caID']] = $cat;
            // Creates entry into parents array. Parents array contains a list of all items with     children
            $menu['parents'][$cat['parentid']][] = $cat['caID'];
        }

        //print_r($result);
        return $this->buildMenu(0, $menu);
    }

    function buildMenu($parent, $menu)
    {
        $html = "";
        if (isset($menu['parents'][$parent]))
        {
            $html .= "<ul>";
            foreach ($menu['parents'][$parent] as $itemId)
            {
                if(!isset($menu['parents'][$itemId]))
                {
                    //IF MENU DONT HAVE SUBMENU

                    $active = "Hiển thị";
                    if($menu['items'][$itemId]['active'] == 0){
                        $active = "Không hiển thị";
                    }

                    $html .= "<li><div class='row'>
                    <div class='col-lg-3'><p class='bg-success'>".$menu['items'][$itemId]['caName']."</p></div>
                    <div class='col-lg-3'>".$menu['items'][$itemId]['description']."</div>
                    <div class='col-lg-3'>$active</div>
                    <div class='col-lg-3'>".$menu['items'][$itemId]['usName']."</div>
                    </div></li>";
                }
                if(isset($menu['parents'][$itemId]))
                {
                    //IF MENU HAS SUBMENU
                    $html .= "<li><div class='row'>
                    <div class='col-lg-3'>".$menu['items'][$itemId]['caName']."</div>
                    <div class='col-lg-3'>".$menu['items'][$itemId]['description']."</div>
                    <div class='col-lg-3'>$active</div>
                    <div class='col-lg-3'>".$menu['items'][$itemId]['usName']."</div>
                    </div>";
                    $html .= $this->buildMenu($itemId, $menu);
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }
}