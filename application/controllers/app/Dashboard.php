<?php

class Dashboard extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(['Worker_model', 'Users_model','Product_model']);

    }
    public function index(){
        redirect ('app/dashboard/admin');
        
    }

    public function admin(){
        $data =[
            'title' => 'Dashboard',
            'Products' => $this->Worker_model->AllWorkers(),
        ];
        apptemplate('appview/dashboard/manufacturer', $data);
    }
}