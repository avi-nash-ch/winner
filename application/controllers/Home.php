<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->model(['Product_model','Class_model','Website_model','Subject_model','Publisher_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'AllProduct' => $this->Product_model->AllProduct(),
            'AllMostViewedProduct' => $this->Product_model->AllMostViewedProduct(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/index', $data);
    }

    public function Class($class='')
    {

        $AllClass= $this->Class_model->All();
        $data = [
            'title' => 'Class',
            'class'=>$class,
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'AllProduct' => $this->Product_model->AllProductByClass($class),
            'Setting' => $this->Setting_model->Setting(),
            'AllClass'=>$AllClass
        ];
        website('frontend/classes/class-12-books', $data);
    }

    public function Publisher($class='')
    {

        $AllClass= $this->Class_model->All();
        $data = [
            'title' => 'Class',
            'class'=>$class,
            'Classes' => $this->Publisher_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'AllProduct' => $this->Product_model->AllProductByPublisher($class),
            'Setting' => $this->Setting_model->Setting(),
            'AllClass'=>$AllClass
        ];
        website('frontend/classes/class-12-books', $data);
    }

    public function Subject($class='')
    {

        $AllClass= $this->Class_model->All();
        $data = [
            'title' => 'Class',
            'class'=>$class,
            'Classes' => $this->Subject_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'AllProduct' => $this->Product_model->AllProductBySubject($class),
            'Setting' => $this->Setting_model->Setting(),
            'AllClass'=>$AllClass
        ];
        website('frontend/classes/class-12-books', $data);
    }

    public function productDeatils($id)
    {
        $id=$this->url_encrypt->decode($id);
        $product=$this->Website_model->ProductById($id);
        $related=$this->Website_model->GateRelatedProduct($product->type,$id);
        $data = [
            'title' => 'product-details',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
            'data' => $product,
            'related'=>$related
        ];
        website('frontend/classes/produtdetail', $data);
    }
    public function AddToCart()
    {
        $data = [
            'title' => 'add-to-cart',
            // 'AllProduct' => $this->Product_model->AllProduct(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/checkout/cart/index', $data);
    }
   


    public function site_map()
    {
        $data = [
            'title' => 'Site Map',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/sitemap', $data);
    }
    
    public function feedback()
    {
        $data = [
            'title' => 'About Us',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/feedback', $data);
    }

    public function bulk_enquiry()
    {
        $data = [
            'title' => 'Bulk Enquiry',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/bulk_enquiry', $data);
    }

    public function track_order()
    {
        $data = [
            'title' => 'Track Order',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/track_order', $data);
    }

    public function about_us()
    {
        $data = [
            'title' => 'About Us',
            'class'=>'',
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Classes' => $this->Class_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/about-mybookshop', $data);
    }

    public function refund_policy()
    {
        $data = [
            'title' => 'Refund Policy',
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/refund-policy', $data);
    }

    public function privacy_policy()
    {
        $data = [
            'title' => 'Privacy Policy',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        
        website('frontend/footerpages/our-policies', $data);
    }

    public function terms_conditions()
    {
        $data = [
            'title' => 'Terms & Conditions',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/terms-conditions', $data);
    }

    public function security()
    {
        $data = [
            'title' => 'Security',
        ];
        website('website/security', $data);
    }

    public function contact_us()
    {
        $data = [
            'title' => 'Contact us',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/contact', $data);
    }

    public function help_support()
    {
        $data = [
            'title' => 'Help Support',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/help-support', $data);
    }

    public function account()
    {
        $data = [
            'title' => 'My Account',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/my_account', $data);
    }
    public function cart()
    {
        $data = [
            'title' => 'My cart',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/my_cart', $data);
    }

    public function Registration()
    {
        $data = [
            'title' => 'Registartion',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/account', $data);
    }

    public function UserRegistration()
    {
        $data = [
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'created' => date('Y-m-d H:i:s')
        ];
        $check=$this->Website_model->CheckDuplicate($this->input->post('email'));
        if(empty($check)){
        $category = $this->Website_model->AddTableMaster($data);
        if ($category) {
            echo "<script>alert('Registration Successfully')
            window.location.href='".base_url('Home/account')."'
            </script>";
            
            // redirect('Home/account');
            // $this->session->set_flashdata('msg', array('message' => 'Registration Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        echo "<script>alert('Email Already Exists');
        window.location.href='".base_url('Home/Registration')."'
        </script>";
        // $this->session->set_flashdata('msg', array('message' => 'Email Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        
    }

   


}