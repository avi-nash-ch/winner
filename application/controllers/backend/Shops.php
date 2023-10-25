<?php
class Shops extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Shop_model','Worker_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Shops',
            'All' => $this->Shop_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Shops/add', 'Add Shop'];
        template('shop/index', $data);
    }


    public function Contact()
    {
        $data = [
            'title' => 'Manage Contact Workers',
            'AllWorkers' => $this->Worker_model->Contact()
        ];
        $data['SideBarbutton'] = ['backend/Workers/add', 'Add Worker'];
        template('worker/contact', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Shop',
            'Product' => $this->Shop_model->All()
        ];

        template('shop/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Shop',
            'Product' => $this->Shop_model->All($id)
        ];

        template('shop/edit', $data);
    }
   

    public function delete($id)
    {
        if ($this->Shop_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Shop Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Shops');
    }

    function get_longitude_latitude_from_adress($address){
  
        $lat =  0;
        $long = 0;
         
         $address = str_replace(',,', ',', $address);
         $address = str_replace(', ,', ',', $address);
         $address = str_replace(" ", "+", $address);
          try {
         $json = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$address.'&key=AIzaSyCheqXXLZiGbGYObQTX6HkOTjDklpBPCw0');
         $json1 = json_decode($json);
         if($json1->{'status'} == 'ZERO_RESULTS') {
         return [
             'lat' => 0,
             'lng' => 0
            ];
         }
         
         if(isset($json1->results)){
            
            $lat = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lat'});
            $long = ($json1->{'results'}[0]->{'geometry'}->{'location'}->{'lng'});
          }
          } catch(exception $e) { }
         return [
         'lat' => $lat,
         'lng' => $long
         ];
        }

    public function insert()
    {
        $address =$this->input->post('street_address');
        $array  = $this->get_longitude_latitude_from_adress($address);
        $latitude  = round($array['lat'], 6);
        $longitude = round($array['lng'], 6);  
        $product_image='';
        $qr_image='';
        if (! empty($_FILES['product_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image']['name'];
            $_FILES['images']['type'] = $_FILES['product_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image']['error'];
            $_FILES['images']['size'] = $_FILES['product_image']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image')) {
                $data1 = $this->upload->data();
                $product_image = $data1['file_name'];
                if (empty($product_image)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        if (! empty($_FILES['qr_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['qr_image']['name'];
            $_FILES['images']['type'] = $_FILES['qr_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['qr_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['qr_image']['error'];
            $_FILES['images']['size'] = $_FILES['qr_image']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('qr_image')) {
                $data1 = $this->upload->data();
                $qr_image = $data1['file_name'];
                if (empty($qr_image)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
      
      
        $data = [
            'first_name' => $this->input->post('shop_name'),
            'password' => $this->input->post('password'),
            'sw_password' => md5($this->input->post('password')),
            'contact_us' => '',
            'mobile' => $this->input->post('whatsapp_no'),
            'email_id' => $this->input->post('email'),
            'logo' => $product_image,
            'qr_image' => $qr_image,
            'role'=>1,
            'created_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Shop_model->CheckDuplicate($this->input->post('whatsapp_no'));
        if(empty($check)){
        $category = $this->Shop_model->AddTableMaster($data);
        if ($category) {
            $shop_data = [
                'name' => $this->input->post('shop_name'),
                'shop_name' => $this->input->post('shop_name'),
                'address' => $this->input->post('street_address'),
                'whatsapp_no' => $this->input->post('whatsapp_no'),
                'shop_id' => $category,
                'image' => $product_image,
                'image2' => $qr_image,
                'lat'=>$latitude,
                'lng'=>$longitude,
                'role'=>1,
                'added_date' => date('Y-m-d H:i:s')
            ];
            $this->Shop_model->AddShop($shop_data);
            $this->session->set_flashdata('msg', array('message' => 'Shop Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Shop Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Shops');
    }

   
    public function update()
    {
        $product_image='';
        $qr_image='';
        $address =$this->input->post('address');
        $array  = $this->get_longitude_latitude_from_adress($address);
        $latitude  = round($array['lat'], 6);
        $longitude = round($array['lng'], 6); 
        $data = [
            'first_name' => $this->input->post('shop_name'),
            'password' => $this->input->post('password'),
            'sw_password' => md5($this->input->post('password')),
            'contact_us' => $this->input->post('address'),
            'mobile' => $this->input->post('whatsapp_no'),
            'email_id' => $this->input->post('email'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $shop_data = [
            'name' => $this->input->post('shop_name'),
            'shop_name' => $this->input->post('shop_name'),
            'address' => $this->input->post('address'),
            'whatsapp_no' => $this->input->post('whatsapp_no'),
            'lat'=>$latitude,
            'lng'=>$longitude,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        if (! empty($_FILES['product_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image']['name'];
            $_FILES['images']['type'] = $_FILES['product_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image']['error'];
            $_FILES['images']['size'] = $_FILES['product_image']['size'];
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image')) {
                $data1 = $this->upload->data();
                $product_image = $data1['file_name'];
                if (empty($product_image)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
          
            $data['logo']= $product_image;
            $shop_data['image'] = $product_image;
        }
        if (! empty($_FILES['qr_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['qr_image']['name'];
            $_FILES['images']['type'] = $_FILES['qr_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['qr_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['qr_image']['error'];
            $_FILES['images']['size'] = $_FILES['qr_image']['size'];
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('qr_image')) {
                $data1 = $this->upload->data();
                $qr_image = $data1['file_name'];
                if (empty($qr_image)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
            $data['qr_image']= $qr_image;
            $shop_data['image2']=$qr_image;
        }
            
        $check=$this->Shop_model->CheckDuplicateOnUpdate($this->input->post('whatsapp_no'),$this->input->post('id'));
        if(empty($check)){
        $Category = $this->Shop_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($Category) {
            $this->Shop_model->updateShop($this->input->post('id'),$shop_data);
            $this->session->set_flashdata('msg', array('message' => 'Shop Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        } 
    }else{
            $this->session->set_flashdata('msg', array('message' => 'Shop Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Shops');
    }

}

