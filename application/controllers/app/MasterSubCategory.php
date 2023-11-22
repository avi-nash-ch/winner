<?php
class MasterSubCategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['AppMasterSubCategory_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Masters/Sub Category',
            'All' => $this->AppMasterSubCategory_model->All()
        ];
        $data['SideBarbutton'] = ['app/MasterSubCategory/add', 'Add Sub Category'];
        apptemplate('appview/master_subcategory/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Sub Category',
            'All' => $this->AppMasterSubCategory_model->All()
        ];

        apptemplate('appview/master_subcategory/add', $data);
    }
    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->AppMasterSubCategory_model->CheckDuplicate($this->input->post('name'));

        if (empty($check)) {
            $subcategory = $this->AppMasterSubCategory_model->AddTableMaster($data);

            if ($subcategory) {
                $this->session->set_flashdata('msg', array('message' => 'Sub Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('app/MasterSubCategory');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Sub Category',
            'data' => $this->AppMasterSubCategory_model->ViewTableMaster($id)
        ];

        apptemplate('appview/master_subcategory/edit', $data);
    }
    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->AppMasterSubCategory_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterSubCategory');
    }

    public function delete($id)
    {
        if ($this->AppMasterSubCategory_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterSubCategory');
    }
}
