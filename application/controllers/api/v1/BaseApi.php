<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseApi extends MY_Controller
{

    protected $inputJson = array();

    public function __construct()
    {
        parent::__construct();

        header("content-type: application/json");

        $inputData = file_get_contents("php://input");

        $this->inputJson = json_decode($inputData);

        if (json_last_error() != JSON_ERROR_NONE) {
            $this->error(json_last_error_msg(), ErrorCode::JSON_ERROR);
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

    public function init()
    {
        $this->load->model("DataModel", "dataModel");

        $this->success('', array(
            "min_ver" => $this->dataModel->getValue("min_ver"),
            "cur_ver" => $this->dataModel->getValue("cur_ver")));
    }
}

class ErrorCode
{
    const JSON_ERROR = "JSON_ERROR";
    const PARAM_MISSING = "PARAM_MISSING";
    const INVALID_API = "INVALID_API";
    const INVALID_TOKEN = "INVALID_TOKEN";
    const INVALID_VALUE = "INVALID_VALUE";
    const DATABASE_ERROR = "DATABASE_ERROR";

}//class
