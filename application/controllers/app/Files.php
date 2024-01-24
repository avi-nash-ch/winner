<?php

class Files extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AppFiles_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Files',
            'AllFiles' => $this->AppFiles_model->allFiles()
        ];
        $data['SideBarbutton'] = ['app/Files/add', 'Add Files'];
        apptemplate('appview/account_files/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Enter File Name',
            'AllFiles' => $this->AppFiles_model->allFiles()
        ];
        apptemplate('appview/account_files/add', $data);
    }
    public function insert()
    {
        $data = [
            'file_name' => $this->input->post('file_name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->AppFiles_model->CheckDuplicate($this->input->post('file_name'));

        if (empty($check)) {
            $files = $this->AppFiles_model->AddFiles($data);

            if ($files) {
                $this->session->set_flashdata('msg', array('message' => 'File Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'File Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('app/Files');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit File',
            'data' => $this->AppFiles_model->ViewFiles($id)
        ];

        apptemplate('appview/account_files/edit', $data);
    }
    public function update()
    {
        $data = [
            'file_name' => $this->input->post('file_name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->AppFiles_model->UpdateFiles($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Files Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/Files');
    }

    public function delete($id)
    {
        if ($this->AppFiles_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Files Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/Files');
    }
}
