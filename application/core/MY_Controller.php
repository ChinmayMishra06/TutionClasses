<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function isLoggedIn()
    {
        return $this->session->has_userdata('login');
    }

    public function renderView($view, $data = null)
    {
        $this->load->view($view, $data);
    }

    public function getUserData()
    {
        $data = $this->session->userdata('login');

        return $data;
    }

    public function getProductCats()
    {
        $this->load->model("DataModel", "data");
        return $this->data->getProductCats();
    }

    public function canUserContinue()
    {

        if ($this->isLoggedIn())
            return true;

        redirect(base_url('user/login'));
        return false;

    }

    public function canSellerContinue()
    {
        if (!$this->isLoggedIn()) {
            redirect(base_url('user/login?from=seller'));
            return false;
        }

        if ($this->getUserData()->is_seller == 0) {
            redirect(base_url('user/seller/signup'));
            return false;
        }

        return true;
    }

    public function isValidSellerUser()
    {
        if (!$this->isLoggedIn()) {
            return false;
        }

        if ($this->getUserData()->is_seller == 0) {
            return false;
        }

        return true;
    }


    public function publishApi($status, $err_code = "", $msg = "", $data = NULL)
    {
        header("Content-Type: application/json");
        die(json_encode(
            array("status" => $status,
                "err_code" => $err_code,
                "msg" => $msg,
                "data" => $data))
        );
    }

}//class