<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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

    public function canUserContinue()
    {

        if ($this->isLoggedIn())
            return true;

        redirect(base_url('user/login'));
        return false;

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
}//class