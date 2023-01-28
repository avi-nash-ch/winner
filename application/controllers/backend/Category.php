<?php
class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Category_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Category',
            'All' => $this->Category_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Category/add', 'Add Category'];
        template('category/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Category'
        ];

        template('category/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'data' => $this->Category_model->ViewTableMaster($id)
        ];

        template('category/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Category_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Category');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Category_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Category_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Category');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Category_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Category');
    }


}