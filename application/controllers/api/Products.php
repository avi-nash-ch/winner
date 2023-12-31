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

    public function cart_list_post()
    {
        $this->load->model(['Cart_model']);
        $user_id = $this->input->post('user_id');
        $All = $this->Cart_model->AllApi($user_id);
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
        $this->load->model('Cart_model');
        $size = $this->input->post('size');
        $color = $this->input->post('color');
        $qty = $this->input->post('qty');
        $productId = $this->input->post('product_id');
        $cost = $this->input->post('cost');
        $user_id = $this->input->post('user_id');

        // $cost = (float) filter_var($cost, FILTER_SANITIZE_NUMBER_INT);
        $cost = (float) str_replace(',', '', $cost);

        $data = [
            'product_id' => $productId,
            'size' => $size,
            'color' => $color,
            'cost' => $cost,
            'quantity' => $qty,
            'user_id' =>  $user_id
        ];
        $id=$this->Cart_model->AddTableMaster($data);
        if($id){
            $result = [
                'message' => 'Success',
                'code' => HTTP_OK,
            ];
            $this->response($result, HTTP_OK);
        }else{
            $result = [
                'message' => 'failed',
                'code' => HTTP_OK,
            ];
            $this->response($result, HTTP_OK);
        }
        
        $response = ['status' => true, 'message' => 'Product added to cart'];

        echo json_encode($response);
    }

    public function removeCart_post()
    {
        $this->load->model('Cart_model');
        $cart_id = $this->input->post('cart_id');
        $this->Cart_model->removeCart($cart_id);

        $response = ['status' => true, 'message' => 'Cart Removed Successfully'];

        echo json_encode($response);
    }

}