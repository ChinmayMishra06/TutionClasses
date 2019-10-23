<?php
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $this->load->model('CommonModel', 'commonModel');            
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;

            $data['siteTitle'] = "Dashboard";
            $data['sectionTitle'] = "Activity";
            
            $this->load->view('institute/header', $data);            
            $this->load->view('institute/dashboard');
            $this->load->view('institute/footer');
        }

        public function pageLogin(){
            if($this->session->userdata('login'))
                redirect('institute');

            if(isset($_REQUEST['login_button'])){
                if($this->form_validation->run('login') === TRUE){
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');

                    $this->load->model('AuthModel', 'authModel');
                    $user = $this->authModel->getUser($email, $password, 1);
                    if($user){
                        $login = array('login'=>$user->email, 'user_id'=>$user->user_id);
                        $this->session->set_userdata($login);
                        redirect('institute');
                    }else{
                        $this->session->set_flashdata('message', 'Invalid credentials');
                        $this->session->set_flashdata('status', 'danger');
                        redirect('institute/login');
                    }
                }else{
                    $this->load->view('institute/login', array('title'=>'Institute Login'));
                }
            }else{
                $this->load->view('institute/login', array('title'=>'Institute Login'));
            }
        }

        public function pageSignUp(){
            if($this->session->userdata('login'))
                redirect('institute');
                
            if(isset($_REQUEST['signup_teacher'])){
                if($this->form_validation->run('signup') === true){
                    $username = $this->input->post('username');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');

                    $this->load->model('AuthModel', 'authModel');
                    $resSignUp = $this->authModel->signUp($username, $email, $password, 1);

                    if($resSignUp == ""){
                        $this->session->set_flashdata('message', 'Account already exist.');
                        $this->session->set_flashdata('status', 'danger');
                    }else{
                        $this->session->set_flashdata('message', 'Account created successfully.');
                        $this->session->set_flashdata('status', 'success');
                        $this->session->set_userdata('login', $email);
                        redirect('institute');
                    }
                    redirect('institute/signUp');
                }else{
                    $this->load->view('institute/signUp', array('title'=>'Sign up'));
                }
            }else{
                $this->load->view('institute/signUp', array('title'=>'Sign up'));
            }
        }

        public function actionLogout(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->session->unset_userdata(array('login', 'user_id'));
            $this->session->set_flashdata('message', 'Logout successfully.');
            $this->session->set_flashdata('status', 'success');
            redirect('institute/login');
        }
    }
?>