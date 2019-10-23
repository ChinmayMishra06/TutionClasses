<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Courses extends CI_Controller{
        public function index($page = 1){
            $this->load->model('UserModel', 'userModel'); 
            $this->load->model('CommonModel', 'commonModel');
            $this->load->model('DataModel', 'dataModel');
            
            $config['base_url'] = base_url() . "courses/index";
            $config['per_page'] = 6;
            $config['total_rows'] = $this->userModel->countCourses(false, false, 1);
            $this->pagination->initialize($config);

            $data['courses'] = $this->userModel->getAllCourses(6, $page, array('status'=>1));
            $data['title'] = "All courses";
            $data['categories'] = $this->dataModel->getCategory(0, 0);            
            $data['durations'] = $this->dataModel->getCategory(0, 2);

            $this->load->view('site/header', $data);
            $this->load->view('site/courses');
            $this->load->view('site/footer');
        }
        
        public function courseDetails($id){
            $this->load->model('UserModel', 'userModel');
            $this->load->model('CommonModel', 'commonModel');

            if(isset($_REQUEST['btnFeedbackAdd'])){
                if(!$this->session->userdata('student_login'))
                    redirect('login');
                    
                if(!empty($this->input->post('rating'))){
                    $data['rating'] = $this->input->post('rating');
                }
                
                if(!empty($this->input->post('description'))){
                    $data['description'] = $this->input->post('description');
                }

                if(!empty($this->input->post('rating')) || !empty($this->input->post('message'))){
                    $data['user_id'] = $this->session->userdata('student_id');
                    $data['course_id'] = $id;
                    
                    $rspFeedbackAdd = $this->commonModel->addFeedback($data);
                    if($rspFeedbackAdd){
                        $this->session->set_flashdata('message', "Feedback send successfully.");
                        $this->session->set_flashdata('status', "success");
                    }else{
                        $this->session->set_flashdata('message', "Feedback not send.");
                        $this->session->set_flashdata('status', "danger");
                    }
                    redirect('courseDetails/'. $id);
                }
            }
            
            if(isset($_REQUEST['btnReportAdd'])){
                if(!$this->session->userdata('student_login'))
                    redirect('login');

                $this->form_validation->set_rules('report_title', 'title', 'trim|required|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('description', 'description', 'trim|required|regex_match[/^([-a-z. ])+$/i]|max_length[500]');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() == true){
                    $data['title'] = $this->input->post('report_title');
                    $data['description'] = $this->input->post('description');
                    $data['victim_id'] = $this->session->userdata('student_id');
                    $data['course_id'] = $id;
                    $rspReportAdd = $this->commonModel->addReport($data);
                    if($rspReportAdd){
                        $this->session->set_flashdata('message', "Report send successfully.");
                        $this->session->set_flashdata('status', "success");
                        redirect('courseDetails/'. $id);
                    }else{
                        $this->session->set_flashdata('message', "Report not send.");
                        $this->session->set_flashdata('status', "danger");
                    }
                }
            }
            
            $data['feedbacks'] = $this->commonModel->getCourseFeedbacks($id);
            $data['course'] = $this->userModel->getAllCourses(false, false, false, array(TABLE_COURSE.'.status'=> 1), false, $id);
            $data['userFeedbacks'] = $this->commonModel->getUserFeedbacks($this->session->userdata('student_id'), $id);
            $data['title'] = "Course Details";            
            $this->load->view('site/header', $data);
            $this->load->view('site/course_details');
            $this->load->view('site/footer');
        }

        public function enquiry(){
            if(!$this->session->userdata('student_login')){
                $source = 'enquiry';
                $course_id = $this->input->post('course_id');            
                $this->session->set_userdata(array('source'=>$source, 'course_id'=>$course_id));
                redirect('login');
            }

            if(($this->session->userdata('source')) && ($this->session->userdata('course_id'))){
                $data['course_id'] = $this->session->userdata('course_id');
                $this->session->unset_userdata('source');
                $this->session->unset_userdata('course_id');
            }else{
                $data['course_id'] = $this->input->post('course_id');
            }
            
            $data['user_id'] = $this->session->userdata('student_id');
            $this->load->model('CommonModel', 'commonModel');
            $rspAddEnquiry = $this->commonModel->addEnquiry($data);
            if($rspAddEnquiry){
                $this->load->view('site/enquiry', $data);
            }
        }

        public function report(){
            if(!$this->session->userdata('student_login')){
                $source = 'report';
                $course_id = $this->input->post('course_id');            
                $this->session->set_userdata(array('report_source'=>$source, 'report_course_id'=>$course_id));
                redirect('login');
            }

            if(($this->session->userdata('report_source')) && ($this->session->userdata('report_course_id'))){
                $data['course_id'] = $this->session->userdata('report_course_id');
                $this->session->unset_userdata('report_source');
                $this->session->unset_userdata('report_course_id');
            }else{
                $data['course_id'] = $this->input->post('course_id');
            }
            
            $data['user_id'] = $this->session->userdata('student_id');
            $this->load->model('CommonModel', 'commonModel');
            $rspAddReport = $this->commonModel->addReport($data);
            if($rspAddReport){
                $this->load->view('site/report', $data);
            }
        }
    }
?>