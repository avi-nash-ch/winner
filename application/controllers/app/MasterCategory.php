<?php
class MasterCategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['AppMasterCategory_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Masters/Category',
            'All' => $this->AppMasterCategory_model->All()
        ];
        $data['SideBarbutton'] = ['app/MasterCategory/add', 'Add Category'];
        apptemplate('appview/master_category/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Category',
            'All' => $this->AppMasterCategory_model->All()
        ];

        apptemplate('appview/master_category/add', $data);
    }
    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->AppMasterCategory_model->CheckDuplicate($this->input->post('name'));

        if (empty($check)) {
            $category = $this->AppMasterCategory_model->AddTableMaster($data);

            if ($category) {
                $this->session->set_flashdata('msg', array('message' => 'Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('app/MasterCategory');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'data' => $this->AppMasterCategory_model->ViewTableMaster($id)
        ];

        apptemplate('appview/master_category/edit', $data);
    }
    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->AppMasterCategory_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterCategory');
    }

    public function delete($id)
    {
        if ($this->AppMasterCategory_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterCategory');
    }
}
