<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
        $this->load->model(['Worker_model', 'Website_model', 'Category_model', 'Location_model', 'Transport_model', 'Product_model', 'ProductCategory_model', 'Shop_model', 'Brand_model', 'SellCategory_model', 'SubCategoryFields_model', 'AttributeOptions_model', 'SellItem_model', 'SellSubCategory_model', 'Banner_model', 'Cart_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'Category' => $this->ProductCategory_model->All(),
            'Brands' => $this->Brand_model->All(),
            'AllProducts' => $this->Product_model->AllProduct(),
            'AllBanner' => $this->Banner_model->All(),
            'SubCategory' => $this->ProductCategory_model->AllSubCategory(),
        ];
        website('website/index', $data);
    }

    public function buyItems()
    {
        $data = [
            'title' => 'Home',
            'Category' => $this->ProductCategory_model->All(),
            'AllProducts' => $this->Product_model->FilterAllProduct(),
            'Shop' => $this->Shop_model->All(),
            'Brand' => $this->Brand_model->All(),
        ];
        website('website/buyall', $data);
    }

    public function FindWorkers($class = '')
    {

        $AllWorkers = $this->Worker_model->AllWorkers();
        $Allcity = $this->Location_model->All();
        $data = [
            'title' => 'Find Workers',
            'AllWorkers' => $AllWorkers,
            'AllCategory' => $this->Category_model->All(),
            'Allcity' => $Allcity,
        ];
        website('website/findworker', $data);
    }

    public function filter()
    {

        $cat = $this->input->get('a');
        $search = $this->input->get('b');
        $location = $this->input->get('location');

        $AllWorkers = $this->Worker_model->AllWorkers($cat, $search, $location);
        $Allcity = $this->Location_model->All();
        $data = [
            'title' => 'Find Workers',
            'AllWorkers' => $AllWorkers,
            'AllCategory' => $this->Category_model->All(),
            'Allcity' => $Allcity,
        ];
        website('website/findworker', $data);
    }

    public function p()
    {

        $cat = $this->input->get('c');
        $brand = $this->input->get('b');
        $shop = $this->input->get('s');

        $AllProducts = $this->Product_model->ProductByFilter($cat, $brand, $shop);
        $data = [
            'title' => 'Find Workers',
            'Category' => $this->ProductCategory_model->All(),
            'AllProducts' => $AllProducts,
            'Shop' => $this->Shop_model->All(),
            'Brand' => $this->Brand_model->All(),
        ];
        website('website/buyall', $data);
    }

    public function t()
    {

        $cat = $this->input->get('a');
        $search = $this->input->get('b');
        $AllTransport = $this->Transport_model->TransportByFilter($cat, $search);
        $Allcity = $this->Location_model->All();
        $data = [
            'title' => 'Transport',
            'AllTransport' => $AllTransport,
            'Allcity' => $Allcity,
        ];
        website('website/transportservice', $data);
    }

    public function s()
    {

        $search = $this->input->get('s');
        $AllTransport = $this->Transport_model->search($search);
        $Allcity = $this->Location_model->All();
        $data = [
            'title' => 'Transport',
            'AllTransport' => $AllTransport,
            'Allcity' => $Allcity,
        ];
        website('website/transportservice', $data);
    }

    public function Transport()
    {

        $AllTransport = $this->Transport_model->All(1);
        $Allcity = $this->Location_model->All();
        $data = [
            'title' => 'Transport Service',
            'Category' => $this->ProductCategory_model->All(),
            'AllTransport' => $AllTransport,
            'Allcity' => $Allcity,
        ];
        website('website/transportservice', $data);
    }

    public function products($sub_cat_id = '')
    {
        $sub_cat = $this->url_encrypt->decode($sub_cat_id);
        $data = [
            'title' => 'Home',
            'Category' => $this->ProductCategory_model->All(),
            'AllProducts' => $this->Product_model->FilterAllProduct($sub_cat),
            'Shop' => $this->Shop_model->All(),
            'Brand' => $this->Brand_model->All(),
        ];
        website('website/product-grids', $data);
    }

    public function productDeatils($id)
    {
        $id = $this->url_encrypt->decode($id);
        $product = $this->Website_model->ProductById($id);
        $features = $this->Website_model->getProductFeatures($id);
        $data = [
            'title' => 'product-details',
            'data' => $product,
            'features' => $features
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
            'class' => '',
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
            'class' => '',
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
            'class' => '',
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
            'class' => '',
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
            // 'class'=>'',
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Classes' => $this->Class_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/about-us', $data);
    }

    public function refund_policy()
    {
        $data = [
            'title' => 'Refund Policy',
            // 'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/Refund-policy', $data);
    }

    public function privacy_policy()
    {
        $data = [
            'title' => 'Privacy Policy',
            // 'class'=>'',
            // 'Classes' => $this->Class_model->All(),
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];

        website('website/Privacy-Policy', $data);
    }

    public function return_policy()
    {
        $data = [
            'title' => 'Privacy Policy',
            // 'class'=>'',
            // 'Classes' => $this->Class_model->All(),
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];

        website('website/return-policy', $data);
    }

    public function delivery_policy()
    {
        $data = [
            'title' => 'Delivery Policy',
            // 'class'=>'',
            // 'Classes' => $this->Class_model->All(),
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];

        website('website/delivery-policy', $data);
    }
    public function cancellation_policy()
    {
        $data = [
            'title' => 'Cancellation Policy',
            // 'class'=>'',
            // 'Classes' => $this->Class_model->All(),
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];

        website('website/can-policy', $data);
    }

    public function terms_conditions()
    {
        $data = [
            'title' => 'Terms & Conditions',
            // 'class'=>'',
            // 'Classes' => $this->Class_model->All(),
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/terms&condition', $data);
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
            // 'class'=>'',
            // 'Classes' => $this->Class_model->All(),
            // 'Subjects' => $this->Subject_model->All(),
            // 'Publishers' => $this->Publisher_model->All(),
            // 'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/contact', $data);
    }

    public function help_support()
    {
        $data = [
            'title' => 'Help Support',
            'class' => '',
            'Classes' => $this->Class_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Setting' => $this->Setting_model->Setting(),
        ];
        website('website/footerpages/help-support', $data);
    }

    public function Login()
    {

        /*$user_data = array(
            'admin_id' => 1,
            'email' => 'suraj@gmail.com',
            'name' => 'Suraj',
        );
        $this->session->set_userdata($user_data);*/

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
            'class' => '',
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
            'class' => '',
        ];
        website('website/register', $data);
    }

    public function UserRegistration()
    {
        $result = [];
        $data = [
            'first_name' => $this->input->post('fname'),
            'last_name' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone_no'),
            'password' => '',
            'created' => date('Y-m-d H:i:s')
        ];
        $check = $this->Website_model->CheckDuplicate($this->input->post('phone_no'));
        if (empty($check)) {
            $category = $this->Website_model->AddTableMaster($data);
            if ($category) {
                $result['result'] = true;
            } else {
                $result['result'] = 2;
            }
        } else {
            $result['result'] = 4;
        }
        echo json_encode($result);
    }


    public function CheckLogin()
    {
        $data = $this->Website_model->login($this->input->post('email'), $this->input->post('password'));
        if (!empty($data)) {
            $user_data = array(
                'admin_id' => $data->id,
                'email' => $data->email,
                'name' => $data->first_name,
            );
            $this->session->set_userdata($user_data);
            echo "<script>alert('Login Successfully')
            window.location.href='" . base_url('Home') . "'
            </script>";
        } else {
            echo "<script>alert('Invalid Credential');
        window.location.href='" . base_url('Home/Login') . "'
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
        $id = $this->url_encrypt->decode($this->input->get('id'));
        $data = [
            'user_id' => $this->session->admin_id,
            'worker_id' => $id,
            'added_date' => date('Y-m-d H:i:s')
        ];
        $this->Website_model->AddContact($data);
    }

    public function TransportContact()
    {
        $id = $this->url_encrypt->decode($this->input->get('id'));
        $data = [
            'user_id' => $this->session->admin_id,
            'transport_id' => $id,
            'added_date' => date('Y-m-d H:i:s')
        ];
        $this->Website_model->AddTransportContact($data);
    }



    public function store_transport()
    {
        $veh_img = '';
        $data = [
            'name' => $this->input->post('driver_name'),
            'whatsapp_no' => $this->input->post('mobile_no'),
            'veh_no' => $this->input->post('veh_no'),
            'veh_type' => $this->input->post('veh_type'),
            'veh_name' => $this->input->post('veh_name'),
            'from_city' => $this->input->post('from_city'),
            'to_city' => $this->input->post('to_city'),
            'by_root' => $this->input->post('by_root'),
            'date' => date('Y-m-d', strtotime($this->input->post('date'))),
            'time' => $this->input->post('time'),
            'comment' => $this->input->post('comment'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        if (!empty($_FILES['veh_img']['name'])) {
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
        $data['image'] = $veh_img;
        $category = $this->Website_model->store_transport($data);
        if ($category) {
            echo "<script>alert('Transport Service Added Successfully,Will display On Portal After Verification')
            window.location.href='" . base_url('Home') . "'
            </script>";

            // redirect('Home/account');
            // $this->session->set_flashdata('msg', array('message' => 'Registration Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }

    public function SendOtp()
    {
        $result = [];
        $numbers = $this->input->post('mobile');
        $data = $this->Website_model->getUserData($this->input->post('mobile'));
        if (!empty($data)) {
            if (!empty($numbers)) {
                $otp = random_int(100000, 999999);
                $this->Website_model->InsertOtp(['mobile' => $numbers, 'otp' => $otp, 'added_date' => date('Y-m-d H:i:s')]);
                // Send the POST request with cURL
                $ch = curl_init('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=64434758-d05b-11ed-81b6-0200cd936042&to=' . $numbers . '&from=Nxgtch&templatename=PMS+Login+-+OTP&var1=' . $otp . '&var2=PratapMultiServices');
                curl_setopt($ch, CURLOPT_POST, true);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                $r = json_decode($response);
                //    echo $response;
                if ($r->Status == 'Success') {
                    $result['result'] = true;
                    $result['data'] = $data;
                } else {
                    $result['result'] = false;
                    $result['code'] = 2;
                }
            } else {
                $result['result'] = false;
                $result['code'] = 3;
            }
        } else {
            $result['result'] = false;
            $result['code'] = 4;
        }
        echo json_encode($result);
    }


    public function VerifyOtp()
    {
        $result = [];
        $data = $this->Website_model->getUserData($this->input->post('mobile'));
        if (!empty($data)) {
            $check_otp = $this->Website_model->verifyotp($this->input->post('mobile'), $this->input->post('otp'));
            if (!empty($check_otp)) {
                $user_data = array(
                    'admin_id' => $data->id,
                    'email' => $data->email,
                    'name' => $data->first_name,
                );
                $this->session->set_userdata($user_data);
                $this->Website_model->otpUpdate($check_otp->id);
                $result['result'] = true;
            } else {
                $result['result'] = false;
                $result['code'] = 2;
            }
        } else {
            $result['result'] = false;
            $result['code'] = 3;
            // $this->session->set_flashdata('msg', array('message' => 'Email Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        echo json_encode($result);
    }

    public function getSellsSubCategory()
    {
        $cat_id = $this->input->post('cat_id');
        $subCat = $this->SellCategory_model->subCategory($cat_id);
        echo json_encode(['success' => true, 'data' => $subCat]);
    }

    public function getFields()
    {
        $sub_cat_id = $this->input->post('sub_cat_id');
        $fields = $this->SubCategoryFields_model->All($sub_cat_id);
        $str = "";
        foreach ($fields as $field) {
            $options = $this->AttributeOptions_model->All($field->field_id);
            if ($field->field_type == "textfield") {
                $str .= $this->getTextField($field);
            } elseif ($field->field_type == "dropdown") {
                $str .= $this->getDropdown($field, $options);
            } elseif ($field->field_type == "radiobutton") {
                $str .= $this->getCheckbox($field, $options);
            }
            // $field->options = $this->AttributeOptions_model->All($field->field_id);
        }
        echo json_encode(['success' => true, 'data' => $fields, 'str' => $str]);
    }

    private function getTextField($field)
    {
        return "<div class='mb-4 mt-4'><label class='form-label'>$field->fieldName</label><input type='text' item-id='{$field->id}' class='form-control item-custom-field' placeholder='$field->fieldName'></div>";
    }

    private function getDropdown($field, $options)
    {
        $str = "<div class='mb-4 mt-4'><label>Select $field->fieldName</label><select item-id='{$field->id}' aria-label='.form-select-sm example' class='form-select form-select-sm item-custom-field'><option selected>select $field->fieldName</option>";
        foreach ($options as $option) {
            $str .= "<option value='" . $option->name . "'>$option->name</option>";
        }
        $str .= "</select></div>";
        return $str;
    }

    private function getCheckbox($field, $options)
    {
        $fName = url_title($field->fieldName, 'dash', true);
        $str = "<div class='mb-4 mt-4'><label>Select $field->fieldName</label><br>";
        foreach ($options as $option) {
            $fId = $fName . '_' . $option->id;
            $str .= "<div class='form-check form-check-inline'><input class='form-check-input item-custom-checkbox' item-id='{$field->id}' id='$fId' name='$fName' type='radio' value='$option->name'> <label class='form-check-label' for='$fId'>$option->name</label></div>";
        }
        $str .= "</div>";
        return $str;
    }

    public function postSellItem()
    {
        $dynamicFieldsValues = $this->input->post('dynamicFieldsValues');
        $fieldsValues = $this->input->post('fieldsValues');

        $dynamicFieldsValues = json_decode($dynamicFieldsValues, true);
        $fieldsValues = json_decode($fieldsValues, true);

        // print_r($dynamicFieldsValues);die;

        $title = $fieldsValues[2];
        $isTitleExists = false;
        if ($this->SellItem_model->CheckDuplicate($title)) {
            $isTitleExists = true;
        }
        $data = [
            'cat_id' => $fieldsValues[0],
            'sub_cat_id' => $fieldsValues[1],
            'title' => $title,
            'description' => $fieldsValues[3],
            'price' => $fieldsValues[4],
            'seller_name' => $fieldsValues[5],
            'seller_phone' => $fieldsValues[6],
            'seller_state' => $fieldsValues[7],
            'seller_village' => $fieldsValues[8],
            'seller_taluka' => $fieldsValues[9],
            'seller_district' => $fieldsValues[10],
            'seller_pincode' => $fieldsValues[11],
            'added_date' => date('Y-m-d H:i:s')
        ];
        $image1 = "";

        if (!empty($_FILES['image1']['name'])) {
            $_FILES['images']['name'] = $_FILES['image1']['name'];
            $_FILES['images']['type'] = $_FILES['image1']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['image1']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['image1']['error'];
            $_FILES['images']['size'] = $_FILES['image1']['size'];
            $config['upload_path'] = './uploads/sellitems/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image1')) {
                $data1 = $this->upload->data();
                $image1 = $data1['file_name'];
                if (empty($image1)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        $data['image1'] = $image1;

        $image2 = "";

        if (!empty($_FILES['image2']['name'])) {
            $_FILES['images']['name'] = $_FILES['image2']['name'];
            $_FILES['images']['type'] = $_FILES['image2']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['image2']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['image2']['error'];
            $_FILES['images']['size'] = $_FILES['image2']['size'];
            $config['upload_path'] = './uploads/sellitems/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image2')) {
                $data2 = $this->upload->data();
                $image2 = $data2['file_name'];
                if (empty($image2)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        $data['image2'] = $image2;

        $image3 = "";

        if (!empty($_FILES['image3']['name'])) {
            $_FILES['images']['name'] = $_FILES['image3']['name'];
            $_FILES['images']['type'] = $_FILES['image3']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['image3']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['image3']['error'];
            $_FILES['images']['size'] = $_FILES['image3']['size'];
            $config['upload_path'] = './uploads/sellitems/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image3')) {
                $data3 = $this->upload->data();
                $image3 = $data3['file_name'];
                if (empty($image3)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        $data['image3'] = $image3;

        $inseriId = $this->SellItem_model->AddTableMaster($data);
        $slug = url_title($title, 'dash', true);
        if ($isTitleExists) {
            $slug .= '-' . $inseriId;
        }
        $slugData = [
            'slug' => $slug
        ];
        // Update slug
        $this->SellItem_model->UpdateTableMaster($slugData, $inseriId);

        // Add dynamic fields
        $fieldData = [];
        foreach ($dynamicFieldsValues as $field) {
            $item['item_id'] = $inseriId;
            $item['field_id'] = $field['id'];
            $item['field_value'] = $field['value'];
            $item['added_date'] = date('Y-m-d H:i:s');
            $fieldData[] = $item;
        }

        if ($this->SellItem_model->AddDynamicFields($fieldData)) {
            echo json_encode(['success' => true, 'message' => 'Sell item post successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error ! while post.. ']);
        }
    }

    public function sellItems()
    {
        $cat = $this->input->get('cat');
        $sub_cat = $this->input->get('sub_cat');
        $title = $this->input->get('title');
        $published = 1;
        $data = [
            'title' => 'Home',
            'SellCategory' => $this->SellCategory_model->All(),
            'AllItems' => $this->SellItem_model->All($cat, $sub_cat, $title, $published),
            'SellSubCategory' => $this->SellSubCategory_model->All($cat),
        ];
        website('website/sellall', $data);
    }

    public function itemDetails($slug)
    {
        $items = $this->SellItem_model->viewItemBySlug($slug);
        $itemArray = [];
        foreach ($items as $key => $item) {
            $itemArray[$item->id]['id'] = $item->id;
            $itemArray[$item->id]['title'] = $item->title;
            $itemArray[$item->id]['cat_name'] = $item->cat_name;
            $itemArray[$item->id]['sub_cat_name'] = $item->sub_cat_name;
            $itemArray[$item->id]['slug'] = $item->slug;
            $itemArray[$item->id]['description'] = $item->description;
            $itemArray[$item->id]['image1'] = $item->image1;
            $itemArray[$item->id]['image2'] = $item->image2;
            $itemArray[$item->id]['image3'] = $item->image3;
            $itemArray[$item->id]['price'] = $item->price;
            $itemArray[$item->id]['seller_name'] = $item->seller_name;
            $itemArray[$item->id]['seller_phone'] = $item->seller_phone;
            $itemArray[$item->id]['seller_village'] = $item->seller_village;
            $itemArray[$item->id]['seller_taluka'] = $item->seller_taluka;
            $itemArray[$item->id]['seller_district'] = $item->seller_district;
            $itemArray[$item->id]['state_name'] = $item->state_name;
            $itemArray[$item->id]['seller_pincode'] = $item->seller_pincode;
            $itemArray[$item->id]['fields'][$key]['field_name'] = $item->field_name;
            $itemArray[$item->id]['fields'][$key]['field_value'] = $item->field_value;
        }
        $itemArray = array_values($itemArray);
        $data = [
            'title' => 'item-details',
            'data' => $itemArray[0],
        ];
        website('website/item-details', $data);
    }

    public function productAddToCart()
    {
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

    public function PlaceOrderOTP()
    {
        $result = [];
        $number = $this->input->post('mobile');
        if (!empty($number)) {
            $otp = random_int(100000, 999999);
            $this->Website_model->InsertOtp(['mobile' => $number, 'otp' => $otp, 'added_date' => date('Y-m-d H:i:s')]);
            // Send the POST request with cURL
            $ch = curl_init('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=64434758-d05b-11ed-81b6-0200cd936042&to=' . $number . '&from=Nxgtch&templatename=PMS+Login+-+OTP&var1=' . $otp . '&var2=PratapMultiServices');
            curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $r = json_decode($response);
            // $result['result'] = true;
            // $result['message'] = "OTP sent successully";
            if ($r->Status == 'Success') {
                $result['result'] = true;
                $result['message'] = "OTP sent successully";
            } else {
                $result['result'] = false;
                $result['code'] = 2;
            }
        } else {
            $result['result'] = false;
            $result['code'] = 3;
        }
        echo json_encode($result);
    }

    public function ProductOrderVerifyOtp()
    {
        $result = [];
        if (!empty($this->input->post('mobile') && !empty($this->input->post('otp')))) {
            $check_otp = $this->Website_model->verifyotp($this->input->post('mobile'), $this->input->post('otp'));
            if (!empty($check_otp)) {
                $this->Website_model->otpUpdate($check_otp->id);
                $result['result'] = true;
            } else {
                $result['result'] = false;
                $result['message'] = 'OTP not matched !!';
            }
        } else {
            $result['result'] = false;
            $result['message'] = "OTP missing";
        }
        echo json_encode($result);
    }
}
