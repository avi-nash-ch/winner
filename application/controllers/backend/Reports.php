<?php

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Product_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Report',
            'AllSale' => $this->Product_model->AllSale()
        ];
        template('report', $data);
    }

   
}