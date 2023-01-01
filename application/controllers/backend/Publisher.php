<?php
class Publisher extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Publisher_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Publisher',
            'All' => $this->Publisher_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Publisher/add', 'Add Publisher'];
        template('publisher/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Publisher'
        ];

        template('publisher/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Publisher',
            'data' => $this->Publisher_model->ViewTableMaster($id)
        ];

        template('publisher/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Publisher_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Publisher Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Publisher');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Publisher_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Publisher_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Publisher Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Publisher Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Publisher');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Publisher_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Publisher Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Publisher');
    }


}