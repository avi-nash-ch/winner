<?php

class Advertisement extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Advertisement_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Advertisement',
            'AllCompanies' => $this->Advertisement_model->AllCompanies()
        ];
        $data['SideBarbutton'] = ['backend/Advertisement/add', 'Add Advertisement'];
        template('advertisement/index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add Advertisement',
            'AllCompanies' => $this->Advertisement_model->AllCompanies()
        ];
        template('advertisement/add', $data);
    }
    public function insert()
    {
        $company_image = '';
        if (!empty($_FILES['company_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['company_image']['name'];
            $_FILES['images']['type'] = $_FILES['company_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['company_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['company_image']['error'];
            $_FILES['images']['size'] = $_FILES['company_image']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('company_image')) {
                $data1 = $this->upload->data();
                $company_image = $data1['file_name'];
                if (empty($company_image)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        $data = [
            'company_name' => $this->input->post('company_name'),
            'company_image' => $company_image,
            'added_date' => date('Y-m-d H:i:s')
        ];
        // $check=$this->UserCategory_model->CheckDuplicate($this->input->post('name'));
        // if(empty($check)){
        $companyadd = $this->Advertisement_model->AddCompany($data);
        if ($companyadd) {
            $this->session->set_flashdata('msg', array('message' => 'Company Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        // }else{
        //     $this->session->set_flashdata('msg', array('message' => 'company Already Exists', 'class' => 'error', 'position' => 'top-right'));
        // }
        redirect('backend/Advertisement');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Company',
            'Company' => $this->Advertisement_model->editview($id)
        ];
        template('advertisement/edit', $data);
    }

    public function update()
    {
        $company_image = '';
        $data = [
            'company_name' => $this->input->post('company_name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        if (!empty($_FILES['company_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['company_image']['name'];
            $_FILES['images']['type'] = $_FILES['company_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['company_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['company_image']['error'];
            $_FILES['images']['size'] = $_FILES['company_image']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('company_image')) {
                $data1 = $this->upload->data();
                $company_image = $data1['file_name'];
                if (empty($company_image)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
            $data['company_image'] = $company_image; //here in $data['company_image'] this is come from tbl_advertisement
        }
        // $check=$this->UserCategory_model->CheckDuplicate($this->input->post('name'));
        // if(empty($check)){
        $updated = $this->Advertisement_model->company_update($data, $this->input->post('id'));
        if ($updated) {
            $this->session->set_flashdata('msg', array('message' => 'Company Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Advertisement');
    }
    public function delete($id)
    {
        if ($this->Advertisement_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Company Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Advertisement');
    }
}
