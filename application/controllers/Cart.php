<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Cart_model', 'Website_model']);
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

    public function removeProduct()
    {
        $cart_id = $this->input->post('cart_id');
        $removed = $this->Cart_model->removeCart($cart_id);

        if ($removed) {
            $response = ['status' => true, 'message' => 'Product removed from cart'];
        } else {
            $response = ['status' => false, 'message' => 'Woops something went wrong !!'];
        }
        echo json_encode($response);
    }

    public function checkout()
    {
        $carts = $this->Cart_model->All();
        $adminId = $this->session->admin_id;

        if (count($carts) == 0) {
            $this->session->set_flashdata('msg', array('message' => 'Your cart is empty', 'class' => 'error', 'position' => 'top-right'));
            redirect(base_url('Home'));
        }

        $data = [
            'title' => 'Checkout',
            'carts' => $carts,
            'user' => $this->Website_model->getUserById($adminId)
        ];
        website('website/checkout', $data);
    }

    public function placeOrder()
    {
        $carts = $this->Cart_model->All();
        foreach ($carts as $cart) {
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'postal_code' => $this->input->post('postal_code'),
                'country' => $this->input->post('country'),
                'state_id' => $this->input->post('state_id'),
                'payment_mode' => $this->input->post('payment_mode'),
                'product_id' => $cart->product_id,
                'cost' => $cart->cost,
                'size' => $cart->size,
                'color' => $cart->color,
                'quantity' => $cart->quantity,
                'user_id' => $cart->user_id
            ];

            $this->Cart_model->placeOrder($data);

            $cartBody = [
                'status' => 1
            ];
            $this->Cart_model->UpdateTableMaster($cartBody, $cart->id);
        }

        $this->session->set_flashdata('msg', array('message' => 'Order placed successfully', 'class' => 'success', 'position' => 'top-right'));
        redirect(base_url('Home'));
    }
}
