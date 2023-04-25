<?php
class Brands extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Brand_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Brands',
            'All' => $this->Brand_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Brands/add', 'Add Brand'];
        template('brand/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Brand'
        ];

        template('brand/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit brand',
            'data' => $this->Brand_model->ViewTableMaster($id)
        ];

        template('brand/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Brand_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Brand Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Brands');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
       
        $check=$this->Brand_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Brand_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Brand Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'brand Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Brands');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        
        $class = $this->Brand_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Brand Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Brands');
    }


}