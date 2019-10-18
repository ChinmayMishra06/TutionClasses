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
                if(!$this->session->userdata('studentLogin'))
                    redirect('login');
                    
                if(!empty($this->input->post('rating'))){
                    $data['rating'] = $this->input->post('rating');
                }
                
                if(!empty($this->input->post('description'))){
                    $data['description'] = $this->input->post('description');
                }

                if(!empty($this->input->post('rating')) || !empty($this->input->post('message'))){
                    $data['user_id'] = $this->session->userdata('studentId');
                    $data['course_id'] = $id;
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
            
            $rspAllFeedback = $this->commonModel->getAllFeedbacks($id);
            if($rspAllFeedback)
                $data['feedbacks'] = $rspAllFeedback;
            
            $rspCourseById = $this->userModel->getAllCourses(0, $id);
            if($rspCourseById)
                $data['course'] = $rspCourseById;
            
            $resUserFeedbacks = $this->commonModel->getAllFeedbacks($id, $this->session->userdata('studentId'));
            if($resUserFeedbacks)
                $data['userFeedbacks'] = $resUserFeedbacks;
            
            $data['title'] = "Course Details";
            
            $this->load->view('site/header', $data);
            $this->load->view('site/course_details');
            $this->load->view('site/footer');
        }

        public function enquiry(){
            if(!$this->session->userdata('studentLogin'))
                redirect('login');

            $data['course_id'] = $this->input->post('course_id');
            $data['user_id'] = $this->session->userdata('studentId');
            $this->load->model('CommonModel', 'commonModel');
            $rspAddEnquiry = $this->commonModel->addEnquiry($data);

            if($rspAddEnquiry){
                $this->load->view('site/enquiry');
            }
        }
    }
?>