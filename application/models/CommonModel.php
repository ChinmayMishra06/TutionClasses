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
            $update_feedback = $this->db
                                    ->set($data)
                                    ->where('feedback_id', $get_feedback->row()->feedback_id)
                                    ->update(TABLE_FEED);
            if($update_feedback){
                $select_course_feedback = $this->db->select('AVG('. TABLE_FEED .'.rating) avg_rating')
                                   ->where('course_id', $data['course_id'])
                                   ->get(TABLE_FEED);

                if($select_course_feedback->num_rows() > 0){
                    $update_course_feedback = $this->db->set(array('avg_rating'=>round($select_course_feedback->row()->avg_rating, 0)))
                                                       ->where('course_id', $data['course_id'])                   
                                                       ->update(TABLE_COURSE);
                    return $update_course_feedback ? true : false;
                }
            }
        }else{
            $insert_feedback = $this->db->insert(TABLE_FEED, $data);
            if($insert_feedback){
                $select_course_feedback = $this->db->select('AVG('. TABLE_FEED .'.rating) avg_rating')
                                   ->where('course_id', $data['course_id'])
                                   ->get(TABLE_FEED);

                if($select_course_feedback->num_rows() > 0){
                    $update_course_feedback = $this->db->set(array('avg_rating'=>round($select_course_feedback->row()->avg_rating, 0)))
                                                       ->where('course_id', $data['course_id'])
                                                       ->update(TABLE_COURSE);
                    return $update_course_feedback ? true : false;
                }
            }
        }        
    }

    public function addReport($data){
            $result = $this->db->insert(TABLE_REPORT, $data);
            return $result ? true : false;
    }

    public function getAllFeedbacks($user_id){
        $result = $this->db->select("tf.*, tc.course_name, tu.user_id, tu.name, tu.email")
                        ->join(TABLE_COURSE .' tc', 'tc.course_id=tf.course_id')
                        ->join(TABLE_USER .' tu', 'tc.user_id=tu.user_id')
                        ->where('tu.user_id', $user_id)
                        ->get(TABLE_FEED . ' tf');
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getCourseFeedbacks($course_id){
        $result = $this->db->select("tf.*, tc.course_name, tu.user_id, tuf.name, tuf.email")
                           ->join(TABLE_COURSE .' tc', 'tc.course_id=tf.course_id')
                           ->join(TABLE_USER .' tu', 'tc.user_id=tu.user_id')
                           ->join(TABLE_USER .' tuf', 'tf.user_id=tuf.user_id')
                           ->where('tc.course_id', $course_id)
                           ->get(TABLE_FEED . ' tf');
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getHappyFeedbacks($limit=false){
        $this->db->select(TABLE_FEED.".*, name, image, email, course_name")
                 ->join(TABLE_USER, TABLE_USER.".user_id=" . TABLE_FEED.".user_id")
                 ->join(TABLE_COURSE, TABLE_COURSE.".course_id=" . TABLE_FEED.".course_id")
                 ->where(TABLE_FEED.'.status', 1)
                 ->order_by(TABLE_FEED.'.feedback_id', 'desc');
                    if($limit > 0){
                        $this->db->limit($limit);
                    }                        
                $result = $this->db->get(TABLE_FEED);
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }
    
    public function getUserFeedbacks($user_id, $course_id){
        $result = $this->db->select(TABLE_FEED.".*")
                 ->where(TABLE_FEED.'.user_id', $user_id)
                 ->where(TABLE_FEED.'.course_id', $course_id)
                ->get(TABLE_FEED);
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    public function getAllReports($user_id){
        $result = $this->db->select("tr.*, tc.course_name, tuc.name as criminal_name, tuc.email as criminal_email, tuv.name as victim_name, tuv.email as victim_email")
                        ->join(TABLE_COURSE .' tc', 'tc.course_id=tr.course_id')
                        ->join(TABLE_USER .' tuc', 'tc.user_id=tuc.user_id')
                        ->join(TABLE_USER .' tuv', 'tr.victim_id=tuv.user_id')
                        ->where('tuc.user_id', $user_id)
                        ->get(TABLE_REPORT . ' tr');
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

    public function addContact($data){
        $result = $this->db->insert(TABLE_CONTACT, $data);
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