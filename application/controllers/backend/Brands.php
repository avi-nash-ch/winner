<?php
class Brands extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Brand_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Brands',
            'All' => $this->Brand_model->All()
        ];
        $data['SideBarbutton'] = ['backend/Brands/add', 'Add Brand'];
        template('brand/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Brand'
        ];

        template('brand/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit brand',
            'data' => $this->Brand_model->ViewTableMaster($id)
        ];

        template('brand/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->Brand_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Brand Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Brands');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
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
        $data['logo']=$product_image;
        $check=$this->Brand_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->Brand_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Brand Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'brand Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/Brands');
    }

   

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
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
            $data['logo']=$product_image;
        }
        
        $class = $this->Brand_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Brand Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Brands');
    }


}