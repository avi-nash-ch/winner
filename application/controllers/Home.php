<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->model(['Product_model','Class_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'Classes' => $this->Class_model->All(),
            'AllProduct' => $this->Product_model->AllProduct(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/index', $data);
    }

    public function Class($class='')
    {
        $data = [
            'title' => 'Class',
            'class'=>$class,
            'Classes' => $this->Class_model->All(),
            'AllProduct' => $this->Product_model->AllProductByClass(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/classes/class-12-books', $data);
    }
    public function productDeatils()
    {
        $data = [
            'title' => 'product-details',
            // 'AllProduct' => $this->Product_model->AllProduct(),
            'Setting' => $this->Setting_model->Setting(),
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
    // public function termsAndConditon()
    // {
    //     $data = [
    //         'title' => 'terms-conditions',
    //         // 'AllProduct' => $this->Product_model->AllProduct(),
    //         'Setting' => $this->Setting_model->Setting(),
    //     ];
    //     website('frontend/footerpages/terms-conditions', $data);
    // }


    public function site_map()
    {
        $data = [
            'title' => 'Site Map',
            'class'=>'',
            'Classes' => $this->Class_model->All(),
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
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/feedback', $data);
    }

    public function about_us()
    {
        $data = [
            'title' => 'About Us',
            'class'=>'',
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
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('frontend/footerpages/help-support', $data);
    }
}