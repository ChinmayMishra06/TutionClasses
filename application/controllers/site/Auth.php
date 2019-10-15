<?php
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if(isset($_REQUEST['btnLogin'])){
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');

                if($this->form_validation->run() === TRUE){
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');

                    $this->load->model('AuthModel', 'authModel');
                    $user = $this->authModel->getUser($email, $password, 0);
                    if($user){
                        $this->session->set_userdata(array('login'=>$user->email, 'user_id'=>$user->user_id));
                        redirect('site/home');
                    }else{
                        $this->session->set_flashdata('message', 'Invalid credentials');
                        $this->session->set_flashdata('status', 'danger');
                        redirect('site/login');
                    }
                }
            }
            $data['title'] = "Login panel";
            $this->load->view('site/header', $data);
            $this->load->view('site/login');
            $this->load->view('site/footer');
        }

        public function pageSignUp(){
            if(isset($_REQUEST['signup_student'])){
                $this->form_validation->set_rules('username', 'Username', 'trim|required|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
                $this->form_validation->set_rules('confirmPassword', 'Confirm password', 'trim|required|matches[password]');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');

                if($this->form_validation->run('signup') === true){
                    $username = $this->input->post('username');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    
                    $this->load->model('AuthModel', 'authModel');
                    $resSignUp = $this->authModel->signUp($username, $email, $password, 0);
                    
                    if($resSignUp == ""){
                        $this->session->set_flashdata('message', 'Account already exist.');
                        $this->session->set_flashdata('status', 'danger');
                    }else{
                        $this->session->set_flashdata('message', 'Account created successfully.');
                        $this->session->set_flashdata('status', 'success');
                        $this->session->set_userdata('login', $email);
                        redirect('site/login');
                    }
                    redirect('site/signup');
                }
            }
            $data['title'] = "Signup panel";
            $this->load->view('site/header', $data);
            $this->load->view('site/signup');
            $this->load->view('site/footer');
        }

        public function actionLogout(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->session->unset_userdata('login');
            $this->session->set_flashdata('message', 'Logout successfully.');
            $this->session->set_flashdata('status', 'success');
            redirect('institute/login');
        }
    }
?>