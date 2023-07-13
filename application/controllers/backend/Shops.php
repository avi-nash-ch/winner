<?php
class Shops extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Shop_model']);
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
        ];

        template('shop/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Shop',
            'Product' => $this->Shop_model->All($id),
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

   
    public function insert()
    {
        $product_image='';
      
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
      
        $data = [
            'first_name' => $this->input->post('shop_name'),
            'password' => $this->input->post('password'),
            'sw_password' => md5($this->input->post('password')),
            'contact_us' => $this->input->post('address'),
            'mobile' => $this->input->post('whatsapp_no'),
            'email_id' => $this->input->post('email'),
            'logo' => $product_image,
            'role'=>1,
            'created_date' => date('Y-m-d H:i:s')
        ];
        $check=$this->Shop_model->CheckDuplicate($this->input->post('email'));
        if(empty($check)){
        $category = $this->Shop_model->AddTableMaster($data);
        if ($category) {
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
      
        $data = [
            'first_name' => $this->input->post('shop_name'),
            'password' => $this->input->post('password'),
            'sw_password' => md5($this->input->post('password')),
            'contact_us' => $this->input->post('address'),
            'mobile' => $this->input->post('whatsapp_no'),
            'email_id' => $this->input->post('email'),
            'logo' => $product_image,
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
        }
        $check=$this->Shop_model->CheckDuplicateOnUpdate($this->input->post('email'),$this->input->post('id'));
        if(empty($check)){
        $Category = $this->Shop_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($Category) {
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