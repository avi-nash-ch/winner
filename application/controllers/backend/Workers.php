<?php
class Workers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Worker_model','Category_model','Location_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Workers',
            'AllWorkers' => $this->Worker_model->AllWorkers()
        ];
        $data['SideBarbutton'] = ['backend/Workers/add', 'Add Worker'];
        template('worker/index', $data);
    }
    public function Map()
    {
        $data = [
            'title' => 'Delevery Boy',
            'AllWorkers' => $this->Worker_model->AllActiveWorkers()
        ];
        $this->load->view('map_test',$data);
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
            'title' => 'Add Worker',
            'Category' => $this->Category_model->All(),
            'Location' => $this->Location_model->All(),
        ];

        template('worker/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Workers',
            'Category' => $this->Category_model->All(),
            'Location' => $this->Location_model->All(),
            'Product' => $this->Worker_model->ViewTableMaster($id)
        ];

        template('worker/edit', $data);
    }
   
    public function orders($id)
    {
        $data = [
            'title' => 'Orders Details',
            'Orders' => $this->Worker_model->getOrderByDeliveryBoy($id)
        ];

        template('worker/order_details', $data);
    }

    public function delete($id)
    {
        if ($this->Worker_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Worker Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Workers');
    }

   
    public function insert()
    {
        $product_image='';
        $product_image2='';
        $product_image3='';
        $product_image4='';
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
        if (! empty($_FILES['product_image2']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image2']['name'];
            $_FILES['images']['type'] = $_FILES['product_image2']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image2']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image2']['error'];
            $_FILES['images']['size'] = $_FILES['product_image2']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image2')) {
                $data1 = $this->upload->data();
                $product_image2 = $data1['file_name'];
                if (empty($product_image2)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        if (! empty($_FILES['product_image3']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image3']['name'];
            $_FILES['images']['type'] = $_FILES['product_image3']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image3']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image3']['error'];
            $_FILES['images']['size'] = $_FILES['product_image3']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image3')) {
                $data1 = $this->upload->data();
                $product_image3 = $data1['file_name'];
                if (empty($product_image3)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        if (! empty($_FILES['product_image4']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image4']['name'];
            $_FILES['images']['type'] = $_FILES['product_image4']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image4']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image4']['error'];
            $_FILES['images']['size'] = $_FILES['product_image4']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image')) {
                $data1 = $this->upload->data();
                $product_image4 = $data1['file_name'];
                if (empty($product_image4)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
        }
        $data = [
            'name' => $this->input->post('name'),
             'shop_name' =>'',
            // 'location' => $this->input->post('location'),
            'address' => $this->input->post('address'),
            'whatsapp_no' => $this->input->post('whatsapp_no'),
            // 'shop_name' => $this->input->post('shop_name'),
            // 'service_provider' => $this->input->post('service_provider'),
            'image' => $product_image,
            'image2' => $product_image2,
            'image3' => $product_image3,
            'image4' => $product_image4,
            'added_date' => date('Y-m-d H:i:s')
        ];
        // $check=$this->UserCategory_model->CheckDuplicate($this->input->post('name'));
        // if(empty($check)){
        $category = $this->Worker_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Worker Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    // }else{
    //     $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
    // }
        redirect('backend/Workers');
    }

   
    public function update()
    {
        $product_image='';
        $product_image2='';
        $product_image3='';
        $product_image4='';
        $data = [
            'name' => $this->input->post('name'),
            // 'category' => $this->input->post('category'),
            // 'location' => $this->input->post('location'),
            'address' => $this->input->post('address'),
            'whatsapp_no' => $this->input->post('whatsapp_no'),
            // 'shop_name' => $this->input->post('shop_name'),
            // 'service_provider' => $this->input->post('service_provider'),
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
            $data['image']= $product_image;
        }
        if (! empty($_FILES['product_image2']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image2']['name'];
            $_FILES['images']['type'] = $_FILES['product_image2']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image2']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image2']['error'];
            $_FILES['images']['size'] = $_FILES['product_image2']['size'];
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image2')) {
                $data1 = $this->upload->data();
                $product_image2 = $data1['file_name'];
                if (empty($product_image2)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
            $data['image2']= $product_image2;
        }
        if (! empty($_FILES['product_image3']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image3']['name'];
            $_FILES['images']['type'] = $_FILES['product_image3']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image3']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image3']['error'];
            $_FILES['images']['size'] = $_FILES['product_image3']['size'];
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image3')) {
                $data1 = $this->upload->data();
                $product_image3 = $data1['file_name'];
                if (empty($product_image3)) {
                    echo "pr";
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo "pr";
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
            $data['image3']= $product_image3;
        }
        if (! empty($_FILES['product_image4']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image4']['name'];
            $_FILES['images']['type'] = $_FILES['product_image4']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image4']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image4']['error'];
            $_FILES['images']['size'] = $_FILES['product_image4']['size'];
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image4')) {
                $data1 = $this->upload->data();
                $product_image4 = $data1['file_name'];
                if (empty($product_image4)) {
                    echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                    exit;
                }
            } else {
                echo json_encode(['message' => $this->upload->display_errors(), 'class' => 'error', 'type' => 2]);
                exit;
            }
            $data['image4']= $product_image4;
        }
        $Category = $this->Worker_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($Category) {
            $this->session->set_flashdata('msg', array('message' => 'Workers Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Workers');
    }

}