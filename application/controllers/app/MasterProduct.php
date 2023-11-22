<?php
class MasterProduct extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['AppMasterProduct_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Masters/Product',
            'All' => $this->AppMasterProduct_model->All()
        ];
        $data['SideBarbutton'] = ['app/MasterProduct/add', 'Add Product'];
        apptemplate('appview/master_product/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Product',
            'All' => $this->AppMasterProduct_model->All()
        ];

        apptemplate('appview/master_product/add', $data);
    }
    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->AppMasterProduct_model->CheckDuplicate($this->input->post('name'));

        if (empty($check)) {
            $product = $this->AppMasterProduct_model->AddTableMaster($data);

            if ($product) {
                $this->session->set_flashdata('msg', array('message' => 'Product Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Product Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('app/MasterProduct');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'data' => $this->AppMasterProduct_model->ViewTableMaster($id)
        ];

        apptemplate('appview/master_product/edit', $data);
    }
    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->AppMasterProduct_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Product Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterProduct');
    }

    public function delete($id)
    {
        if ($this->AppMasterProduct_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Product Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterProduct');
    }
}
