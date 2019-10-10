<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Category extends CI_Controller{
        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
                
            $this->load->model('CommonModel', 'commonModel');
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;

            $this->load->model('DataModel', 'dataModel');
            $rspCategory = $this->dataModel->getCategory(0, 0);
            $data['categories'] = $rspCategory;
            
            $this->load->view('institute/header', $data);            
            $this->load->view('institute/categoryAdd');
            $this->load->view('institute/footer');
        }
    }
?>