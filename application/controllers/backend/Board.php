<?php
class Board extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Board_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Board',
            'All' => $this->Board_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Board/add', 'Add Board'];
        template('board/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Board'
        ];

        template('board/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Board',
            'data' => $this->Board_model->ViewTableMaster($id)
        ];

        template('board/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Board_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Board Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Board');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Board_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Board_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Board Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Board Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Board');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        $class = $this->Board_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Board Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Board');
    }


}