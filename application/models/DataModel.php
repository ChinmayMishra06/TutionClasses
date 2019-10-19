<?php

class DataModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getValue($key){
        $result = $this->db->select("value")->from(TABLE_DATA)->where("key", $key)->limit(1)->get();
        return ($result->num_rows() > 0) ? $result->row()->value : false;
    }

    public function setValue($key, $value){
        $result = $this->db->replace(TABLE_DATA, ['key'=>$key, 'value'=>$value]);
        return $result ? $result : false;
    }

    public function getCategory($parent_category, $category_type){
        $result = $this->db
        ->select("category_id, category_name")
        ->where("parent_category", $parent_category)
        ->where("category_type", $category_type)
        ->where("status", 1)
        ->get(TABLE_CAT);

        return ($result->num_rows() > 0) ? $result->result_array() : false;    
    }    

    public function addCategory($data){
        $result = $this->db->insert(TABLE_CAT, $data);
        return $result ? true : false;
    }    
}