<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Home extends CI_Controller{
        public function index($page = 1){
            $this->load->model('UserModel', 'userModel'); 
            $this->load->model('CommonModel', 'commonModel');
            $this->load->model('DataModel', 'dataModel');
            
            $config['base_url'] = base_url() . "home/index";
            $config['per_page'] = 6;
            $config['total_rows'] = $this->userModel->countCourses();
            $this->pagination->initialize($config);

            
            if(isset($_REQUEST['btnApply'])){
                if(!empty($_REQUEST['category']))
                    $data[TABLE_COURSE.'.category_id'] = $this->input->post('category');
                    // echo $this->input->post('category');die();

                if(!empty($_REQUEST['duration']))
                    $data[TABLE_COURSE.'.duration_unit'] = $this->input->post('duration');

                if(!empty($_REQUEST['price']))
                    $data[TABLE_COURSE.'.fees<='] = $this->input->post('price');

                if((!empty($_REQUEST['category'])) || (!empty($_REQUEST['duration'])) || (!empty($_REQUEST['price']))){                    
                    $config['total_rows'] = $this->userModel->countCourses(false, false, $data);
                    $this->pagination->initialize($config);
                    $rspAllCourses = $this->userModel->getAllCourses(6, $page, $data);
                    if($rspAllCourses){
                        $data['courses'] = $rspAllCourses;
                    }else{
                        $rspAllCourses = $this->userModel->getAllCourses(6, $page);
                        if($rspAllCourses){
                            $data['courses'] = $rspAllCourses;
                        }
                    }
                }else{
                    $rspAllCourses = $this->userModel->getAllCourses(6, $page);
                    if($rspAllCourses){
                        $data['courses'] = $rspAllCourses;
                    }
                }
            }elseif(isset($_REQUEST['btnSearch'])){
                $this->form_validation->set_rules('searchItem', 'Search item', 'trim|required|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() === true){
                    $searchItem = $this->input->post('searchItem');
                    $config['total_rows'] = $this->userModel->countCourses(false, false, array('course_name' => $searchItem));
                    $this->pagination->initialize($config);
                    $rspCourses = $this->userModel->getAllCourses(6, $page, array('course_name' => $searchItem));
                    if($rspCourses){                        
                        $data['courses'] = $rspCourses;
                    }
                    else{             
                        $config['total_rows'] = $this->userModel->countCourses();
                        $this->pagination->initialize($config);
                        $data['courses'] = $this->userModel->getAllCourses(6, $page);
                    }
                }else{
                    $data['courses'] = $this->userModel->getAllCourses(6, $page);
                }
            }else{
                $data['courses'] = $this->userModel->getAllCourses(6, $page);
            }
            
            $data['title'] = "Home";
               
            $data['categories'] = $this->dataModel->getCategory(0, 0);            
            $data['durations'] = $this->dataModel->getCategory(0, 2);            
            $data['allTeachers'] = $this->userModel->countTeachersStudents(1);
            $data['allStudents'] = $this->userModel->countTeachersStudents(0);
            $data['allSubscribers'] = $this->userModel->countSubscribers();
            $data['happyFeedbacks'] = $this->commonModel->getAllFeedbacks(false, false, 3);
            $data['subscribed'] = $this->commonModel->getSubscriber($this->session->userdata('student_id'), 0);                
            $data['allCourses'] = $this->userModel->countCourses();
        
            $this->load->view('site/header', $data);
            $this->load->view('site/home');
            $this->load->view('site/footer');
        }
        
        public function subscribe(){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
            if($this->form_validation->run() == true){
                $this->load->model('CommonModel', 'commonModel');
                $rspSubscriber = $this->commonModel->getSubscriber($this->input->post('email'), 0);
                if($rspSubscriber){
                    die(json_encode(array('footer_message'=>"You have already subscribed.", 'footer_status'=>"danger")));
                }else{
                    $rspSubscribe = $this->commonModel->subscribe($this->input->post('email'));
                    if($rspSubscribe){                        
                        die(json_encode(array('footer_message'=>"You are subscribed successfully.", 'footer_status'=>"success")));
                    }else{
                        die(json_encode(array('footer_message'=>"You are not subscribed.", 'footer_status'=>"danger")));
                    }
                }
            }else{
                die(json_encode(array('validation_errors'=>validation_errors())));
            }
        }

        public function contact(){
            if(isset($_REQUEST['btnSendMessage'])){
                $this->form_validation->set_rules('name', 'Name', 'trim|required|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
                $this->form_validation->set_rules('message', 'Message', 'trim|required');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() == true){
                    // This is email configuration settings.
                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                    $config['smtp_port'] = '465';
                    $config['smtp_user'] = $_SERVER['ENCUSER'];
                    $config['smtp_pass'] = $_SERVER['ENCPASS'];
                    $config['mailtype'] = 'html';
                    // $config['starttls'] = TRUE;
                    // $config['newline'] = '\r\n';
                    // $config['validate'] = TRUE;
                    // $config['mailpath'] = 'sendmail';
                    $config['charset'] = 'iso-8859-1';
                    // $config['wordwrap'] = TRUE;

                    $this->email->initialize($config);
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');

                    $this->email->from($email, $name);
                    $this->email->to('adoisstudio.com@gmail.com');
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $result = $this->email->send();

                    if($result){
                        $this->session->set_flashdata('message', "Message send successfully.");
                        $this->session->set_flashdata('status', "success");
                    }else{
                        $this->session->set_flashdata('message', "Message not send.");
                        $this->session->set_flashdata('status', "danger");
                    }
                    redirect('contact');
                }
            } 
            
            $data['title'] = "Contact";
            $this->load->view('site/header', $data);
            $this->load->view('site/contact');
            $this->load->view('site/footer');
        }
    }
?>