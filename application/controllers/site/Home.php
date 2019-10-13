<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Home extends CI_Controller{
        public function index($page = 1){
            $data['title'] = "Home";
            $data['className'] = "home_menu";

            $this->load->model('UserModel', 'userModel'); 
            
            $config['base_url'] = base_url() . "site/home/index";
            $config['per_page'] = 3;
            $config['total_rows'] = $this->userModel->countAllCourse();
    
            $this->pagination->initialize($config);

            $rspAllCourses = $this->userModel->getAllCoursesByConditions(3, $page);
            if($rspAllCourses){
                $data['courses'] = $rspAllCourses;
            }
            $this->load->view('site/header', $data);
            $this->load->view('site/home');
            $this->load->view('site/footer');
        }

        public function contact(){
            $data['title'] = "Contact";
            $data['className'] = "single_page_menu";
            $this->load->view('site/header', $data);
            $this->load->view('site/contact');
            $this->load->view('site/footer');
        }
    }
?>