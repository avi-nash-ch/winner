<?php
class MasterSource extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['AppMasterSource_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Masters/Source',
            'All' => $this->AppMasterSource_model->All()
        ];
        $data['SideBarbutton'] = ['app/MasterSource/add', 'Add Source'];
        apptemplate('appview/master_source/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Source',
            'All' => $this->AppMasterSource_model->All()
        ];

        apptemplate('appview/master_source/add', $data);
    }
    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->AppMasterSource_model->CheckDuplicate($this->input->post('name'));

        if (empty($check)) {
            $source = $this->AppMasterSource_model->AddTableMaster($data);

            if ($source) {
                $this->session->set_flashdata('msg', array('message' => 'Source Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Source Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('app/MasterSource');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Source',
            'data' => $this->AppMasterSource_model->ViewTableMaster($id)
        ];

        apptemplate('appview/master_source/edit', $data);
    }
    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->AppMasterSource_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Source Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterSource');
    }

    public function delete($id)
    {
        if ($this->AppMasterSource_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Source Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Something Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/MasterSource');
    }
}
