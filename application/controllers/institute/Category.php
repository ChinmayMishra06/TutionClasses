<?php 
    defined('BASEPATH') OR exit("No direct script access allowed.");

    class Category extends CI_Controller{
        public function index(){
            if(!$this->session->userdata('login'))
                redirect('institute/login');

            $this->load->model('DataModel', 'dataModel');
            if(isset($_REQUEST['btnAddCategory'])){
                $this->form_validation->set_rules('inputCategoryType', 'Category type', 'trim|required|regex_match[/^[0-9]+$/]');                
                $this->form_validation->set_rules('inputCategoryName', 'Category name', 'trim|required|regex_match[/^([-a-z ])+$/i]');
                if($this->form_validation->run() == true){
                    if($this->input->post('inputParentCategory') !== null){
                        $data['parent_category'] = $this->input->post('inputParentCategory');
                    }else{
                        $data['parent_category'] = 0;
                    }
                    $data['category_type'] = $this->input->post('inputCategoryType');
                    $data['category_name'] = $this->input->post('inputCategoryName');
                    $rspAddCategory = $this->dataModel->addCategory($data);
                    if($rspAddCategory == true){
                        $this->session->set_flashdata('message', 'Category successfully added.');
                        $this->session->set_flashdata('status', 'success');
                    }else{
                        $this->session->set_flashdata('message', 'Category not added.');
                        $this->session->set_flashdata('status', 'danger');
                    }
                    redirect('institute/category/add');
                }
            }
                
            $this->load->model('CommonModel', 'commonModel');
            $rspProfileData = $this->commonModel->getProfileData($this->session->userdata('user_id'));
            $data['profileData'] = $rspProfileData;

            $rspCategory = $this->dataModel->getCategory(0, 0);
            $data['categories'] = $rspCategory;

            $data['siteTitle'] = 'Add new category';
            $data['sectionTitle'] = 'Add new category';
            
            $this->load->view('institute/header', $data);            
            $this->load->view('institute/categoryAdd');
            $this->load->view('institute/footer');
        }
    }
?>