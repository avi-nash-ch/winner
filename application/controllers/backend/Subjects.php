<?php
class Subjects extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Subject_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Subject',
            'All' => $this->Subject_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Subjects/add', 'Add Subject'];
        template('subject/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Subject'
        ];

        template('subject/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Subject',
            'data' => $this->Subject_model->ViewTableMaster($id)
        ];

        template('subject/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Subject_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Subject Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Subjects');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Subject_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Subject_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Subject Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Subject Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Subjects');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Subject_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Subject Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Subjects');
    }


}