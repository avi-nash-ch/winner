<?php
class SellCategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SellCategory_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Category',
            'All' => $this->SellCategory_model->All()
        ];
        $data['SideBarbutton'] = ['backend/SellCategory/add', 'Add Category'];
        template('sellitem/category/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Category'
        ];

        template('sellitem/category/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'data' => $this->SellCategory_model->ViewTableMaster($id)
        ];

        template('sellitem/category/edit', $data);
    }

    public function delete($id)
    {
        if ($this->SellCategory_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellCategory');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];

        $check = $this->SellCategory_model->CheckDuplicate($this->input->post('name'));
        if (empty($check)) {
            $category = $this->SellCategory_model->AddTableMaster($data);
            // echo "<pre>";
            // print_r($category);
            // die;
            if ($category) {
                $this->session->set_flashdata('msg', array('message' => 'Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellCategory');
    }



    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->SellCategory_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellCategory');
    }
}
