<?php

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AppUser_model');
        $this->load->model('AppFiles_model');
    }


    public function index()
    {
        $data = [
            'title' => 'User',
            'All' => $this->AppUser_model->All(),
        ];
        $data['SideBarbutton'] = ['app/User/add', 'Add User'];
        apptemplate('appview/account_user/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add User',
            'All' => $this->AppUser_model->All(),
            'AllFiles' => $this->AppFiles_model->allfiles   ()
        ];
        apptemplate('appview/account_user/add', $data);
    }

    public function insert()
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'user_type' => $this->input->post('user_type'),
            // 'files' => $this->input->post('files'),
            'added_date' => date('Y-m-d H:i:s')
        );

        $inserted = $this->AppUser_model->insert_user($data);
        if ($inserted) {
            $this->session->set_flashdata('msg', array('message' => 'User Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        redirect('app/User');   
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'data' => $this->AppUser_model->editview($id)
        ];
        apptemplate('appview/account_user/edit', $data);    }

    public function update()
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'user_type' => $this->input->post('user_type'),
            // 'files' => $this->input->post('files'),
            'updated_date' => date('Y-m-d H:i:s')
        );

        $updated = $this->AppUser_model->user_update($data, $this->input->post('id'));
        if ($updated) {
            $this->session->set_flashdata('msg', array('message' => 'User Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/User');
    }
    public function delete($id)
    {
        if ($this->AppUser_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'User Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('app/User');
    }
}
