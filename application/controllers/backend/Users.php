<?php

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Users_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Users',
            'AllUsers' => $this->Users_model->AllUserList()
        ];
        template('frontend/users', $data);
    }

   
}