<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->model(['Worker_model','Website_model','Category_model','Location_model','Transport_model','Product_model','ProductCategory_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'Category' => $this->ProductCategory_model->All(),
            'AllProducts' => $this->Product_model->AllProduct(),
            'SubCategory' => $this->ProductCategory_model->AllSubCategory(),
        ];
        website('website/index', $data);
    }

    public function FindWorkers($class='')
    {

        $AllWorkers =$this->Worker_model->AllWorkers();
        $Allcity =$this->Location_model->All();
        $data = [
            'title' => 'Find Workers',
            'AllWorkers'=>$AllWorkers,
            'AllCategory' => $this->Category_model->All(),
            'Allcity' => $Allcity,
        ];
        website('website/findworker', $data);
    }

    public function filter()
    {

        $cat=$this->input->get('a');
        $search=$this->input->get('b');
        $location=$this->input->get('location');
        
        $AllWorkers =$this->Worker_model->AllWorkers($cat,$search,$location);
        $Allcity =$this->Location_model->All();
        $data = [
            'title' => 'Find Workers',
            'AllWorkers'=>$AllWorkers,
            'AllCategory' => $this->Category_model->All(),
            'Allcity' => $Allcity,
        ];
        website('website/findworker', $data);
    }

    public function t()
    {

        $cat=$this->input->get('a');
        $search=$this->input->get('b');
        $AllTransport =$this->Transport_model->TransportByFilter($cat,$search);
        $Allcity =$this->Location_model->All();
        $data = [
            'title' => 'Transport',
            'AllTransport'=>$AllTransport,
            'Allcity' => $Allcity,
        ];
        website('website/transportservice', $data);
    }

    public function s()
    {

        $search=$this->input->get('s');
        $AllTransport =$this->Transport_model->search($search);
        $Allcity =$this->Location_model->All();
        $data = [
            'title' => 'Transport',
            'AllTransport'=>$AllTransport,
            'Allcity' => $Allcity,
        ];
        website('website/transportservice', $data);
    }

    public function Transport()
    {

        $AllTransport =$this->Transport_model->All(1);
        $Allcity =$this->Location_model->All();
        $data = [
            'title' => 'Transport Service',
            'AllTransport'=>$AllTransport,
            'Allcity' => $Allcity,
        ];
        website('website/transportservice', $data);
    }

    public function products($sub_cat_id='')
    {
        $sub_cat=$this->url_encrypt->decode($sub_cat_id);
        $data = [
            'title' => 'Home',
            'Category' => $this->ProductCategory_model->All(),
            'AllProducts' => $this->Product_model->FilterAllProduct($sub_cat),
            // 'SubCategory' => $this->ProductCategory_model->AllSubCategory(),
        ];
        website('website/product-grids', $data);
    }

    public function productDeatils($id)
    {
        $id=$this->url_encrypt->decode($id);
        $product=$this->Website_model->ProductById($id);
        // $related=$this->Website_model->GateRelatedProduct($product->type,$id);
        $data = [
            'title' => 'product-details',
            'data' => $product,
        ];
        website('website/product-details', $data);
    }
    public function AddToCart()
    {
        $data = [
            'title' => 'add-to-cart',
            // 'AllProduct' => $this->Product_model->AllProduct(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/checkout/cart/index', $data);
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
        website('website/footerpages/sitemap', $data);
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
        website('website/footerpages/feedback', $data);
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
        website('website/footerpages/bulk_enquiry', $data);
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
        website('website/footerpages/track_order', $data);
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
        website('website/footerpages/about-mybookshop', $data);
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
        
        website('website/footerpages/our-policies', $data);
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
        website('website/footerpages/terms-conditions', $data);
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
        website('website/footerpages/contact', $data);
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
        website('website/footerpages/help-support', $data);
    }

    public function Login()
    {
        $data = [
            'title' => 'Login',
           
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/login', $data);
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
        website('website/my_cart', $data);
    }

    public function Registration()
    {
        $data = [
            'title' => 'Registartion',
            'class'=>'',
        ];
        website('website/register', $data);
    }

    public function UserRegistration()
    {
        $result=[];
        $data = [
            'first_name' => $this->input->post('fname'),
            'last_name' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone_no'),
            'password' => '',
            'created' => date('Y-m-d H:i:s')
        ];
        $check=$this->Website_model->CheckDuplicate($this->input->post('phone_no'));
        if(empty($check)){
        $category = $this->Website_model->AddTableMaster($data);
        if ($category) {
           $result['result']=true;
        } else {
            $result['result']=2;
        }
    }else{
        $result['result']=4;
    }
        echo json_encode($result);
    }

   
    public function CheckLogin()
    {
        $data=$this->Website_model->login($this->input->post('email'),$this->input->post('password'));
        if(!empty($data)){
            $user_data = array(
                'admin_id' => $data->id,
                'email' => $data->email,
                'name' => $data->first_name,
            );
            $this->session->set_userdata($user_data);
            echo "<script>alert('Login Successfully')
            window.location.href='".base_url('Home')."'
            </script>";
    }else{
        echo "<script>alert('Invalid Credential');
        window.location.href='".base_url('Home/Login')."'
        </script>";
        // $this->session->set_flashdata('msg', array('message' => 'Email Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        
    }


    public function LogOut()
    {
       
        $this->session->sess_destroy();
        redirect('Home');
        
    }


    public function Contact()
    {
        $id=$this->url_encrypt->decode($this->input->get('id'));
        $data = [
            'user_id' => $this->session->admin_id,
            'worker_id' => $id,
            'added_date' => date('Y-m-d H:i:s')
        ];
         $this->Website_model->AddContact($data);
        
    }

    public function TransportContact()
    {
        $id=$this->url_encrypt->decode($this->input->get('id'));
        $data = [
            'user_id' => $this->session->admin_id,
            'transport_id' => $id,
            'added_date' => date('Y-m-d H:i:s')
        ];
         $this->Website_model->AddTransportContact($data);
        
    }

   

    public function store_transport()
    {
        $veh_img='';
        $data = [
            'name' => $this->input->post('driver_name'),
            'whatsapp_no' => $this->input->post('mobile_no'),
            'veh_no' => $this->input->post('veh_no'),
            'veh_type' => $this->input->post('veh_type'),
            'veh_name' => $this->input->post('veh_name'),
            'from_city' => $this->input->post('from_city'),
            'to_city' => $this->input->post('to_city'),
            'by_root' => $this->input->post('by_root'),
            'date' => date('Y-m-d',strtotime($this->input->post('date'))) ,
            'time' => $this->input->post('time'),
            'comment' => $this->input->post('comment'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        if (! empty($_FILES['veh_img']['name'])) {
            $_FILES['images']['name'] = $_FILES['veh_img']['name'];
            $_FILES['images']['type'] = $_FILES['veh_img']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['veh_img']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['veh_img']['error'];
            $_FILES['images']['size'] = $_FILES['veh_img']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('veh_img')) {
                $data1 = $this->upload->data();
                $veh_img = $data1['file_name'];
                if (empty($veh_img)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        $data['image']=$veh_img;
        $category = $this->Website_model->store_transport($data);
        if ($category) {
            echo "<script>alert('Transport Service Added Successfully,Will display On Portal After Verification')
            window.location.href='".base_url('Home')."'
            </script>";
            
            // redirect('Home/account');
            // $this->session->set_flashdata('msg', array('message' => 'Registration Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    
        
    }   

public function SendOtp()
{ 
    $result=[];
    $numbers = $this->input->post('mobile');
    $data=$this->Website_model->getUserData($this->input->post('mobile'));
    if(!empty($data)){
        if(!empty($numbers)){
            $otp=random_int(100000, 999999);
            $this->Website_model->InsertOtp(['mobile'=>$numbers,'otp'=>$otp,'added_date'=>date('Y-m-d H:i:s')]);
            // Send the POST request with cURL
            $ch = curl_init('https://2factor.in/API/V1/64434758-d05b-11ed-81b6-0200cd936042/SMS/+91'.$numbers.'/'.$otp.'/OTP1');
            curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
           $r=json_decode($response);
        //    echo $response;
           if($r->Status=='Success'){
            $result['result']=true;
           }else{
            $result['result']=2;
           }
        }else{
            $result['result']=3;
        }
    }else{
        $result['result']=4;
    }
   echo json_encode($result);
  

}


public function VerifyOtp()
{
    $result=[];
    $data=$this->Website_model->getUserData($this->input->post('mobile'));
    if(!empty($data)){
        $check_otp=$this->Website_model->verifyotp($this->input->post('mobile'),$this->input->post('otp'));
        if(!empty($check_otp)){
            $user_data = array(
                'admin_id' => $data->id,
                'email' => $data->email,
                'name' => $data->first_name,
            );
            $this->session->set_userdata($user_data);
            $this->Website_model->otpUpdate($check_otp->id);
            $result['result']=true;
        }else{
            $result['result']=2;
        } 
}else{
    $result['result']=3;
    // $this->session->set_flashdata('msg', array('message' => 'Email Already Exists', 'class' => 'error', 'position' => 'top-right'));
}
echo json_encode($result);
    
}


}