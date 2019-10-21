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
            
            $data['courses'] = $this->userModel->getAllCourses(6, $page);
            $data['title'] = "Home";               
            $data['categories'] = $this->dataModel->getCategory(0, 0);            
            $data['durations'] = $this->dataModel->getCategory(0, 2);            
            $data['allTeachers'] = $this->userModel->countTeachersStudents(1);
            $data['allStudents'] = $this->userModel->countTeachersStudents(0);
            $data['allSubscribers'] = $this->userModel->countSubscribers();
            $data['happyFeedbacks'] = $this->commonModel->getHappyFeedbacks(3);
            $data['subscribed'] = $this->commonModel->getSubscriber($this->session->userdata('student_id'), 0);                
            $data['allCourses'] = $this->userModel->countCourses();

            $this->load->view('site/header', $data);
            $this->load->view('site/home');
            $this->load->view('site/footer');
        }
        
        public function filter($page = 1){
            $this->load->model('UserModel', 'userModel'); 
            $this->load->model('CommonModel', 'commonModel');
            $this->load->model('DataModel', 'dataModel');
            
            $config['base_url'] = base_url() . "home/filter";
            $config['per_page'] = 6;

            if(isset($_REQUEST['btnApply'])){
                if(!empty($_REQUEST['category']))
                    $data[TABLE_COURSE.'.category_id'] = $this->input->get('category');

                if(!empty($_REQUEST['duration']))
                    $data[TABLE_COURSE.'.duration_unit'] = $this->input->get('duration');

                if(!empty($_REQUEST['price']))
                    $data[TABLE_COURSE.'.fees<='] = $this->input->get('price');

                if((!empty($_REQUEST['category'])) || (!empty($_REQUEST['duration'])) || (!empty($_REQUEST['price']))){
                    if (count($_GET) > 0) { $config['suffix'] = '?' . http_build_query($_GET, '', "&"); }
                    $config['total_rows'] = $this->userModel->countCourses(false, false, $data);
                    $this->pagination->initialize($config);
                    $data['courses'] = $this->userModel->getAllCourses(6, $page, $data);
                }
            }elseif(isset($_REQUEST['btnSearch'])){
                if (count($_GET) > 0) { $config['suffix'] = '?' . http_build_query($_GET, '', "&"); }
                $data['course_name'] = $this->input->get('searchItem');
                $config['total_rows'] = $this->userModel->countCourses(false, false, $data);
                $this->pagination->initialize($config);
                $data['courses'] = $this->userModel->getAllCourses(6, $page, $data);
            }else{
                $config['total_rows'] = $this->userModel->countCourses();
                $this->pagination->initialize($config);
                $data['courses'] = $this->userModel->getAllCourses(6, $page);
            }

            $data['categories'] = $this->dataModel->getCategory(0, 0);            
            $data['durations'] = $this->dataModel->getCategory(0, 2);                        
            $data['title'] = "Course Search Result";
            $this->load->view('site/header', $data);
            $this->load->view('site/search_course');
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