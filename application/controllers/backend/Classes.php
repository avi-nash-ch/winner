<?php
class Classes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Class_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Class',
            'All' => $this->Class_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Classes/add', 'Add Class'];
        template('class/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Class'
        ];

        template('class/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Class',
            'data' => $this->Class_model->ViewTableMaster($id)
        ];

        template('class/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Class_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Class Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Class');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('class'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Class_model->CheckDuplicate($this->input->post('class'));
        if(empty($check)){
        $category = $this->Class_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Class Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Class Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Classes');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('class'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Class_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Class Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Classes');
    }


}