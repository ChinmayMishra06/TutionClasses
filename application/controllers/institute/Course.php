<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Course extends CI_Controller{
        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');
            $this->load->model('UserModel', 'userModel');            

            $data['profileData'] = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['courses'] = $this->userModel->getAllCourses(false, false, false, false, $this->session->userdata('user_id'));

            $data['siteTitle'] = "All Courses";
            $data['sectionTitle'] = "All Courses";
            $this->load->view('institute/header', $data);            
            $this->load->view('institute/courses');
            $this->load->view('institute/footer');
        }

        public function add(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
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

                if($this->input->post('inputSubCategory') !== null){
                    $this->form_validation->set_rules('inputSubCategory', 'Sub Category', 'required|trim|regex_match[/^[0-9]+$/]');
                }
                $this->form_validation->set_rules('inputCategory', 'Category', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputCourseName', 'Name', 'required|trim|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('inputMedium', 'Medium', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputDescription', 'Description', 'required|trim|max_length[500]');
                $this->form_validation->set_rules('inputTimingTerm', 'Duration term', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputTime', 'Time', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputStartDate', 'Start joining date', 'required');
                $this->form_validation->set_rules('inputEndDate', 'End joining date', 'required');
                $this->form_validation->set_rules('inputFeesTerm', 'Fees term', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputAmount', 'Amount', 'required|trim|regex_match[/^[+-]?\d+(\.\d+)?$/]');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() === true){
                    $data['user_id'] = $this->session->userdata('user_id');
                    $data['category_id'] = $this->input->post('inputCategory');
                    $data['sub_category_id'] = $this->input->post('inputSubCategory');
                    $data['medium'] = $this->input->post('inputMedium');
                    $data['course_name'] = $this->input->post('inputCourseName');
                    $data['description'] = $this->input->post('inputDescription');
                    $data['fees_unit'] = $this->input->post('inputFeesTerm');
                    $data['fees'] = $this->input->post('inputAmount');
                    $data['start_date'] = $this->input->post('inputStartDate');
                    $data['end_date'] = $this->input->post('inputEndDate');  
                    $data['duration_unit'] = $this->input->post('inputTimingTerm');
                    $data['duration'] = $this->input->post('inputTime');

                    $this->load->model('UserModel', 'userModel');
                    $rspCourseAdd = $this->userModel->addCourse($data);
                    if($rspCourseAdd){
                        $this->session->set_flashdata('message', 'Course added successfully.');
                        $this->session->set_flashdata('status', 'success');
                    }else{                        
                        $this->session->set_flashdata('message', 'Course not added.');
                        $this->session->set_flashdata('status', 'danger');
                    }
                    redirect('institute/course/add');
                }
            }
            
            $this->load->model('CommonModel', 'commonModel');            
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            
            $this->load->model('DataModel', 'dataModel');
            $rspCategory = $this->dataModel->getCategory(0, 0);
            $rspMedium = $this->dataModel->getCategory(0, 1);
            $rspTerm = $this->dataModel->getCategory(0, 2);
            
            $data['profileData'] = $rspProfileData;
            $data['categories'] = $rspCategory;
            $data['mediums'] = $rspMedium;
            $data['terms'] = $rspTerm;
            
            $data['siteTitle'] = "Add New Course";
            $data['sectionTitle'] = "Add New Course";
            
            $this->load->view('institute/header', $data);
            $this->load->view('institute/courseAdd');
            $this->load->view('institute/footer');
        }

        public function edit($id){
            if(!$this->session->userdata('login'))
                redirect('institute/login');
            
            $this->load->model('CommonModel', 'commonModel');
            $this->load->model('UserModel', 'userModel');
            $this->load->model('DataModel', 'dataModel');
            
            if(isset($_REQUEST['btnCourseUpdate'])){
                $config['upload_path'] = 'public/uploads/institute/images';
                $config['allowed_types']= '*';
                $config['max_size'] = '1000';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $this->upload->initialize($config);

                if(!empty($_FILES['inputLogoImage']['name'])){
                    $this->upload->do_upload('inputLogoImage');
                    $data['logo_image'] = $this->upload->data()['file_name'];                
                }
                
                if(!empty($_FILES['inputBannerImage']['name'])){
                    $this->upload->do_upload('inputBannerImage');
                    $data['banner_image'] = $this->upload->data()['file_name'];                
                }
                
                if($this->input->post('inputSubCategory') !== null){
                    $this->form_validation->set_rules('inputSubCategory', 'Sub Category', 'required|trim|regex_match[/^[0-9]+$/]');
                }
                $this->form_validation->set_rules('inputCategory', 'Category', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputCourseName', 'Name', 'required|trim|regex_match[/^([-a-z ])+$/i]');
                $this->form_validation->set_rules('inputMedium', 'Medium', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputDescription', 'Description', 'required|trim|max_length[500]');
                $this->form_validation->set_rules('inputTimingTerm', 'Duration term', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputTime', 'Time', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputStartDate', 'Start joining date', 'required');
                $this->form_validation->set_rules('inputEndDate', 'End joining date', 'required');
                $this->form_validation->set_rules('inputFeesTerm', 'Fees term', 'required|trim|regex_match[/^[0-9]+$/]');
                $this->form_validation->set_rules('inputAmount', 'Amount', 'required|trim|regex_match[/^[+-]?\d+(\.\d+)?$/]');
                $this->form_validation->set_error_delimiters('<i class="text-danger">', '</i>');
                if($this->form_validation->run() === true){
                    $data['category_id'] = $this->input->post('inputCategory');
                    $data['sub_category_id'] = $this->input->post('inputSubCategory');
                    $data['medium'] = $this->input->post('inputMedium');
                    $data['course_name'] = $this->input->post('inputCourseName');
                    $data['description'] = $this->input->post('inputDescription');
                    $data['fees_unit'] = $this->input->post('inputFeesTerm');
                    $data['fees'] = $this->input->post('inputAmount');
                    $data['start_date'] = $this->input->post('inputStartDate');
                    $data['end_date'] = $this->input->post('inputEndDate');  
                    $data['duration_unit'] = $this->input->post('inputTimingTerm');
                    $data['duration'] = $this->input->post('inputTime');
                    
                    $rspCourseUpdate = $this->userModel->editCourse($id, $data);
                    if($rspCourseUpdate){
                        $this->session->set_flashdata('message', 'Course updated successfully.');
                        $this->session->set_flashdata('status', 'success');
                    }else{                        
                        $this->session->set_flashdata('message', 'Course not updated.');
                        $this->session->set_flashdata('status', 'danger');
                    }
                    redirect('institute/courses/edit/'. $id);
                }
            }

            $data['profileData'] = $this->commonModel->getProfileData($this->session->userdata('user_id'));            
            $data['course'] = $this->userModel->getAllCourses(false, false, false, false, false, $id);
            $data['categories'] = $this->dataModel->getCategory(0, 0);
            $data['mediums'] = $this->dataModel->getCategory(0, 1);
            $data['terms'] = $this->dataModel->getCategory(0, 2);

            $data['siteTitle'] = "Edit Course";
            $data['sectionTitle'] = "Edit Course";            
            $this->load->view('institute/header', $data);            
            $this->load->view('institute/courseEdit');
            $this->load->view('institute/footer');
        }
        
        public function details($id){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $this->load->model('CommonModel', 'commonModel');
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;

            $this->load->model('UserModel', 'userModel');
            $courseDetails = $this->userModel->getAllCourses(false, false, false, $this->session->userdata('user_id'), $id);
            $data['course'] = $courseDetails;
            $data['siteTitle'] = "Course Details";
            $data['sectionTitle'] = "Course Details";
            
            $this->load->view('institute/header', $data);            
            $this->load->view('institute/courseDetails');
            $this->load->view('institute/footer');
        }
        
        public function courseActiveDeactive(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $details = json_decode($this->input->post('data'));

            if($details->status == "0"){ $activeDeactive = array('status'=>1); }
            else{ $activeDeactive = array('status'=>0); }

            $this->load->model('UserModel', 'userModel');
            $rspActiveDeactive = $this->userModel->editCourse($details->course_id, $activeDeactive);

            if($rspActiveDeactive){
                die(json_encode(array('status'=>true, 'course_id'=>$details->course_id)));
            }else{
                die(json_encode(array('status'=>false)));
            }
        }
    }
?>