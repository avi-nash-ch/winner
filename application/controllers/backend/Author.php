<?php
class Author extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Auther_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Author',
            'All' => $this->Auther_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Author/add', 'Add Author'];
        template('auther/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Author'
        ];

        template('auther/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Author',
            'data' => $this->Auther_model->ViewTableMaster($id)
        ];

        template('auther/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Auther_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Author Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Author');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Auther_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Auther_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Author Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Author Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Author');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Auther_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Author Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Author');
    }


}