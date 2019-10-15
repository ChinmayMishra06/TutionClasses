<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Courses extends CI_Controller{
        public function index($page = 1){
            $data['title'] = "All Courses";
            $this->load->model('UserModel', 'userModel'); 
            
            $config['base_url'] = base_url() . "courses/index";
            $config['per_page'] = 6;
            $config['total_rows'] = $this->userModel->countAllCourse();
    
            $this->pagination->initialize($config);

            $rspAllCourses = $this->userModel->getAllCoursesByConditions(6, $page);
            if($rspAllCourses){
                $data['courses'] = $rspAllCourses;
            }
            $this->load->view('site/header', $data);
            $this->load->view('site/courses');
            $this->load->view('site/footer');
        }

        public function courseDetails($id){
            $this->load->model('UserModel', 'userModel');
            $rspCourseById = $this->userModel->getAllCourses(0, $id);

            $data['course'] = $rspCourseById;
            $data['title'] = "Course Details";
            
            $this->load->view('site/header', $data);
            $this->load->view('site/course_details');
            $this->load->view('site/footer');
        }
    }
?>