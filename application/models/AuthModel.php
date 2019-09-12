<?php

class AuthModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUser($email, $password)
    {
        $result = $this->db->select("value")->from(TABLE_DATA)->where("key", $key)->limit(1)->get();

        if (!$result)
            return false;

        if ($result->num_rows() > 0)
            return $result->row();

        return false;
    }



}