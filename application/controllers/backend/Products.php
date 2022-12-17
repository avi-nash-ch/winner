<?php
class Products extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Product_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Products',
            'AllProducts' => $this->Product_model->AllProduct()
        ];
        $data['SideBarbutton'] = ['backend/Products/add', 'Add Product'];
        template('product/index', $data);
    }

    public function test()
	{
		// You can put anything here to generate of barcode
		$string = 'code39';
		$this->set_barcode($string);
	}
	
	private function set_barcode($code)
	{
		// Load library
		$this->load->library('Zend');
		// Load in folder Zend
		$this->zend->load('Zend/Barcode');
		// Generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	

    public function add()
    {
        $data = [
            'title' => 'Add Product'
        ];

        template('product/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'Product' => $this->Product_model->ViewTableMaster($id)
        ];

        template('product/edit', $data);
    }
    public function addprice($id)
    {
        $data = [
            'title' => 'Add Price',
            'product_id'=>$id,
            'AllProductPrice' => $this->Product_model->getProductPrice($id)
        ];
        template('product/add_price', $data);
    }

    public function delete($id)
    {
        if ($this->Product_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Product Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Products');
    }

    public function pricedelete($product_id,$id)
    {
        if ($this->Product_model->DeletePrice($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Price Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Products/addprice/'.$product_id);
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
            $config['allowed_types'] = 'jpg|png|jpeg';
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
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'qty' => $this->input->post('qty'),
            'purchase_price' => $this->input->post('purchase_price'),
            'price_sale' => $this->input->post('sale_price'),
            'qr_code' => $this->input->post('qr_code'),
            'description' => $this->input->post('desc'),
            'url' => $this->input->post('url'),
            'image' => $product_image,
            'added_date' => date('Y-m-d H:i:s')
        ];
        // $check=$this->UserCategory_model->CheckDuplicate($this->input->post('name'));
        // if(empty($check)){
        $category = $this->Product_model->AddTableMaster($data);
        if ($category) {
            $this->session->set_flashdata('msg', array('message' => 'Product Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    // }else{
    //     $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
    // }
        redirect('backend/Products');
    }

    public function InsertPrice()
    {
        
        $data = [
            'product_id' => $this->input->post('product_id'),
            'purchase_price' => $this->input->post('purchase_price'),
            'sale_price' => $this->input->post('sale_price'),
            'qty' => $this->input->post('qty'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        // $check=$this->UserCategory_model->CheckDuplicate($this->input->post('name'));
        // if(empty($check)){
        $price = $this->Product_model->AddProductPrice($data);
        if ($price) {
            $this->session->set_flashdata('msg', array('message' => 'Product Price Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
    // }else{
    //     $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
    // }
        redirect('backend/Products/addprice/'.$this->input->post('product_id'));
    }


    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('desc'),
            'type' => $this->input->post('type'),
            'qty' => $this->input->post('qty'),
            'purchase_price' => $this->input->post('purchase_price'),
            'price_sale' => $this->input->post('sale_price'),
            'qr_code' => $this->input->post('qr_code'),
            'url' => $this->input->post('url'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        if (! empty($_FILES['product_image']['name'])) {
            $_FILES['images']['name'] = $_FILES['product_image']['name'];
            $_FILES['images']['type'] = $_FILES['product_image']['type'];
            $_FILES['images']['tmp_name'] = $_FILES['product_image']['tmp_name'];
            $_FILES['images']['error'] = $_FILES['product_image']['error'];
            $_FILES['images']['size'] = $_FILES['product_image']['size'];
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
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
        $Category = $this->Product_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($Category) {
            $this->session->set_flashdata('msg', array('message' => 'Product Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Products');
    }

    public function UpdatePrice()
    {
        $data = [
            'purchase_price' => $this->input->post('purchase_price'),
            'sale_price' => $this->input->post('sale_price'),
            'qty' => $this->input->post('qty'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
     
        $price = $this->Product_model->UpdatePrice($data, $this->input->post('id'));
        if ($price) {
            $this->session->set_flashdata('msg', array('message' => 'Price Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Products/addprice/'.$this->input->post('product_id'));
    }


}