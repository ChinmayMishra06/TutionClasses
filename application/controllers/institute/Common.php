<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Common extends CI_Controller{
        public function feedback(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->view('institute/header');
            $this->load->view('institute/feedback');
            $this->load->view('institute/footer');
        }

        public function report(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->view('institute/header');
            $this->load->view('institute/report');
            $this->load->view('institute/footer');
        }
    }
?>