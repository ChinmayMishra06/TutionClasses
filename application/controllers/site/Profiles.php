<?php defined('BASEPATH') OR exit("No direct script access allowed."); 
    class Profiles extends CI_Controller{
        public function index(){
            if(!$this->session->userdata('student_login'))
                redirect('login');

            $this->load->model('CommonModel', 'commonModel');            
            if(isset($_REQUEST['profileSubmit'])){
                if(!empty($_FILES['userImage']['name'])){
                    // $config['upload_path'] = './public/uploads/institute/images/';
                    $config['upload_path'] = 'public/uploads/institute/images';
                    $config['allowed_types']= '*';
                    $config['max_size'] = '1000';
                    $config['overwrite'] = TRUE;
                    $config['remove_spaces'] = TRUE;

                    $this->upload->initialize($config);
                    $this->upload->do_upload('userImage');
                    $data['image'] = $this->upload->data()['file_name'];
                }

                $this->form_validation->set_rules('name', 'Name', 'trim|regex_match[/^([-a-z0-9_ ])+$/i]');
                $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
                $this->form_validation->set_rules('contact', 'Contact', 'trim|min_length[10]|max_length[11]|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('city', 'City', 'trim|regex_match[/^([-a-z0-9_ ])+$/i]');
                $this->form_validation->set_rules('dob', 'DOB', 'trim');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');

                if($this->form_validation->run() === true){
                    $data['name'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['contact'] = $this->input->post('contact');
                    $data['dob'] = $this->input->post('dob');
                    $data['address'] = $this->input->post('city');

                    $rspEdit = $this->commonModel->editProfileData($this->session->userdata('student_id'), $data);
                    if($rspEdit){
                        $this->session->set_flashdata('message', 'Profile details updated successfully.');
                        $this->session->set_flashdata('status', 'success');
                    }else{                        
                        $this->session->set_flashdata('message', 'Profile details not updated.');
                        $this->session->set_flashdata('status', 'danger');
                    }
                    redirect('profile');
                }
            }
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('student_id'));
            $data['profileData'] = $rspProfileData;
            $data['title'] = "Edit profile";
            $this->load->view('site/header', $data);
            $this->load->view('site/profile');
            $this->load->view('site/footer');
        }
    }
?>    