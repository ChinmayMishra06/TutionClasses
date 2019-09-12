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

    public function setValue($key, $value)
    {

    }

}