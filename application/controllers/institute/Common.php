<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Common extends CI_Controller{
        public function feedback(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;
            
            $resAllFeedbacks = $this->commonModel->getAllFeedbacks($this->session->userdata('user_id'));
            $data['feedbacks'] = $resAllFeedbacks;
            $data['siteTitle'] = "All feedbacks";
            $data['sectionTitle'] = "All feedbacks";
            
            $this->load->view('institute/header', $data);
            $this->load->view('institute/feedback');
            $this->load->view('institute/footer');
        }

        public function report(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;
            
            $resAllReports = $this->commonModel->getAllReports($this->session->userdata('user_id'));
            $data['reports'] = $resAllReports;
            $data['siteTitle'] = "All reports";
            $data['sectionTitle'] = "All reports";
            
            $this->load->view('institute/header', $data);
            $this->load->view('institute/report');
            $this->load->view('institute/footer');
        }

        public function dummy(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            $this->load->view('institute/googleMap');
        }
    }
?>