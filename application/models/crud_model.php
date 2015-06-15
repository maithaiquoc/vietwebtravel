<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Zeta-Daryll
 * Date: 6/17/14
 * Time: 12:09 PM
 * To change this templates use File | Settings | File Templates.
 */
class Crud_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //to select records by id
    function selectID($id, $table)
    {
        $this->db->from($table);
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->row_array();
    }

    //to select records with condition
    function select($field, $table, $condition1, $condition2)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($condition1);
        $this->db->where($condition2);
        $q = $this->db->get();

        $data = array();
        if($q->num_rows() > 0) {
            foreach($q->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //to select records with pagination
    function selectPagination($limit, $start, $field, $table, $condition1, $condition2)
    {
        $this->db->select($field);
        $this->db->from($table);
        if($condition1 != null){
            $this->db->where($condition1);
        }
        if($condition2 != null){
            $this->db->where($condition2);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        else{
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
    }

    //to select num of records with pagination
    function selectNumOfPagination($field, $table, $condition1, $condition2)
    {
        $this->db->select($field);
        $this->db->from($table);
        if($condition1 != null){
            $this->db->where($condition1);
        }
        if($condition2 != null){
            $this->db->where($condition2);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    // to add record
    function insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        return 0;
    }

    // to update record by id
    function update($condition, $id, $table, $data)
    {
        $this->db->where($condition, $id);
        $query = $this->db->update($table, $data);
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        return 0;
    }

    // to delete a record by id
    function delete($field, $id, $table)
    {
        $this->db->where($field, $id);
        $this->db->delete($table);
    }

    // to delete by updating flag = 1
    function deleteID($condition, $id, $table){
        $query = $this->db->query("UPDATE ".$table." SET flag = 1 WHERE ".$condition." = ".$id."");
        if(!$query){
            $error = $this->db->_error_message();
            return $error;
        }
        return 0;
    }

    function max($field, $table){
        $query = $this->db->query("SELECT $field FROM $table");
        $row = $query->row_array();
        return $row[$field];
    }
}
?>