<?php
    class UserModel extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function getUser($userId)
        {
            $result = $this->db->select(array('name', 'contact', 'email', 'dob', 'image'))->where(array('user_id'=>$userId))->get(TABLE_USER);
            if(!$result){
                return false;
            }
            if($result->num_rows() > 0){
                return $result->row();
            }
            return false;
        }
        
        public function editUser($userId, $userData)
        {
            $result = $this->db->where(array('user_id'=>$userId))->update(TABLE_USER, $userData);
            if(!$result){
                return false;
            }
            if($result == 1){
                return true;
            }
            return false;
        }

        public function addFeedback($userId, $categoryId, $description){
            $result = $this->db->insert(TABLE_FEED, [
                "user_id"=>$userId,
                "category_id"=>$categoryId,
                "description"=>$description
            ]);
            return $result ? true : false;
        }

        public function addReport($categoryId, $victimId, $criminalId, $title, $description){
            $result = $this->db->insert(TABLE_REPORT, [
                "category_id"=>$categoryId,
                "victim_id"=>$victimId,
                "criminal_id"=>$criminalId,
                "title"=>$title,
                "description"=>$description
            ]);
            return $result ? true : false;
        }
    }
?>