<?php

class UserModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getUser($user_id){
        $result = $this->db->select(array('name', 'contact', 'email', 'dob', 'image'))->where(array('user_id' => $user_id))->get(TABLE_USER);
        return ($result->num_rows() > 0) ? $result->row() : false;
    }

    public function editUser($user_id, $userData){
        $result = $this->db->set($userData)->where('user_id', $user_id)->update(TABLE_USER);
        return !$result ? false : true;
    }

    public function addFeedback($user_id, $course_id, $description){
        $result = $this->db->insert(TABLE_FEED, array(
            "user_id" => $user_id,
            "course_id" => $course_id,
            "description" => $description
        ));
        return $result ? true : false;
    }

    public function addReport($category_id, $victim_id, $criminal_id, $title, $description){
        $result = $this->db->insert(TABLE_REPORT, array(
            "category_id" => $category_id,
            "victim_id" => $victim_id,
            "criminal_id" => $criminal_id,
            "title" => $title,
            "description" => $description
        ));
        return $result ? true : false;
    }

    public function addCourse($course_data){
        $result = $this->db->insert(TABLE_COURSE, $course_data);
        return $result ? true : false;
    }

    public function editCourse($course_id, $course_data){
        $result = $this->db->set($course_data)->where('course_id', $course_id)->update(TABLE_COURSE);
        return $result ? true : false;
    }

    public function countTeachersStudents($user_type){
        $result = $this->db->select('name')
                 ->where('user_type', $user_type)
                 ->get(TABLE_USER);
        return ($result->num_rows() > 0) ? $result->num_rows() : false;
    }

    public function countSubscribers(){
        $result = $this->db->select('email')->where('deleted_at', 0)->get(TABLE_NEWS);
        return ($result->num_rows() > 0) ? $result->num_rows() : false;
    }
    
    public function countCourses($user_id=false, $course_id=false, $conditions = false){  
        $this->db->select(TABLE_USER.'.name')
                 ->join(TABLE_USER, TABLE_COURSE.".user_id=" . TABLE_USER. ".user_id")
                 ->join(TABLE_CAT . ' tct', 'tct.category_id ='. TABLE_COURSE . '.category_id')
                 ->join(TABLE_CAT . ' tcs', 'tcs.category_id ='. TABLE_COURSE . '.sub_category_id')
                 ->join(TABLE_CAT . ' tcm', 'tcm.category_id ='. TABLE_COURSE . '.medium')
                 ->join(TABLE_CAT . ' tcd', 'tcd.category_id ='. TABLE_COURSE . '.duration_unit')
                 ->join(TABLE_CAT . ' tcf', 'tcf.category_id ='. TABLE_COURSE . '.fees_unit');
                 if($user_id > 0)
                     $this->db->where(TABLE_COURSE.".user_id=", $user_id);
                 if($course_id > 0)
                     $this->db->where(TABLE_COURSE.".course_id=", $course_id);
                 if($conditions != false){
                    if(array_key_exists('course_name', $conditions)){
                        $this->db->like($conditions);
                    }else{
                        $this->db->where($conditions);
                    }
                }

        $result = $this->db->get(TABLE_COURSE);
        // echo "<pre>" ; print_r($result->num_rows()); die();
        return ($result->num_rows() > 0) ? $result->num_rows() : false;
    }

    public function getAllCourses($limit=false, $page=false, $conditions = false, $user_id=false, $course_id=false){
        $this->db->select(TABLE_USER.'.name,'. TABLE_USER.'.image,'.  TABLE_COURSE.'.*, tct.category_name, tcs.category_name as sub_category, tcm.category_name as medium, tcd.category_name as duration_unit, tcf.category_name as fees_unit')
                 ->join(TABLE_USER, TABLE_COURSE.".user_id=" . TABLE_USER. ".user_id")
                 ->join(TABLE_CAT . ' tct', 'tct.category_id ='. TABLE_COURSE . '.category_id')
                 ->join(TABLE_CAT . ' tcs', 'tcs.category_id ='. TABLE_COURSE . '.sub_category_id')
                 ->join(TABLE_CAT . ' tcm', 'tcm.category_id ='. TABLE_COURSE . '.medium')
                 ->join(TABLE_CAT . ' tcd', 'tcd.category_id ='. TABLE_COURSE . '.duration_unit')
                 ->join(TABLE_CAT . ' tcf', 'tcf.category_id ='. TABLE_COURSE . '.fees_unit')
                 ->join(TABLE_FEED . ' tfr', 'tfr.course_id ='. TABLE_COURSE . '.course_id')
                 ->where(TABLE_COURSE.".status=",1);
                 
                 if($user_id > 0)
                    $this->db->where(TABLE_COURSE.".user_id=", $user_id);
                 if($course_id > 0)
                    $this->db->where(TABLE_COURSE.".course_id=", $course_id);
                 if($conditions != false){
                    if(array_key_exists('course_name', $conditions)){
                        $this->db->like($conditions);
                    }else{
                        $this->db->where($conditions);
                    }
                }
                 if(($limit != false) && ($page != false))
                    $this->db->limit($limit, ($page - 1) * $limit);
        
        $result = $this->db->get(TABLE_COURSE);
        // echo "<pre>"; print_r($result->result_array());die();
        return ($result->num_rows() > 0) ? $result->result_array() : false;
    }

    // public function avrage(){
    //     # code...
    // }

    public function getuserType($user_id){
        //checking for user type is tutor
        $result = $this->db->select('user_type')
                            ->where('user_id', $user_id)
                            ->where('status',1)
                            ->get(TABLE_USER);
        return ($result->num_rows() > 0) ? $result->row()->user_type : false;
    }
    
    public function getCourses($latitude, $longitude, $category_id, $medium, $distance = 100){
        $result = $this->db->select('user_id, ( 6371  * 
                    acos ( cos ( radians(' . $latitude . ') ) * 
                    cos( radians( latitude ) ) * 
                    cos( radians( longitude ) - radians(' . $longitude . ') ) + 
                    sin ( radians(' . $latitude . ') ) * 
                    sin( radians( latitude ) ) ) ) 
                    AS distance')
            ->where(array('user_type' => 1, 'status' => 1, 'delete_flag' => 0))
            ->having('distance < ' . $distance)->order_by('distance')->limit(20)->get(TABLE_USER);
            
        if ($result->num_rows() == 0)
            return false;
        $result = $result->result_array();
        // To store all the id's selected by the above query.
        $id = array();
        foreach ($result as $key) {
            $id[] = $key['user_id'];
        }

        $this->db
            ->select('tc.user_id, tc.course_name, tc.category_id,  tu.name, tu.email, tu.contact, tu.address, tct.category_name, tcm.category_name as medium')
            ->from(TABLE_COURSE . ' tc')
            ->join(TABLE_USER . ' tu', 'tu.user_id = tc.user_id')
            ->join(TABLE_CAT . ' tct', 'tct.category_id = tc.category_id')
            ->join(TABLE_CAT . ' tcm', 'tcm.category_id = tc.medium');

        if ($category_id !== false)
            $this->db->where('tc.category_id', $category_id);

        if ($medium !== false)
            $this->db->where('tc.medium', $medium);

        $result = $this->db->where_in('tc.user_id', $id)
            ->where('tc.status', 1)
            ->get();

        return ($result->num_rows() == 0) ? false : $result->result_array();
    }
}
?>