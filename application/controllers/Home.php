<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Home extends CI_Controller{
        public function index($page = 1){
            if(isset($_REQUEST['btnSubscribe'])){
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() == true){
                    $this->load->model('CommonModel', 'commonModel');
                    $rspGetUer = $this->commonModel->getUserByEmail($this->input->post('email'));
                    if($rspGetUer){
                        $rspSubscriber = $this->commonModel->getSubscriber($rspGetUer, 0);
                        if($rspSubscriber){                        
                            $this->session->set_flashdata('message', "You have already subscribed.");
                            $this->session->set_flashdata('status', "danger");
                        }else{
                            $rspSubscribe = $this->commonModel->subscribe($rspGetUer);
                            if($rspSubscribe){                        
                                $this->session->set_flashdata('message', "You are subscribed successfully.");
                                $this->session->set_flashdata('status', "success");
                            }else{                        
                                $this->session->set_flashdata('message', "You are not subscribed.");
                                $this->session->set_flashdata('status', "danger");
                            }
                        }
                    }else{                        
                        $this->session->set_flashdata('message', "You are not registered student.");
                        $this->session->set_flashdata('status', "danger");
                    }
                    redirect('home');
                }
            }

            if(isset($_REQUEST['btnUnsubscribe'])){
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() == true){
                    $this->load->model('CommonModel', 'commonModel');
                    $rspGetUer = $this->commonModel->getUserByEmail($this->input->post('email'));
                    if($rspGetUer){
                        $rspSubscriber = $this->commonModel->getSubscriber($rspGetUer, 0);
                        if($rspSubscriber){
                            $rspUnsubscribe = $this->commonModel->unsubscribe($rspGetUer);
                            if($rspUnsubscribe){                        
                                $this->session->set_flashdata('message', "You are unsubscribed successfully.");
                                $this->session->set_flashdata('status', "success");
                            }
                        }
                    }else{                        
                        $this->session->set_flashdata('message', "You are not registered student.");
                        $this->session->set_flashdata('status', "danger");
                    }
                    redirect('home');
                }
            }
            
            $data['title'] = "Home";

            $this->load->model('UserModel', 'userModel'); 
            $this->load->model('CommonModel', 'commonModel');
                        
            $config['base_url'] = base_url() . "home/index";
            $config['per_page'] = 6;
            $config['total_rows'] = $this->userModel->countCourses();
    
            $this->pagination->initialize($config);

            $rspAllCourses = $this->userModel->getAllCoursesByConditions(6, $page);
            if($rspAllCourses)
                $data['courses'] = $rspAllCourses;
            
            $rspCountTeachers = $this->userModel->countTeachersStudents(1);
            if($rspCountTeachers)
                $data['allTeachers'] = $rspCountTeachers;
            
            $rspCountStudents = $this->userModel->countTeachersStudents(0);
            if($rspCountStudents)
                $data['allStudents'] = $rspCountStudents;
            
            $rspCountSubscribers = $this->userModel->countSubscribers();
            if($rspCountSubscribers)
                $data['allSubscribers'] = $rspCountSubscribers;
            
            $resHappyFeedbacks = $this->commonModel->getHappyFeedback(3);            
            if($resHappyFeedbacks)
                $data['happyFeedbacks'] = $resHappyFeedbacks;
                
            $rspSubscriber = $this->commonModel->getSubscriber($this->session->userdata('studentId'), 0);
            if($rspSubscriber)
                $data['subscribed'] = $rspSubscriber;
                
            $data['allCourses'] = $config['total_rows'];
        
            $this->load->view('site/header', $data);
            $this->load->view('site/home');
            $this->load->view('site/footer');
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