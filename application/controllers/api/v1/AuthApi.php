<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'BaseApi.php';

class AuthApi extends BaseApi
{

    //send login response using email and password
    public function login()
    {

        //validate input values
        if(!isset($this->inputJson->email)){
            $this->error("Email field required", ErrorCode::PARAM_MISSING);
        }

        //check for user


        //response


        $this->load->model("DataModel", "dataModel");

        $this->success('', array(
            "min_ver" => $this->dataModel->getValue("min_ver"),
            "cur_ver" => $this->dataModel->getValue("cur_ver")));
    }
}