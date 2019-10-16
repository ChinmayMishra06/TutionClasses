<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Courses extends CI_Controller{
        public function index($page = 1){
            $data['title'] = "All Courses";
            $this->load->model('UserModel', 'userModel'); 
            $this->load->model('CommonModel', 'commonModel');
            
            $config['base_url'] = base_url() . "courses/index";
            $config['per_page'] = 6;
            $config['total_rows'] = $this->userModel->countCourses();
    
            $this->pagination->initialize($config);

            $rspAllCourses = $this->userModel->getAllCoursesByConditions(6, $page);
            if($rspAllCourses){
                $data['courses'] = $rspAllCourses;
            }

            $resHappyFeedbacks = $this->commonModel->getHappyFeedback(3);
            if($resHappyFeedbacks)
                $data['happyFeedbacks'] = $resHappyFeedbacks;

            $this->load->view('site/header', $data);
            $this->load->view('site/courses');
            $this->load->view('site/footer');
        }

        public function courseDetails($id){
            $this->load->model('UserModel', 'userModel');
            $this->load->model('CommonModel', 'commonModel');

            if(isset($_REQUEST['btnFeedbackAdd'])){
                if(!empty($this->input->post('rating'))){
                    $data['rating'] = $this->input->post('rating');
                }
                
                if(!empty($this->input->post('description'))){
                    $data['description'] = $this->input->post('description');
                }

                $data['user_id'] = $this->input->post('user_id');
                $data['course_id'] = $this->input->post('course_id');

                if(($this->input->post('rating')!==null) || ($this->input->post('message')!==null)){
                    $rspFeedbackAdd = $this->commonModel->feedbackAdd($data);
                    if($rspFeedbackAdd){
                        $this->session->set_flashdata('message', "Feedback send successfully.");
                        $this->session->set_flashdata('status', "success");
                    }else{
                        $this->session->set_flashdata('message', "Feedback not send.");
                        $this->session->set_flashdata('status', "danger");
                    }
                    redirect('courseDetails/'. $data['course_id']);
                }
            }
            
            $rspAllFeedback = $this->commonModel->getAllFeedbacks();
            if($rspAllFeedback)
                $data['feedbacks'] = $rspAllFeedback;
            
            $rspCourseById = $this->userModel->getAllCourses(0, $id);
            if($rspCourseById)
                $data['course'] = $rspCourseById;
            
                
            $data['title'] = "Course Details";
            
            $this->load->view('site/header', $data);
            $this->load->view('site/course_details');
            $this->load->view('site/footer');
        }
    }
?>