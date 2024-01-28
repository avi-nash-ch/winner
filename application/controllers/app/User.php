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
            'AllFiles' => $this->AppFiles_model->allfiles()
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
            'added_date' => date('Y-m-d H:i:s')
        );

        $inserted = $this->AppUser_model->insert_user($data);
        if ($inserted) {
            foreach ($this->input->post('files') as $key => $value) {
                $mapping_data = array(
                    'user_id' => $inserted,
                    'file_id' => $value,
                    'permission' => $this->input->post('file_permission')[$value],
                    'added_date' => date('Y-m-d H:i:s')
                );
                $this->AppUser_model->insert_user_file_mapping($mapping_data);
            }

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
            'data' => $this->AppUser_model->editview($id),
            'AllFiles' => $this->AppFiles_model->allfiles(),
            'UserFiles' => $this->AppUser_model->UserFile($id),
            'UpdatedFiles' => $this->AppUser_model->getUpdatedFiles($id),
        ];
        apptemplate('appview/account_user/edit', $data);
    }

    public function update()
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'user_type' => $this->input->post('user_type'),
            'updated_date' => date('Y-m-d H:i:s')
        );

        $user_id = $this->input->post('id');
        $updated = $this->AppUser_model->user_update($data, $user_id);
        
        if ($updated) {

            foreach ($this->input->post('files') as $key => $value) {
                $mapping_data = array(
                    'user_id' => $user_id,
                    'file_id' => $value,
                    'permission' => $this->input->post('file_permission')[$value],
                    'updated_date' => date('Y-m-d H:i:s')
                );
                $this->AppUser_model->insert_user_file_mapping($mapping_data);
            }

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
