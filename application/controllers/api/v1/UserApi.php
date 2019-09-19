<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'BaseApi.php';

class UserApi extends BaseApi
{
    private static $LIMIT = 20;
    public function __construct()
    {
        parent::__construct();
    }

    public function apiGetProfile(){
        // Checking user is authorized?
        if($this->userId == 0){
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }

        // Getting user profile details
        $this->load->model('UserModel', 'userModel');
        $userDetails = $this->userModel->getUser($this->userId);
        if($userDetails){
            $this->success('Data found', $userDetails);
        }
    }

    public function apiEditProfile(){
        // Checking user is authorized?

        if($this->userId == 0){
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }
        $userData = [];
        // Validating user input
        if(isset($this->inputJson->name)){
            $userData['name'] = $this->inputJson->name;
        }

        if(isset($this->inputJson->email)){
            $userData['email'] = $this->inputJson->email;
        }

        if(isset($this->inputJson->contact)){
            $userData['contact'] = $this->inputJson->contact;
        }

        if(isset($this->inputJson->address)){
            $userData['address'] = $this->inputJson->address;
        }

        if(isset($this->inputJson->dob)){
            $userData['dob'] = $this->inputJson->dob;
        }

        if(isset($this->inputJson->image)){
            $userData['image'] = $this->inputJson->image;
        }

        if(isset($this->inputJson->longitude)){
            $userData['longitude'] = $this->inputJson->longitude;
        }

        if(isset($this->inputJson->latitude)){
            $userData['latitude'] = $this->inputJson->latitude;
        }

        // Editing user profile details
        $this->load->model('UserModel', 'userModel');
        $response = $this->userModel->editUser($this->userId, $userData);
        if($response){
            $this->success('User details updated successfully.');
        }else{
            $this->error(ERR_FAILED);
        }
    }

    public function apiAddFeedback(){
        if(!isset($this->inputJson->user_id)){
            $this->error("User id field is required", ErrorCode::PARAM_MISSING);
        }
        if(!isset($this->inputJson->category_id)){
            $this->error("Category id field is required", ErrorCode::PARAM_MISSING);
        }
        if(!isset($this->inputJson->description)){
            $this->error("Description field is required", ErrorCode::PARAM_MISSING);
        }

        $this->load->model("UserModel","userModel");
        $response = $this->userModel->addFeedback(
            trim($this->inputJson->user_id),
            trim($this->inputJson->category_id),
            trim($this->inputJson->description)
        );

        if($response == true){
            $this->success("Feedback send successfully.");
        }else{
            $this->error(ERR_FAILED);
        }
    }

    public function apiAddReport(){
        if(!isset($this->inputJson->category_id)){
            $this->error("Category id field is required", ErrorCode::PARAM_MISSING);
        }
        if(!isset($this->inputJson->victim_id)){
            $this->error("Victim id field is required", ErrorCode::PARAM_MISSING);
        }        
        if(!isset($this->inputJson->criminal_id)){
            $this->error("Criminal id field is required", ErrorCode::PARAM_MISSING);
        }
        if(!isset($this->inputJson->title)){
            $this->error("Title field is required", ErrorCode::PARAM_MISSING);
        }
        if(!isset($this->inputJson->description)){
            $this->error("Description field is required", ErrorCode::PARAM_MISSING);
        }

        $this->load->model("UserModel","userModel");
        $response = $this->userModel->addReport(
            trim($this->inputJson->category_id),
            trim($this->inputJson->victim_id),
            trim($this->inputJson->criminal_id),
            trim($this->inputJson->title),
            trim($this->inputJson->description)
        );

        if($response == true){
            $this->success("Report send successfully.");
        }else{
            $this->error(ERR_FAILED);
        }
    }

    public function apiAddCourse(){
        // Checking user is authorized?

        if($this->userId == 0){
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }
        $courseData = [];
        // Validating user input
        $courseData['category_id']  = isset($this->inputJson->category_id)  ? trim($this->inputJson->category_id)  : $this->error('Category id field is required.', ErrorCode::PARAM_MISSING);
        $courseData['user_id']      = isset($this->inputJson->user_id)      ? trim($this->inputJson->user_id)      : $this->error('User id field is required.', ErrorCode::PARAM_MISSING);
        $courseData['course_name']  = isset($this->inputJson->course_name)  ? trim($this->inputJson->course_name)  : $this->error('Course name field is required.', ErrorCode::PARAM_MISSING);
        $courseData['start_date']   = isset($this->inputJson->start_date)   ? trim($this->inputJson->start_date)   : $this->error('Start date field is required.', ErrorCode::PARAM_MISSING);
        $courseData['description']  = isset($this->inputJson->description)  ? trim($this->inputJson->description)  : $this->error('Description field is required.', ErrorCode::PARAM_MISSING);
        $courseData['duration']     = isset($this->inputJson->duration)     ? trim($this->inputJson->duration)     : $this->error('Duration field is required.', ErrorCode::PARAM_MISSING);
        $courseData['medium']       = isset($this->inputJson->medium)       ? trim($this->inputJson->medium)       : $this->error('Medium field is required.', ErrorCode::PARAM_MISSING);
        $courseData['logo_image']   = isset($this->inputJson->logo_image)   ? trim($this->inputJson->logo_image)   : $this->error('Logo image field is required.', ErrorCode::PARAM_MISSING);
        $courseData['banner_image'] = isset($this->inputJson->banner_image) ? trim($this->inputJson->banner_image) : $this->error('Banner image field is required.', ErrorCode::PARAM_MISSING);
        $courseData['fees']         = isset($this->inputJson->fees)         ? trim($this->inputJson->fees)         : $this->error('Fees field is required.', ErrorCode::PARAM_MISSING);

        // Editing user profile details
        $this->load->model('UserModel', 'userModel');
        $response = $this->userModel->addCourse($courseData);
        if($response){
            $this->success('Course added successfully.');
        }else{
            $this->error(ERR_FAILED);
        }
    }

    public function apiEditCourse(){
        // Checking user is authorized?

        if($this->userId == 0){
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }
        $courseData = [];
        // Validating user input
        if(isset($this->inputJson->category_id)){
            $courseData['category_id'] = trim($this->inputJson->category_id);
        }
        if(isset($this->inputJson->user_id)){
            $courseData['user_id'] = trim($this->inputJson->user_id);
        }
        if(isset($this->inputJson->course_name)){
            $courseData['course_name'] = trim($this->inputJson->course_name);
        }
        if(isset($this->inputJson->start_date)){
            $courseData['start_date']  = trim($this->inputJson->start_date);
        }
        if(isset($this->inputJson->description)){
            $courseData['description']  = trim($this->inputJson->description);
        }
        if(isset($this->inputJson->duration)){
            $courseData['duration'] = trim($this->inputJson->duration);
        }
        if(isset($this->inputJson->medium)){
            $courseData['medium'] = trim($this->inputJson->medium);
        }
        if(isset($this->inputJson->logo_image)){
            $courseData['logo_image'] = trim($this->inputJson->logo_image);
        }
        if(isset($this->inputJson->banner_image)){
            $courseData['banner_image'] = trim($this->inputJson->banner_image);
        }
        if(isset($this->inputJson->fees)){
            $courseData['fees'] = trim($this->inputJson->fees);
        }

        // Editing user profile details
        $this->load->model('UserModel', 'userModel');
        $response = $this->userModel->editCourse($this->userId, $courseData);
        if($response){
            $this->success('Course updated successfully.');
        }else{
            $this->error(ERR_FAILED);
        }
    }

    public function apiGetCourse(){
        if($this->userId == 0){
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }

        $authToken = trim($this->inputJson->authToken);
        $authToken = json_decode($this->encryption->decrypt($authToken));

        $latitude = isset($this->inputJson->latitude) ? trim($this->inputJson->latitude) : $this->error("Latitude field is required", ErrorCode::PARAM_MISSING);
        $longitude = isset($this->inputJson->longitude) ? trim($this->inputJson->longitude) : $this->error("Longitude field is required", ErrorCode::PARAM_MISSING);
        $categoryId = isset($this->inputJson->category_id) ? trim($this->inputJson->category_id) :false;
        $medium = isset($this->inputJson->medium) ? trim($this->inputJson->medium) : false;
        
        $this->load->model("UserModel", "userModel");
        $response = $this->userModel->getCourse($authToken->user_id, $latitude, $longitude, $categoryId, $medium);
        ($response == false)
            ? $this->error(ERR_FAILED) 
            : (($response === true)
                ? $this->success(ERR_UNAUTHORIZED_ACCESS)
                : $this->success("Data found", ["have_more"=> (count($response) == self::$LIMIT),"list" => $response]));
    }
}