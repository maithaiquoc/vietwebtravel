<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Zeta-Daryll
 * Date: 6/17/14
 * Time: 12:09 PM
 * To change this templates use File | Settings | File Templates.
 */
class Users_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getEmail($email){
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        return $query->num_rows();
    }

    public function insert($email, $password, $sex, $name, $phone, $birthday, $confirm_code,  $expired_active)
    {
        $this->db->query("INSERT INTO users(email, password, sex, name, phone, birthday, confirm_code, active, expired_active) VALUES('$email', '$password', '$sex', '$name', '$phone', '$birthday', '$confirm_code', '0', '$expired_active')");
    }

    public function getLoginInfo($email, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        return $query->num_rows();
    }

    public function getAdminLoginInfo($email, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND admin = '1'");
        return $query->num_rows();
    }

    public function getInfoUser($field, $email)
    {
        $query = $this->db->query("SELECT $field FROM users WHERE email = '$email'");
        $row = $query->row_array();
        return $row[$field];
    }

    public function find($email)
    {
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if($query->num_rows() == 0){
            return 0;
        }
        else{
            return $query->row_array();
        }
    }

    public function confirm($key, $now){
        $query = $this->db->query("UPDATE users SET active = '1', active_datetime = '$now' WHERE confirm_code = '$key'");
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        else{
            return 0;
        }
    }

    public function getExpiredActive($field, $key)
    {
        $query = $this->db->query("SELECT $field FROM users WHERE confirm_code = '$key'");
        $row = $query->row_array();
        return $row[$field];
    }

    public function getConfirmCode($key)
    {
        $query = $this->db->query("SELECT * FROM users WHERE confirm_code = '$key'");
        return $query->num_rows();
    }

    public function updateExpiredActive($email, $now){
        $query = $this->db->query("UPDATE users SET expired_active = '$now' WHERE email = '$email'");
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        else{
            return 0;
        }
    }

    public function updatePassword($email, $newPass){
        $query = $this->db->query("UPDATE users SET password = '$newPass' WHERE email = '$email'");
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        else{
            return 0;
        }
    }

    public function updatePasswordTable($email, $confirm_code, $password_code, $expired_reset){
        $query = $this->db->query("UPDATE password SET confirm_code = '$confirm_code', password_code = '$password_code', expired_reset = '$expired_reset' WHERE email = '$email'");
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        else{
            return 0;
        }
    }

    public function getPasswordTable($email){
        $query = $this->db->query("SELECT * FROM password WHERE email = '$email'");
        return $query->num_rows();
    }

    public function checkCode($code, $key){
        $query = $this->db->query("SELECT * FROM password WHERE password_code = '$code' AND confirm_code = '$key'");
        return $query->num_rows();
    }

    public function checkConfirmCode($key){
        $query = $this->db->query("SELECT * FROM password WHERE confirm_code = '$key'");
        return $query->num_rows();
    }

    public function getInfoPassword($field, $key)
    {
        $query = $this->db->query("SELECT $field FROM password WHERE confirm_code = '$key'");
        $row = $query->row_array();
        return $row[$field];
    }

    public function updateChangedPasswordTime($dt, $key)
    {
        $query = $this->db->query("UPDATE password SET changed_datetime = '$dt' WHERE confirm_code = '$key'");
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        else{
            return 0;
        }
    }

    public function getEmailSessionTable($field, $ip)
    {
        $query = $this->db->query("SELECT $field FROM ci_sessions WHERE ip_address = '$ip'");
        $row = $query->row_array();
        return $row[$field];
    }

    public function getSessionTable($ip)
    {
        $query = $this->db->query("SELECT * FROM ci_sessions WHERE ip_address = '$ip'");
        return $query->num_rows();
    }
}
?>