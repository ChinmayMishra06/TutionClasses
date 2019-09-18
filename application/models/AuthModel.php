<?php

class AuthModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getUser($email, $password, $userType)
    {
        $result = $this->db->select("user_id, name, email")->from(TABLE_USER)->where(array('email' => $email, 'password' => $password, 'user_type' => $userType))->limit(1)->get();

        if (!$result)
            return false;

        if ($result->num_rows() > 0)
            return $result->row();

        return false;
    }

    public function createSession($user) {
        // print_r($user);die();
                
        //create entry for single session with tracking.
        // $this->db->where(array('user_id'=>$user->user_id))->update(TABLE_SESS, array('status'=> '0'));
        // $this->db->insert(TABLE_SESS, array('user_id'=>$user->user_id, 'email'=>$user->email));

        // //create entry for Multiple session.
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

    public function signUp($name, $email, $password, $userType)
    {
        $userResult = $this->db->select('name')->where(array('email'=>$email, 'user_type'=>$userType))->get(TABLE_USER);
        if($userResult->num_rows() > 0){
            return "";
        }else{
            $result = $this->db->insert(TABLE_USER, array('name' => $name, 'email' => $email, 'password' => $password, 'user_type'=>$userType));
            return !$result ? false : true;
        }
        
    }

    public function forget($email)
    {
        return $this->db->where("email", $email)->get(TABLE_USER)->row()->email;
    }

    public function reset($email, $newPassword)
    {
        return $this->db->where("email", $email)->update(TABLE_USER, array("password" => "$newPassword"));
    }

    public function getCategory($parentCategory){
        $result = $this->db->select("parent_category, category_name")->where("parent_category", $parentCategory)->get(TABLE_CAT);

        if(!$result){
            return false;
        }
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    public function logout($authToken){
        $authToken = $this->encryption->decrypt($authToken);
        $authToken = json_decode($authToken);
        // $result = $this->db->update(TABLE_SESS, ["status" => 0]); // Uncomment for use single session and comment multisession.
        $result = $this->db->where("sess_id", $authToken->sess_id)->update(TABLE_SESS, ["status" => 0]); // Uncomment for use multiple session and comment single session.
        if(!$result){
            return false;
        }

        if($result == 1){
            return true;
        }

        return false;
    }
}