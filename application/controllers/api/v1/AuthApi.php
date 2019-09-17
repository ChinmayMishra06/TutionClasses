<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'BaseApi.php';

class AuthApi extends BaseApi
{

    //send login response using email and password
    public function apiLogin()
    {

        //validate input values
        if (!isset($this->inputJson->email)) {
            $this->error("Email field required.", ErrorCode::PARAM_MISSING);
        }

        if (!isset($this->inputJson->password)) {
            $this->error("Password field required.", ErrorCode::PARAM_MISSING);
        }

        //check for user        
        $this->load->model("AuthModel", "authModel");
        $user = $this->authModel->getUser(trim($this->inputJson->email), trim($this->inputJson->password));

        //response
        if ($user) {

            //create session
            $this->load->model("AuthModel", "authModel");
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
            $this->error("Name field required.", ErrorCode::PARAM_MISSING);
        elseif (!isset($this->inputJson->email)):
            $this->error("Email field required.", ErrorCode::PARAM_MISSING);
        elseif (!isset($this->inputJson->password)):
            $this->error("Password field required", ErrorCode::PARAM_MISSING);
        endif;

        // Inserting signup data
        $this->load->model('AuthModel', 'authModel');
        $response = $this->authModel->signUp(
            trim($this->inputJson->name),
            trim($this->inputJson->email),
            trim($this->inputJson->password)
        );

        die($this->success("User successfully registerd."));
    }

    public function apiForget()
    {
        // Validating user input
        if (!isset($this->inputJson->email)):
            $this->error("Email field required", ErrorCode::PARAM_MISSING);
        endif;

        // Check user exist
        $this->load->model("AuthModel", 'authModel');
        $result = $this->authModel->forget(trim($this->inputJson->email));
    }

    public function apiReset()
    {
        // Validating user input
        if (!isset($this->inputJson->email)):
            $this->error("Email filed required", ErrorCode::PARAM_MISSING);
        elseif (!isset($this->inputJson->newPassword)):
            $this->error("New password field required", ErrorCode::PARAM_MISSING);
        endif;

        // Reset user password
        $this->load->model("AuthModel", "authModel");
        $response = $this->authModel->reset(trim($this->inputJson->email), trim($this->inputJson->newPassword));
        die($this->success("Password successfully updated."));
    }

    public function apiLogout(){
        if($this->userId > 0){
            $this->load->model("AuthModel", "authModel");
            $response = $this->authModel->logout($this->userId);

            if($response == true){
                $this->success("Logout successfully.");
            }else{
                $this->error(ERR_UNAUTHORIZED_ACCESS);
            }
        }
    }
}