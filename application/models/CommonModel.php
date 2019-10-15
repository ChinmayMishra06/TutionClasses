<?php

class CommonModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function editProfileData($user_id, $data){
        $result = $this->db->set($data)
                           ->where('user_id', $user_id)
                           ->update(TABLE_USER);
        return $result ? true : false;
    }

    public function getProfileData($user_id){
        $result = $this->db->select('name, email, contact, address, dob, image, banner_image')
                           ->where('user_id', $user_id)
                           ->get(TABLE_USER);
                    
        return ($result->num_rows() > 0) ? $result->row() : false;
    }
    
    public function getAllFeedbacks($user_id){
        $result = $this->db->select(TABLE_FEED.".*, name, email, category_name")
                           ->join(TABLE_USER, TABLE_USER.".user_id=" . TABLE_FEED.".user_id")
                           ->join(TABLE_CAT, TABLE_CAT.".category_id=" . TABLE_FEED.".course_id")
                           ->where(TABLE_FEED.'.user_id', $user_id)
                           ->get(TABLE_FEED);
        // echo "<pre>"; print_r($result->result_array()); die();
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getAllReports($user_id){
        $result = $this->db->select(TABLE_REPORT.".*, victim.name victim_name, victim.email, category_name")
                           ->join(TABLE_USER . " as victim", "victim.user_id=" . TABLE_REPORT.".victim_id")
                           ->join(TABLE_CAT, TABLE_CAT.".category_id=" . TABLE_REPORT.".course_id")
                           ->where(TABLE_REPORT.'.status', 1)
                           ->get(TABLE_REPORT);
        // echo "<pre>"; print_r($result->result_array()); die();
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    // public function getAllCategory($categoryName)    {
    //     $result = $this->db->select('category_id, category_type, category_name, parent_category')
    //                         ->like('category_name', $categoryName)
    //                         ->where('status', 1)
    //                         ->get(TABLE_CAT);
    //     return ($result->num_rows() > 0) ? $result->result_array() : false;
    // }
}