<?php

class CommonModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function editProfileData($user_id, $data)
    {
        $result = $this->db->set($data)
                           ->where('user_id', $user_id)
                           ->update(TABLE_USER);
        return $result ? true : false;
    }

    public function getProfileData($user_id)
    {
        $result = $this->db->select('name, email, contact, address, dob, image')
                           ->where('user_id', $user_id)
                           ->get(TABLE_USER);
                    
        return ($result->num_rows() > 0) ? $result->row() : false;
    }
}