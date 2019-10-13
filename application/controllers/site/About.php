<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class About extends CI_Controller{
        public function index(){
            $data['title'] = "About";
            $data['className'] = "single_page_menu";
            $this->load->view('site/header', $data);
            $this->load->view('site/about');
            $this->load->view('site/footer');
        }
    }
?>