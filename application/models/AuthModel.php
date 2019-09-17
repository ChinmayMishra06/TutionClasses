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
        $this->db->insert(TABLE_SESS, array('user_id'=>$user->user_id, 'email'=>$user->email));

        //select entry
        $sess_json = $this->db->select("*")->where("sess_id", $this->db->insert_id())->get(TABLE_SESS)->row();
        //encode to json
        $sess_json = json_encode($sess_json);
        
        return $this->encryption->encrypt($sess_json);
    }

    public function validateUser($userData)
    {
        $result = $this->db->select("user_id")->where($userData)->get(TABLE_SESS);
        
        if(!$result){
            return 0;
        }

        if($result -> num_rows() > 0){
            return $result->row()->user_id;
        }

        return 0;
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

    public function getCategory($parentCategory = 0)    {
        $result = $this->db->select("parent_category, category_name")->where("parent_category", $parentCategory)->get(TABLE_CAT);

        if(!$result){
            return false;
        }
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    public function logout($userId){
        $result = $this->db->where("user_id", $userId)->update(TABLE_SESS, ["status" => 0, "delete_flag" => 1]);
        if(!$result){
            return false;
        }

        if($result == 1){
            return true;
        }

        return false;
    }
}