<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseApi extends MY_Controller
{

    protected $inputJson = array();
    protected $userId = 0;

    public function __construct()
    {
        parent::__construct();

        header("content-type: application/json");

        $inputData = file_get_contents("php://input");

        $this->inputJson = json_decode($inputData);

        if (json_last_error() != JSON_ERROR_NONE) {
            $this->error(json_last_error_msg(), ErrorCode::JSON_ERROR);
        }

        if(isset($this->inputJson->authToken)){
            if(!empty($this->inputJson->authToken)){
                $this->checkUser($this->inputJson->authToken);
            }
        }
    }

    public function checkUser($authToken){
        $userProfileData = $this->encryption->decrypt($authToken);
        if($userProfileData){
            $this->load->model('AuthModel', 'authModel');
            $this->userId = $this->authModel->validateUser(json_decode($userProfileData, true));
            if($this->userId == 0){
                return $this->error(ERR_UNAUTHORIZED_ACCESS);
            }
        }else{
            return $this->error(ERR_UNAUTHORIZED_ACCESS);
        }
    }

    public function success($msg = "", $data = null)
    {
        $json = array("status" => true,
            "msg" => $msg,
            "data" => $data);

        die(json_encode($json));
    }

    public function error($msg = "", $err_code = "", $data = null)
    {
        $json = array("status" => false,
            "msg" => $msg,
            "err_code" => $err_code,
            "data" => $data);

        die(json_encode($json));
    }

    // Initialization data in key.
    public function apiInit()
    {
        $this->load->model("DataModel", "dataModel");

        $this->success('', array(
            "min_ver" => $this->dataModel->getValue("min_ver"),
            "cur_ver" => $this->dataModel->getValue("cur_ver")));
    }

    public function apiSetValue(){
        //validate input values
        if(!isset($this->inputJson->key)){
            $this->error("Key field required.", ErrorCode::PARAM_MISSING);
        }

        if(!isset($this->inputJson->value)){
            $this->error("Value field required.", ErrorCode::PARAM_MISSING);
        }

        // call the model.
        $this->load->model("DataModel", "dataModel");
        $result = $this->dataModel->setValue(trim($this->inputJson->key), trim($this->inputJson->value));
        echo $result;
    }

    public function apiGetCategory(){
        if(isset($this->inputJson->parentCategory)){
            if($this->inputJson->parentCategory >= 0){
                $parentCategory = $this->inputJson->parentCategory;
            }else{
                $this->error(ERR_INVALID_DATA);
            }            
        }

        $this->load->model("AuthModel", "authModel");
        $categories = $this->authModel->getCategory(isset($this->inputJson->parentCategory));
        if($categories){
            $this->success("Categories as follows", $categories);
        }else{
            $this->error("No data found.");
        }
    }    
}

class ErrorCode
{
    const JSON_ERROR = "JSON_ERROR";
    const PARAM_MISSING = "PARAM_MISSING";
    const INVALID_API = "INVALID_API";
    const INVALID_TOKEN = "INVALID_TOKEN";
    const INVALID_VALUE = "INVALID_VALUE";
    const INVALID_AUTH = "INVALID_AUTH";
    const DATABASE_ERROR = "DATABASE_ERROR";

}//class
