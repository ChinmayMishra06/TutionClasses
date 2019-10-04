<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Course extends CI_Controller{
        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');            
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $this->load->view('institute/header', array('profileData'=>$rspProfileData));            
            $this->load->view('institute/courses');
            $this->load->view('institute/footer');
        }

        public function add(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');            
            if(isset($_REQUEST['btnCourseAdd'])){
                $config['upload_path'] = 'public/uploads/institute/images';
                $config['allowed_types']= '*';
                $config['max_size'] = '1000';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $this->upload->initialize($config);

                $this->upload->do_upload('inputLogoImage');
                $data['logo_image'] = $this->upload->data()['file_name'];
                $this->upload->do_upload('inputBannerImage');
                $data['banner_image'] = $this->upload->data()['file_name'];

                $this->form_validation->set_rules('inputCategory', 'Category', 'required|trim|regex_match[/^([-a-z ])+$/i');
                $this->form_validation->set_rules('inputName', 'Name', 'required|trim|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('inputMedium', 'Medium', 'required|trim|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('inputDurationTerm', 'Duration term', 'required|trim|regex_match[/^([-a-z ])+$/i');
                $this->form_validation->set_rules('inputTime', 'Time', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputStartDate', 'Start darequired|te', 'trim');
                $this->form_validation->set_rules('inputEndDate', 'End darequired|te', 'trim');
                $this->form_validation->set_rules('inputFeesTerm', 'Fees term', 'required|trim|min_length[10]|max_length[11]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputDOB', 'DOB', 'required|trim');
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
            $this->load->view('institute/header', array('profileData'=>$rspProfileData));
            $this->load->view('institute/courseAdd');
            $this->load->view('institute/footer');
        }

        public function edit(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');            
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $this->load->view('institute/header', array('profileData'=>$rspProfileData));            
            $this->load->view('institute/courseEdit');
            $this->load->view('institute/footer');
        }

    }
?>