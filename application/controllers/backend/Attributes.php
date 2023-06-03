<?php
class Attributes extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Attribute_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Attributes',
            'All' => $this->Attribute_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Attributes/add', 'Add Attribute'];
        template('sellitem/attribute/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Attribute'
        ];

        template('sellitem/attribute/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Attributes',
            'data' => $this->Attribute_model->ViewTableMaster($id)
        ];

        template('sellitem/attribute/edit', $data);
    }

    public function delete($id)
    {
        if ($this->Attribute_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Attribute Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Attributes');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'added_date' => date('Y-m-d H:i:s')
        ];

        $check = $this->Attribute_model->CheckDuplicate($this->input->post('name'));
        if (empty($check)) {
            $attribute = $this->Attribute_model->AddTableMaster($data);
            if ($attribute) {
                $this->session->set_flashdata('msg', array('message' => 'Attribute Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Attribute Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Attributes');
    }

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->Attribute_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Attribute Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Attributes');
    }
}
