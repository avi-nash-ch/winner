<?php
class SellSubCategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SellSubCategory_model', 'SellCategory_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Sub Category',
            'All' => $this->SellSubCategory_model->All()
        ];
        $data['SideBarbutton'] = ['backend/SellSubCategory/add', 'Add Sub Category'];
        template('sellitem/subcategory/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Sub Category',
            'categories' => $this->SellCategory_model->All()
        ];

        template('sellitem/subcategory/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Sub Category',
            'categories' => $this->SellCategory_model->All(),
            'data' => $this->SellSubCategory_model->ViewTableMaster($id)
        ];

        template('sellitem/subcategory/edit', $data);
    }

    public function delete($id)
    {
        if ($this->SellSubCategory_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellSubCategory');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->SellSubCategory_model->CheckDuplicate($this->input->post('name'), $this->input->post('category_id'));
        if (empty($check)) {
            $category = $this->SellSubCategory_model->AddTableMaster($data);
            if ($category) {
                $this->session->set_flashdata('msg', array('message' => 'Sub Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellSubCategory');
    }



    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->SellSubCategory_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellSubCategory');
    }
}
