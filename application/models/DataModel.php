<?php

class DataModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getValue($key)
    {
        $result = $this->db->select("value")->from(TABLE_DATA)->where("key", $key)->limit(1)->get();

        if (!$result)
            return "";

        if ($result->num_rows() > 0)
            return $result->row()->value;

        return "";
    }

    public function setValue($key, $value){
        $result = $this->db->replace(TABLE_DATA, ['key'=>$key, 'value'=>$value]);
        if(!$result):
            return $result;
        elseif($result):
            return $result;
        endif;
        return "";
    }

    public function getCategory($parentCategory, $categoryType){
        $result = $this->db
        ->select("category_id, category_name")
        ->where("parent_category", $parentCategory)
        ->where("category_type", $categoryType)
        ->where("status", 1)
        ->get(TABLE_CAT);

        return ($result->num_rows() > 0) ? $result->result_array() : false;    
    }    

    public function addCategory($data){
        // echo "<pre>"; print_r($data); die();
        $result = $this->db->insert(TABLE_CAT, $data);
        return $result ? true : false;
    }    
}