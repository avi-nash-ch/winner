<?php
class AttributeOptions extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['AttributeOptions_model']);
    }

    public function index($fieldId)
    {
        $data = [
            'title' => 'Manage Attributes Options',
            'All' => $this->AttributeOptions_model->All($fieldId)
        ];
        $data['SideBarbutton'] = ['backend/AttributeOptions/add/'.$fieldId, 'Add Attribute Option'];
        template('sellitem/options/index', $data);
    }

    public function add($fieldId)
    {
        $data = [
            'title' => 'Add Attribute Option',
            'fieldId' => $fieldId
        ];

        template('sellitem/options/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Attributes Option',
            'data' => $this->AttributeOptions_model->ViewTableMaster($id)
        ];

        template('sellitem/options/edit', $data);
    }

    public function delete($id)
    {
        if ($this->AttributeOptions_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Attribute Option Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
        // redirect('backend/AttributeOptions/');
    }


    public function insert()
    {
        $fieldId = $this->input->post('field_id');
        $data = [
            'name' => $this->input->post('name'),
            'field_id' => $fieldId,
            'added_date' => date('Y-m-d H:i:s')
        ];

        $check = $this->AttributeOptions_model->CheckDuplicate($this->input->post('name'), $fieldId);
        if (empty($check)) {
            $attribute = $this->AttributeOptions_model->AddTableMaster($data);
            if ($attribute) {
                $this->session->set_flashdata('msg', array('message' => 'Attribute Option Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Attribute Option Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/AttributeOptions/index/'.$fieldId);
    }

    public function update()
    {
        $fieldId = $this->input->post('field_id');
        $data = [
            'name' => $this->input->post('name'),
            'field_id' => $fieldId,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->AttributeOptions_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Attribute Option Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/AttributeOptions/index/'.$fieldId);
    }
}
