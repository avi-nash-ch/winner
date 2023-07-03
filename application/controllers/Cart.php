<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Cart_model', 'Website_model','ProductCategory_model']);
    }

    public function list()
    {
        $carts = $this->Cart_model->All();

        $data = [
            'title' => 'Cart',
            'carts' => $carts,
            'Category' => $this->ProductCategory_model->All(),

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
            'Category' => $this->ProductCategory_model->All(),
            'user' => $this->Website_model->getUserById($adminId)
        ];
        website('website/checkout', $data);
    }

    public function placeOrder()
    {
        $carts = $this->Cart_model->All();
        $orderId = random_number();
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
                'cost' => $cart->cost * $cart->quantity,
                'size' => $cart->size,
                'color' => $cart->color,
                'quantity' => $cart->quantity,
                'user_id' => $cart->user_id,
                'order_id' => $orderId,
                'added_date' => date('Y-m-d H:i:s')
            ];

            $this->Cart_model->placeOrder($data);

            $cartBody = [
                'status' => 1
            ];
            $this->Cart_model->UpdateTableMaster($cartBody, $cart->id);
        }
        // $this->sendConfirmedOrderSms($this->input->post('phone'), $orderId);
        $this->session->set_flashdata('order_placed_id', $orderId);
        redirect(base_url('Home'));
    }

    public function sendConfirmedOrderSms($number, $orderId)
    {
        /*$ch = curl_init('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=64434758-d05b-11ed-81b6-0200cd936042&to=' . $number . '&from=Nxgtch&templatename=RBOOKS&var1=' . $orderId . '&var2='. date('Y-m-d'));
        curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        */

        // Send the POST request with cURL
        $message = "Your order $orderId placed on". date('Y-m-d') ."has been confirmed. We’ll pack and dispatch your products soon! You’ll get the shipping details and a tracking link when we dispatch your order.";
        $message = urlencode($message);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://2factor.in/API/R1/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'module=PROMO_SMS&apikey=64434758-d05b-11ed-81b6-0200cd936042&to='.$number.'&from=Nxgtch&msg=DLT%20Approved%20Message%20Text%20Goes%20Here',
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);
    }

    public function myorder()
    {
        $products = $this->Cart_model->OrderedProducts();

        $data = [
            'title' => 'Ordered products',
            'products' => $products
        ];
        website('website/myorder', $data);
    }
}
