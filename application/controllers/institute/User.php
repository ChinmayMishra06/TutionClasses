<?php
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $this->load->view('institute/header', array('title'=>'Profile'));
            $this->load->view('institute/profile');
            // $this->load->view('institute/latlng');
            $this->load->view('institute/footer');
        }

        public function actionProfileSave(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $this->load->view('institute/header', array('title'=>'Profile'));
            $this->load->view('institute/profile');
            
            $this->load->view('institute/footer');
        }
    }
?>