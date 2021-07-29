<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'BaseApi.php';

class AuthApi extends BaseApi
{
    //Send login response using email and password
    public function apiLogin()
    {
        //validate input values
        if (!isset($this->inputJson->email)) {
            $this->error("Email field required.", PARAM_MISSING);
        }

        if (!isset($this->inputJson->password)) {
            $this->error("Password field required.", PARAM_MISSING);
        }

        if (!isset($this->inputJson->userType)) {
            $this->error("User type field required.", PARAM_MISSING);
        }

        //check for user        
        $this->load->model("AuthModel", "authModel");
        $user = $this->authModel->getUser(trim($this->inputJson->email), trim($this->inputJson->password), trim($this->inputJson->userType));

        //response
        if ($user) {
            //create session
            $authToken = $this->authModel->createSession($user);

            $this->success("Data found.",
                array("auth_token" => $authToken, "user_data" => $user));
        } else {
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }

    }

    // signUp Fuction.
    public function apiSignUp()
    {
        // Validating user input
        if (!isset($this->inputJson->name)):
            $this->error("Name field required.", PARAM_MISSING);
        elseif (!isset($this->inputJson->email)):
            $this->error("Email field required.", PARAM_MISSING);
        elseif (!isset($this->inputJson->password)):
            $this->error("Password field required", PARAM_MISSING);            
        elseif (!isset($this->inputJson->userType)):
            $this->error("User type field required", PARAM_MISSING);
        endif;

        // Inserting signup data
        $this->load->model('AuthModel', 'authModel');
        $response = $this->authModel->signUp(
            trim($this->inputJson->name),
            trim($this->inputJson->email),
            trim($this->inputJson->password),
            trim($this->inputJson->userType)
        );

        if($response === true){
            $this->success("User successfully registerd.");
        }
        elseif($response === ""){
            $this->error('Your account is already exist.');
        }
        else{
            $this->error("Acount could not be created.");
        }
    }

    public function apiForget()
    {
        // Validating user input
        if (!isset($this->inputJson->email)):
            $this->error("Email field required", PARAM_MISSING);
        endif;

        // Check user exist
        $this->load->model("AuthModel", 'authModel');
        $result = $this->authModel->forget(trim($this->inputJson->email));
    }

    public function apiReset()
    {
        // Validating user input
        if (!isset($this->inputJson->email)):
            $this->error("Email filed required", PARAM_MISSING);
        elseif (!isset($this->inputJson->newPassword)):
            $this->error("New password field required", PARAM_MISSING);
        endif;

        // Reset user password
        $this->load->model("AuthModel", "authModel");
        $response = $this->authModel->reset(trim($this->inputJson->email), trim($this->inputJson->newPassword));
        die($this->success("Password successfully updated."));
    }

    public function apiLogout(){
        
        if(!isset($this->inputJson->authToken) || empty($this->inputJson->authToken)){
            $this->error('Please provide your token.', PARAM_MISSING);
        }

        if($this->userId > 0){
            $this->load->model("AuthModel", "authModel");
            $response = $this->authModel->logout($this->inputJson->authToken);

            if($response == true){
                $this->success("Logout successfully.");
            }else{
                $this->error(ERR_UNAUTHORIZED_ACCESS);
            }
        }
    }
}