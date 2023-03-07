<?php
class Location extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Location_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Location',
            'All' => $this->Location_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Location/add', 'Add Location'];
        template('location/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Location'
        ];

        template('location/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Location',
            'data' => $this->Location_model->ViewTableMaster($id)
        ];

        template('location/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Location_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Location Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Location');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
       
        $check=$this->Location_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Location_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Location Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Location Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Location');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        
        $class = $this->Location_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Location Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Location');
    }


}