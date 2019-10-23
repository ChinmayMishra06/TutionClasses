<?php
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Profiles extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $this->load->model('CommonModel', 'commonModel');            
            if(isset($_REQUEST['inputProfileImage'])){
                if(!empty($_FILES['inputProfileImage']['name'])){
                    // $config['upload_path'] = './public/uploads/institute/images/';
                    $config['upload_path'] = 'public/uploads/institute/images';
                    $config['allowed_types']= '*';
                    $config['max_size'] = '1000';
                    $config['overwrite'] = TRUE;
                    $config['remove_spaces'] = TRUE;

                    $this->upload->initialize($config);
                    $this->upload->do_upload('inputProfileImage');
                    $data['image'] = $this->upload->data()['file_name'];
                }

                $this->form_validation->set_rules('inputName', 'Name', 'trim|regex_match[/^([-a-z0-9_ ])+$/i]');
                $this->form_validation->set_rules('inputEmail', 'Email', 'trim|valid_email');
                $this->form_validation->set_rules('inputContact', 'Contact', 'trim|min_length[10]|max_length[11]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputCity', 'City', 'trim|regex_match[/^([-a-z0-9_ ])+$/i]');
                $this->form_validation->set_rules('inputDOB', 'DOB', 'trim');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() === true){
                    $data['name'] = $this->input->post('inputName');
                    $data['email'] = $this->input->post('inputEmail');
                    $data['contact'] = $this->input->post('inputContact');
                    $data['dob'] = $this->input->post('inputDOB');
                    $data['address'] = $this->input->post('inputCity');

                    $rspEdit = $this->commonModel->editProfileData($this->session->userdata('user_id'), $data);
                    if($rspEdit){
                        $this->session->set_flashdata('message', 'Profile details updated successfully.');
                        $this->session->set_flashdata('status', 'success');
                    }else{                        
                        $this->session->set_flashdata('message', 'Profile details not updated.');
                        $this->session->set_flashdata('status', 'danger');
                    }
                    redirect('institute/profiles');
                }
            }
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;
            $data['siteTitle'] = "Edit Profile";
            $data['sectionTitle'] = "Edit Profile";

            $this->load->view('institute/header', $data);
            $this->load->view('institute/profile');
            $this->load->view('institute/footer');
        }
    }
?>