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
            $result = $this->db->set($userData)->where('user_id',$userId)->update(TABLE_USER);
            return !$result ? false : true;
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

        public function addCourse($courseData){
            $result = $this->db->insert(TABLE_COURSE, $courseData);
            return $result ? true : false;
        }

        public function editCourse($userId, $courseData){
            $result = $this->db->set($courseData)->where('user_id', $userId)->update(TABLE_COURSE);
            return $result ? true : false;
        }

        public function getCourse($userId, $latitude, $longitude, $categoryId, $medium, $distance=100){
            $result = $this->db->select('user_type')->where(['user_id'=>$userId, 'user_type'=>1])->get(TABLE_USER);
            if(!$result){
                return false;
            }else{
                if($result->num_rows() > 0){
                    return true;
                }else{
                    $result = $this->db->select('user_id, ( 6371  * 
                    acos ( cos ( radians('. $latitude .') ) * 
                    cos( radians( latitude ) ) * 
                    cos( radians( longitude ) - radians(' . $longitude . ') ) + 
                    sin ( radians('. $latitude .') ) * 
                    sin( radians( latitude ) ) ) ) 
                    AS distance')
                    ->where(['user_type'=>1, 'status' => 1, 'delete_flag' => 0])
                    ->having('distance < ' . $distance)->order_by('distance')->limit(20)->get(TABLE_USER);

                    if($result->num_rows() > 0){                        
                        $result = $result->result_array();
                        // To store all the id's selected by the above query.
                        $id = [];
                        foreach($result as $key){
                            $id[] = $key['user_id'];
                        }
                             
                        $include_or_not =  [];
                        $join_cat_med = '';
                        if($categoryId !== false ){
                            if($medium !== false ){
                                $include_or_not[TABLE_COURSE.'.medium'] = $medium;
                                $include_or_not[TABLE_COURSE.'.category_id'] =  $categoryId;
                            }else{
                                $include_or_not[TABLE_COURSE.'.category_id'] =  $categoryId;
                            }                            
                        }if($medium !== false ){
                            $include_or_not[TABLE_COURSE.'.medium'] = $medium;
                        }

                        $result = $this->db
                        ->select(TABLE_USER.'.user_id,'. TABLE_COURSE. '.course_name,  name, email, contact, address, medium')
                        ->join(TABLE_COURSE, TABLE_USER.'.user_id='.TABLE_COURSE.'.user_id')
                        ->from(TABLE_USER)
                        ->where($include_or_not)
                        ->where_in(TABLE_USER.'.user_id', $id)
                        ->get();

                        if($result->num_rows() > 0) {
                            return $result->result_array();
                        }else{
                            return false;
                        }
                    }                    
                }
            }
        }
    }
?>