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
        $result = $this->db->select("user_id, name, email")->from(TABLE_USER)->where(array('email' => $email, 'password' => $password))->limit(1)->get();

        if (!$result)
            return false;

        if ($result->num_rows() > 0)
            return $result->row();

        return false;
    }

    public function createSession($user) {

        //create entry

        //select entry

        //encode to json

        $this->load->library('encryption');

//        return $this->encryption->encrypt(json);

    }

    public function signUp($name, $email, $password)
    {
        return $this->db->insert(TABLE_USER, array('name' => $name, 'email' => $email, 'password' => $password));
    }

    public function forget($email)
    {
        return $this->db->where("email", $email)->get(TABLE_USER)->row()->email;
    }

    public function reset($email, $newPassword)
    {
        return $this->db->where("email", $email)->update(TABLE_USER, array("password" => "$newPassword"));
    }
}