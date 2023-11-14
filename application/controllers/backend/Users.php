<?php

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['User_model']);
    }
    public function index()
    {
        $data = [
            'title' => 'Manage Users',
            'AllUsers' => $this->User_model->AllUsers()
        ];
        $data['SideBarbutton'] = ['backend/Users/add', 'Add User'];
        template('user/index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add User',
            'AllUsers' => $this->User_model->AllUsers()
        ];
        template('user/add', $data);
    }
    public function insert()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'status' => $this->input->post('status'),
            'expiry_date' => $this->input->post('expiry_date'),
            'product_count' => $this->input->post('product_count'),
            'added_date' => date('Y-m-d H:i:s')
        );

        // Call the model to insert data into the database

        $inserted = $this->User_model->insert_user($data);
        if ($inserted) {
            $this->session->set_flashdata('msg', array('message' => 'User Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }

        // Redirect to the listing page or another appropriate page
        redirect('backend/Users');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'Userr' => $this->User_model->editview($id)
        ];
        template('user/edit', $data);
    }

    public function update()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'status' => $this->input->post('status'),
            'expiry_date' => $this->input->post('expiry_date'),
            'product_count' => $this->input->post('product_count'),
            'updated_date' => date('Y-m-d H:i:s')
        );

        $updated = $this->User_model->user_update($data, $this->input->post('id'));
        if ($updated) {
            $this->session->set_flashdata('msg', array('message' => 'User Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Users');
    }
    public function delete($id)
    {
        if ($this->User_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'User Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Users');
    }
}
