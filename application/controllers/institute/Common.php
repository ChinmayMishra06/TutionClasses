<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Common extends CI_Controller{
        public function feedback(){
            // if(!$this->session->userdata('login'))
            //     redirect('site/login');
            
            $this->load->model('CommonModel', 'commonModel');
            $data['profileData'] = $this->commonModel->getProfileData($this->session->userdata('user_id'));            
            $data['feedbacks']  = $this->commonModel->getAllFeedbacks($this->session->userdata('user_id'));            
            $data['siteTitle'] = "All Feedbacks";
            $data['sectionTitle'] = "All Feedbacks";            
            $this->load->view('institute/header', $data);
            $this->load->view('institute/feedback');
            $this->load->view('institute/footer');
        }

        public function report(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');
            $data['profileData'] = $this->commonModel->getProfileData($this->session->userdata('user_id'));            
            $data['reports'] = $this->commonModel->getAllReports($this->session->userdata('user_id'));

            $data['siteTitle'] = "All Reports";
            $data['sectionTitle'] = "All Reports";            
            $this->load->view('institute/header', $data);
            $this->load->view('institute/report');
            $this->load->view('institute/footer');
        }
    }
?>