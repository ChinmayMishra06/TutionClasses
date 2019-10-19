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

    public function addFeedback($data){
        $get_feedback = $this->db
                             ->select('feedback_id')
                             ->where('user_id', $data['user_id'])
                             ->where('course_id', $data['course_id'])
                             ->get(TABLE_FEED);
        if($get_feedback->num_rows() > 0){
            $result = $this->db
                           ->set($data)
                           ->where('feedback_id', $get_feedback->row()->feedback_id)
                           ->update(TABLE_FEED);
            return $result ? true : false;
        }else{
            $result = $this->db->insert(TABLE_FEED, $data);
            return $result ? true : false;
        }        
    }
    
    public function getAllFeedbacks($course_id=false, $user_id=false, $limit=false){
        $this->db->select(TABLE_FEED.".*, name, image, email, course_name")
                 ->join(TABLE_USER, TABLE_USER.".user_id=" . TABLE_FEED.".user_id")
                 ->join(TABLE_COURSE, TABLE_COURSE.".course_id=" . TABLE_FEED.".course_id")
                 ->where(TABLE_FEED.'.status', 1)
                 ->order_by(TABLE_FEED.'.feedback_id', 'desc');
                    if($user_id > 0)
                        $this->db->where(TABLE_FEED.'.user_id', $user_id);
                    if($course_id > 0)
                        $this->db->where(TABLE_FEED.'.course_id', $course_id); 
                    if($limit > 0)
                        $this->db->limit($limit);
                        
                $result = $this->db->get(TABLE_FEED);
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getAllReports($user_id){
        $result = $this->db->select(TABLE_REPORT.".*, victim.name victim_name, victim.email, category_name")
                           ->join(TABLE_USER . " as victim", "victim.user_id=" . TABLE_REPORT.".victim_id")
                           ->join(TABLE_CAT, TABLE_CAT.".category_id=" . TABLE_REPORT.".course_id")
                           ->where(TABLE_REPORT.'.status', 1)
                           ->get(TABLE_REPORT);
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
        
    public function getSubscriber($email, $deleted){
        $result = $this->db->select("email")
                           ->where(array('email' => $email))
                           ->where(array('deleted_at' => $deleted))
                           ->limit(1)
                           ->get(TABLE_NEWS);
    
        return ($result->num_rows() > 0) ? $result->row() : false;
    }
    
    public function subscribe($email){
        $get_subscriber_status = $this->getSubscriber($email, 1);
        if($get_subscriber_status){
            $update_subscriber = $this->db->set('deleted_at', 0)
                                         ->where('email', $email)
                                         ->update(TABLE_NEWS);
            return $update_subscriber ? true : false;
        }else{
            $new_subscriber = $this->db->insert(TABLE_NEWS, array('email'=>$email));
            return $new_subscriber ? true : false;
        }
    }
    
    public function addEnquiry($data){
        $result = $this->db->insert(TABLE_ENQ, $data);
        return $result ? true : false;
    }

    // public function unsubscribe($user_id){
    //     $getSubscriberStatus = $this->getSubscriber($user_id, 0);
    //     if($getSubscriberStatus){
    //         $updateSubscriber = $this->db->set('deleted_at', 1)
    //                                      ->where('user_id', $user_id)
    //                                      ->update(TABLE_NEWS);
    //         return $updateSubscriber ? true : false;
    //     }
    // }
}