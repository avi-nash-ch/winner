<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Products extends REST_Controller
{
   
    public function list_post()
    {
        $this->load->model(['Product_model']);
        $All = $this->Product_model->AllProduct();
        if ($All) {
            $data = [
                'List' => $All,
                'message' => 'Success',
                'code' => HTTP_OK,
            ];
            $this->response($data, HTTP_OK);
        } else {
            $data = [
                'message' => 'No Data Found.',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
    }

    public function p_post()
    {
        $this->load->model(['Product_model']);
        $cat=$this->input->post('c');
        $brand=$this->input->post('b');
        $shop=$this->input->post('s');
        $All =$this->Product_model->ProductByFilter($cat,$brand,$shop);
        if ($All) {
            $data = [
                'List' => $All,
                'message' => 'Success',
                'code' => HTTP_OK,
            ];
            $this->response($data, HTTP_OK);
        } else {
            $data = [
                'message' => 'No Data Found.',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
    }


    public function productAddToCart_post()
    {
        $this->load->modal('Cart_model');
        $size = $this->input->post('size');
        $color = $this->input->post('color');
        $qty = $this->input->post('qty');
        $productId = $this->input->post('product_id');
        $cost = $this->input->post('cost');

        // $cost = (float) filter_var($cost, FILTER_SANITIZE_NUMBER_INT);
        $cost = (float) str_replace(',', '', $cost);

        $data = [
            'product_id' => $productId,
            'size' => $size,
            'color' => $color,
            'cost' => $cost,
            'quantity' => $qty,
            'user_id' =>  $this->session->userdata('admin_id')
        ];
        $this->Cart_model->AddTableMaster($data);

        $response = ['status' => true, 'message' => 'Product added to cart'];

        echo json_encode($response);
    }

}