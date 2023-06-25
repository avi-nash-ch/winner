<?php
class ProductCategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ProductCategory_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Category',
            'All' => $this->ProductCategory_model->All()
        ];
        $data['SideBarbutton'] = ['backend/ProductCategory/add', 'Add Category'];
        template('pcategory/index', $data);
    }

    public function addSubCategory($id,$sub_cat_id='')
    {
        $data = [
            'title' => 'Manage Sub Category',
            'category_id'=>$id,
            'sub_cat_id'=>$sub_cat_id,
            'All' => $this->ProductCategory_model->AllSubCategory($id)
        ];
        $data['SideBarbutton'] = '';
        template('pcategory/subcategory', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Category'
        ];

        template('pcategory/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'data' => $this->ProductCategory_model->ViewTableMaster($id)
        ];

        template('pcategory/edit', $data);
    }
   
    public function delete($id)
    {
        if ($this->ProductCategory_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/ProductCategory');
    }

    public function deleteSubCategory($cat_id,$id)
    {
        if ($this->ProductCategory_model->deleteSubCategory($id)) {
            $this->session->set_flashdata('msg', array('message' => 'SubCategory Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/ProductCategory/addSubCategory/'.$cat_id);
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
        $data['icon']=$product_image;
        $check=$this->ProductCategory_model->CheckDuplicate($this->input->post('name'));
        if(empty($check)){
        $category = $this->ProductCategory_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/ProductCategory');
    }

    public function insert_subcategory()
    {
        $data = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'added_date' => date('Y-m-d H:i:s')
        ];
       
        $check=$this->ProductCategory_model->CheckDuplicateSubCategory($this->input->post('name'));
        if(empty($check)){
        $category = $this->ProductCategory_model->AddTableMasterSubCategory($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'SubCategory Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    }else{
        $this->session->set_flashdata('msg', array('message' => 'SubCategory Already Exists', 'class' => 'error', 'position' => 'top-right'));
    }
        redirect('backend/ProductCategory/addSubCategory/'.$this->input->post('category_id'));
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
            $data['icon']=$product_image;
        }
        
        $class = $this->ProductCategory_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/ProductCategory');
    }


}