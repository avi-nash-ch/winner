<?php
class Banners extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Banner_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Banners',
            'All' => $this->Banner_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Banners/add', 'Add Banner'];
        template('banner/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Banner'
        ];

        template('banner/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Banner',
            'data' => $this->Banner_model->ViewTableMaster($id)
        ];

        template('banner/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Banner_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Banner Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Banners');
    }


    public function insert()
    {
        $data = [
            'added_date' => date('Y-m-d H:i:s')
        ];
        if (! empty($_FILES['image']['name'])) {
            $_FILES['images']['name'] = $_FILES['image']['name'];
            $_FILES['images']['type'] = $_FILES['image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['image']['error'];
            $_FILES['images']['size'] = $_FILES['image']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
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
        $data['icon']=$product_image;
        $category = $this->Banner_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Banner Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    
        redirect('backend/Banners');
    }

   

    public function update()
    {
        $data = [
            'updated_date' => date('Y-m-d H:i:s')
        ];
        
        if (! empty($_FILES['image']['name'])) {
            $_FILES['images']['name'] = $_FILES['image']['name'];
            $_FILES['images']['type'] = $_FILES['image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['image']['error'];
            $_FILES['images']['size'] = $_FILES['image']['size'];
            $config['upload_path'] = './uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|jfif|JFIF|';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
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
            $data['icon']=$product_image;
        }
        
        $class = $this->Banner_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Banner Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Banners');
    }


}