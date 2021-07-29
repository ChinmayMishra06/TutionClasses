<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseApi extends CI_Controller
{

    private static $APIKEY = "molajdfsklajfjowermolajdfsklajfjower";
    protected $inputJson = array();
    protected $userId = 0;

    public function __construct()
    {
        parent::__construct();

        header("content-type: application/json");
        
        if(($this->input->get_request_header("x-api-key", true) !== null) && ($this->input->get_request_header("x-api-key", true) !== self::$APIKEY)){
            $this->error(ERR_UNAUTHORIZED_ACCESS);
        }


        $inputData = file_get_contents("php://input");
        
        $this->inputJson = json_decode($inputData);
        print_r($this->inputJson); die();

        if (json_last_error() != JSON_ERROR_NONE) {
            $this->error(json_last_error_msg(), JSON_ERROR);
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
            $this->error("Key field required.", PARAM_MISSING);
        }

        if(!isset($this->inputJson->value)){
            $this->error("Value field required.", PARAM_MISSING);
        }

        // call the model.
        $this->load->model("DataModel", "dataModel");
        $result = $this->dataModel->setValue(trim($this->inputJson->key), trim($this->inputJson->value));
        echo $result;
    }

    public function apiGetCategory(){
        $parentCategory = 0;
        $categoryType = 0;
        if(isset($this->inputJson->parentCategory)){
            if($this->inputJson->parentCategory >= 0){
                $parentCategory = $this->inputJson->parentCategory;
            }else{
                $this->error(ERR_INVALID_DATA);
            }

            if($this->inputJson->categoryType >= 0){
                $categoryType = $this->inputJson->categoryType;
            }else{
                $this->error(ERR_INVALID_DATA);
            }

            if($this->inputJson->parentCategory >= 0){
                $parentCategory = $this->inputJson->parentCategory;
            }else{
                $this->error(ERR_INVALID_DATA);
            }
                        
            if($this->inputJson->categoryType >= 0){
                $categoryType = $this->inputJson->categoryType;
            }else{
                $this->error(ERR_INVALID_DATA);
            }            
        }
        $this->load->model("DataModel", "dataModel");
        $categories = $this->dataModel->getCategory($parentCategory, $categoryType);
        if($categories){
            $this->success("Categories as follows", array("list" => $categories));
        }else{
            $this->error("No data found.");
        }
    }    
}
