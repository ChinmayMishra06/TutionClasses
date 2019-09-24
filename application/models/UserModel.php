<?php

class /**/
UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUser($userId)
    {
        $result = $this->db->select(array('name', 'contact', 'email', 'dob', 'image'))->where(array('user_id' => $userId))->get(TABLE_USER);
        if (!$result) {
            return false;
        }
        if ($result->num_rows() > 0) {
            return $result->row();
        }
        return false;
    }

    public function editUser($userId, $userData)
    {
        $result = $this->db->set($userData)->where('user_id', $userId)->update(TABLE_USER);
        return !$result ? false : true;
    }

    public function addFeedback($userId, $categoryId, $description)
    {
        $result = $this->db->insert(TABLE_FEED, array(
            "user_id" => $userId,
            "category_id" => $categoryId,
            "description" => $description
        ));
        return $result ? true : false;
    }

    public function addReport($categoryId, $victimId, $criminalId, $title, $description)
    {
        $result = $this->db->insert(TABLE_REPORT, array(
            "category_id" => $categoryId,
            "victim_id" => $victimId,
            "criminal_id" => $criminalId,
            "title" => $title,
            "description" => $description
        ));
        return $result ? true : false;
    }

    public function addCourse($courseData)
    {
        $result = $this->db->insert(TABLE_COURSE, $courseData);
        return $result ? true : false;
    }

    public function editCourse($userId, $courseData)
    {
        $result = $this->db->set($courseData)->where('user_id', $userId)->update(TABLE_COURSE);
        return $result ? true : false;
    }

    public function getUserType($userId){
        //checking for user type is tutor
        $result = $this->db->select('user_type')
                            ->where('user_id', $userId)
                            ->where('status',1)
                            ->get(TABLE_USER);

        if (!$result)
            return false;
        
        if ($result->num_rows() > 0)
            return $result->row()->user_type;
    }
    
    public function getCourses($latitude, $longitude, $categoryId, $medium, $distance = 100)
    {
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

//        $include_or_not = array();
//        $join_cat_med = '';
//        if ($categoryId !== false) {
//            if ($medium !== false) {
//                $include_or_not['tc.medium'] = $medium;
//                $include_or_not['tc.category_id'] = $categoryId;
//            } else {
//                $include_or_not['tc.category_id'] = $categoryId;
//            }
//        }
//
//        if ($medium !== false) {
//            $include_or_not['tc.medium'] = $medium;
//        }

        $this->db
            ->select('tc.user_id, tc.course_name, tc.category_id,  tu.name, tu.email, tu.contact, tu.address, tct.category_name, tcm.category_name as medium')
            ->from(TABLE_COURSE . ' tc')
            ->join(TABLE_USER . ' tu', 'tu.user_id = tc.user_id')
            ->join(TABLE_CAT . ' tct', 'tct.category_id = tc.category_id')
            ->join(TABLE_CAT . ' tcm', 'tcm.category_id = tc.medium');

        if ($categoryId !== false)
            $this->db->where('tc.category_id', $categoryId);

        if ($medium !== false)
            $this->db->where('tc.medium', $medium);

        $result = $this->db->where_in('tc.user_id', $id)
            ->where('tc.status', 1)
            ->get();

        if ($result->num_rows() == 0)
            return false;
        
        return $result->result_array();
    }
}

?>