<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'BaseApi.php';

class UserApi extends BaseApi
{
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

        // Editing user profile details
        $this->load->model('UserModel', 'userModel');
        $editUserResult = $this->userModel->editUser($this->userId, $userData);
        if($editUserResult == 1){
            $this->success('User details updated successfully.');
        }else{
            $this->error('User details could not be updated');
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
}