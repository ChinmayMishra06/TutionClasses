<?php

class CommonModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function editProfileData($userId, $data){
        $result = $this->db->set($data)
                           ->where('user_id', $userId)
                           ->update(TABLE_USER);
        return $result ? true : false;
    }

    public function getProfileData($userId){
        $result = $this->db->select('name, email, contact, address, dob, image, banner_image')
                           ->where('user_id', $userId)
                           ->get(TABLE_USER);
                    
        return ($result->num_rows() > 0) ? $result->row() : false;
    }
    
    public function getAllFeedbacks($courseId=false, $userId=false){
        $this->db->select(TABLE_FEED.".*, name, email, course_name")
                 ->join(TABLE_USER, TABLE_USER.".user_id=" . TABLE_FEED.".user_id")
                 ->join(TABLE_COURSE, TABLE_COURSE.".course_id=" . TABLE_FEED.".course_id")
                 ->where(TABLE_FEED.'.status', 1)
                 ->order_by(TABLE_FEED.'.feedback_id', 'desc');
                    if($userId)
                        $this->db->where(TABLE_FEED.'.user_id', $userId);
                    if($courseId)
                        $this->db->where(TABLE_FEED.'.course_id', $courseId);
                        
                $result = $this->db->get(TABLE_FEED);
        // echo "<pre>"; print_r($result->result_array()); die();
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getHappyFeedback($limit=false){
        $this->db->select(TABLE_USER.'.name,'.TABLE_USER.'.image,'. TABLE_COURSE . '.course_name,' . TABLE_FEED . '.description')
                 ->join(TABLE_USER, TABLE_USER.'.user_id='. TABLE_FEED . '.user_id')
                 ->join(TABLE_COURSE, TABLE_COURSE.'.course_id='. TABLE_FEED . '.course_id'); 
                 if($limit > 0)
                    $this->db->limit($limit);
        $result = $this->db->get(TABLE_FEED);
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getAllReports($userId){
        $result = $this->db->select(TABLE_REPORT.".*, victim.name victim_name, victim.email, category_name")
                           ->join(TABLE_USER . " as victim", "victim.user_id=" . TABLE_REPORT.".victim_id")
                           ->join(TABLE_CAT, TABLE_CAT.".category_id=" . TABLE_REPORT.".course_id")
                           ->where(TABLE_REPORT.'.status', 1)
                           ->get(TABLE_REPORT);
        // echo "<pre>"; print_r($result->result_array()); die();
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    // public function getUserByEmail($email){
    //     $result = $this->db->select("user_id")
    //                        ->where(array('email' => $email))
    //                        ->limit(1)
    //                        ->get(TABLE_USER);

    //     return ($result->num_rows() > 0) ? $result->row()->user_id : false;
    // }
    
    public function getSubscriber($email, $deleted){
        $result = $this->db->select("email")
                           ->where(array('email' => $email))
                           ->where(array('deleted_at' => $deleted))
                           ->limit(1)
                           ->get(TABLE_NEWS);
    
        return ($result->num_rows() > 0) ? $result->row() : false;
    }
    
    public function subscribe($email){
        $getSubscriberStatus = $this->getSubscriber($email, 1);
        if($getSubscriberStatus){
            $updateSubscriber = $this->db->set('deleted_at', 0)
                                         ->where('email', $email)
                                         ->update(TABLE_NEWS);
            return $updateSubscriber ? true : false;
        }else{
            $newSubscriber = $this->db->insert(TABLE_NEWS, array('email'=>$email));
            return $newSubscriber ? true : false;
        }
    }

    // public function unsubscribe($userId){
    //     $getSubscriberStatus = $this->getSubscriber($userId, 0);
    //     if($getSubscriberStatus){
    //         $updateSubscriber = $this->db->set('deleted_at', 1)
    //                                      ->where('user_id', $userId)
    //                                      ->update(TABLE_NEWS);
    //         return $updateSubscriber ? true : false;
    //     }
    // }

    public function feedbackAdd($data)
    {
        $getFeedback = $this->db
                             ->select('feedback_id')
                             ->where('user_id', $data['user_id'])
                             ->where('course_id', $data['course_id'])
                             ->get(TABLE_FEED);
        if($getFeedback->num_rows() > 0){
            $result = $this->db
                           ->set($data)
                           ->where('feedback_id', $getFeedback->row()->feedback_id)
                           ->update(TABLE_FEED);
            return $result ? true : false;
        }else{
            $result = $this->db->insert(TABLE_FEED, $data);
            return $result ? true : false;
        }        
    }
    
    public function addEnquiry($data){
        $result = $this->db->insert(TABLE_ENQ, $data);
        return $result ? true : false;
    }

    // public function getAllCategory($categoryName)    {
    //     $result = $this->db->select('category_id, category_type, category_name, parent_category')
    //                         ->like('category_name', $categoryName)
    //                         ->where('status', 1)
    //                         ->get(TABLE_CAT);
    //     return ($result->num_rows() > 0) ? $result->result_array() : false;
    // }
}