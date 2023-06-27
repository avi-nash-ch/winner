<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Cart_model']);
    }

    public function list()
    {
        $carts = $this->Cart_model->All();

        $data = [
            'title' => 'Cart',
            'carts' => $carts
        ];
        website('website/cart', $data);
    }
}