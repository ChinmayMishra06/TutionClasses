<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Courses extends CI_Controller{
        public function index(){
            $data['title'] = "All Courses";
            $data['className'] = "single_page_menu";
            $this->load->view('site/header', $data);
            $this->load->view('site/courses');
            $this->load->view('site/footer');
        }

        public function courseDetails($id){
            $this->load->model('UserModel', 'userModel');
            $rspCourseById = $this->userModel->getAllCourses(0, $id);

            $data['course'] = $rspCourseById;
            // echo "<pre>";
            // print_r($rspCourseById);
            // die();

            $data['title'] = "Course Details";
            $data['className'] = "single_page_menu";
            $this->load->view('site/header', $data);
            $this->load->view('site/course_details');
            $this->load->view('site/footer');
        }
    }
?>