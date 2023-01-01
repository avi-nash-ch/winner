<?php
class Language extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Language_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Language',
            'All' => $this->Language_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Language/add', 'Add Language'];
        template('language/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Language'
        ];

        template('language/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Language',
            'data' => $this->Language_model->ViewTableMaster($id)
        ];

        template('language/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Language_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Language Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Language');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Language_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Language_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Language Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Language Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Language');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Language_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Language Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Language');
    }


}