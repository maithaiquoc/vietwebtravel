<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');

class Crud extends CI_Controller {

    protected $_gallery_path = "";
    protected $_gallery_url = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->library("pagination");

        $this->_gallery_url = base_url()."uploads/";
        $this->_gallery_path = realpath(APPPATH. "../uploads");
    }

    public function upload($sessionName, $idFileUpload)
    {
        $config = array('upload_path'   => $this->_gallery_path,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '2048',
            'remove_spaces' => 'TRUE',
            'encrypt_name' => 'TRUE'
        );

        $this->load->library("upload",$config);
        if(!$this->upload->do_upload($idFileUpload)){
            $error = $this->upload->display_errors();
            return $error;
        }else{
            //print_r($this->upload->get_multi_upload_data());
            $upload_data = $this->upload->data();
            $fileName = "".$upload_data['raw_name'].$upload_data['file_ext']."";
            $this->setSession($sessionName, $fileName);
            return $fileName;
        }
    }

    public function multi_upload($sessionName, $idFileUpload)
    {
        $config = array('upload_path'   => $this->_gallery_path,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '2048',
            'remove_spaces' => 'TRUE',
            'encrypt_name' => 'TRUE'
        );
        $this->load->library("upload",$config);
        if(!$this->upload->do_multi_upload($idFileUpload)){
            $error = $this->upload->display_errors();
            return $error;
        }else{
//            print_r($this->upload->get_multi_upload_data());
            $upload_data = $this->upload->get_multi_upload_data();
            $fileNameArr = array();
            $i = 0;
            foreach($upload_data as $objUploadData){
                $fileNameArr[$i] = "".$objUploadData['raw_name'].$objUploadData['file_ext']."";
                $i++;
            }

            $fileName = "";
            for($j = 0; $j < count($fileNameArr); $j++){
                $fileName .= $fileNameArr[$j].",";
            }

            //print_r($fileName);
            $data[$sessionName] = $fileName;
            $this->session->set_userdata($data);

            return $fileName;
        }
    }

    public function getIDUser(){
        $email = $this->session->userdata('email');
        $field = 'id';
        $idUser = $this->users_model->getInfoUser($field, $email);
        return $idUser;
    }

    public function setSession($sessionName, $value)
    {
        $this->session->set_userdata($sessionName, $value);
        return $this->session->userdata($sessionName);
    }

    public function emptySession($sessionName)
    {
        $this->session->unset_userdata($sessionName);
        return $this->session->userdata($sessionName);
    }

    public function subscribe($email, $subject, $view, $data) {
        $data['site_name'] = 'SAROMA';

        $result = $this->sendEmail($email, $subject, $view, $data);
        return $result;
    }

    public function sendEmail($email, $subject, $view, $data) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html', //neu van ko hien thi trong body mail thi set lai trong file libraries/email
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from('saromavn2014@gmail.com', 'www.saroma1.vthost.vn');
        $this->email->to($email);
        $this->email->subject($subject);
        $body = $this->load->view($view, $data, TRUE);
        $this->email->message($body);

        $result = $this->email->send();

        if (!$result){
            return $this->email->print_debugger();
        }
        else{
            return 0;
        }
    }
}