<?php
class ProductTypes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ProductTypes_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Product Type',
            'All' => $this->ProductTypes_model->All()
        ];
        $data['SideBarbutton'] = ['backend/ProductTypes/add', 'Add Product Type'];
        template('product_type/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Product Type'
        ];

        template('product_type/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product Type',
            'data' => $this->ProductTypes_model->ViewTableMaster($id)
        ];

        template('product_type/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->ProductTypes_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Product Tpe Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/ProductTypes');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->ProductTypes_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->ProductTypes_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Product Type Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Product Type Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/ProductTypes');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->ProductTypes_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Product Type Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/ProductTypes');
    }


}