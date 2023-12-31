<?php
class Transport extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Transport_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Transports',
            'All' => $this->Transport_model->All()
        ];
        $data['SideBarbutton'] = '';
        template('transport/index', $data);
    }

public function getItem()
{
    $result=[];
    $barcode=$this->input->post('barcode');
    $Products = $this->Product_model->GetProductByQrCode($barcode);
    if(!empty($Products)){
$result['result']=true;
$result['data']=$Products;
    }else{
        $result['result']=false;
        $result['data']=$Products;
    }
    echo json_encode($result);
}

    public function add()
    {
        $data = [
            'title' => 'Add Product',
            'Classes' => $this->Class_model->All(),
            'Authors' => $this->Auther_model->All(),
            'Languages' => $this->Language_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Boards' => $this->Board_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'ProductTypes' => $this->ProductTypes_model->All(),
        ];

        template('product/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'Classes' => $this->Class_model->All(),
            'Authors' => $this->Auther_model->All(),
            'Languages' => $this->Language_model->All(),
            'Publishers' => $this->Publisher_model->All(),
            'Boards' => $this->Board_model->All(),
            'Subjects' => $this->Subject_model->All(),
            'ProductTypes' => $this->ProductTypes_model->All(),
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

    public function Approved()
    {
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $this->Transport_model->Approved($id,$status);
echo json_encode(['result'=>true]);
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
        $product_image2='';
        $product_imag3='';
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
            'subject' => $this->input->post('subject'),
            'product_code' => $this->input->post('product_code'),
            'edition' => $this->input->post('edition'),
            'hsn_code' => $this->input->post('hsn_code'),
            'offer' => $this->input->post('discount'),
            'type' => $this->input->post('type'),
            'qty' => $this->input->post('qty'),
            'age' => $this->input->post('age'),
            'class' => $this->input->post('class'),
            'author' => $this->input->post('author'),
            'publisher' => $this->input->post('publisher'),
            'language' => $this->input->post('language'),
            'board' => $this->input->post('board'),
            'isOld' => !empty($this->input->post('isOld'))?1:0,
            'purchase_price' => $this->input->post('purchase_price'),
            'price_sale' => $this->input->post('sale_price'),
            'qr_code' => $this->input->post('qr_code'),
            'description' => $this->input->post('desc'),
            'url' => $this->input->post('url'),
            'image' => $product_image,
            'image2' => $product_image2,
            'image3' => $product_image3,
            'image4' => $product_image4,
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
        $product_image='';
        $product_image2='';
        $product_imag3='';
        $product_image4='';
        $data = [
            'name' => $this->input->post('name'),
            'subject' => $this->input->post('subject'),
            'product_code' => $this->input->post('product_code'),
            'edition' => $this->input->post('edition'),
            'hsn_code' => $this->input->post('hsn_code'),
            'offer' => $this->input->post('discount'),
            'description' => $this->input->post('desc'),
            'type' => $this->input->post('type'),
            'qty' => $this->input->post('qty'),
            'purchase_price' => $this->input->post('purchase_price'),
            'price_sale' => $this->input->post('sale_price'),
            'qr_code' => $this->input->post('qr_code'),
            'url' => $this->input->post('url'),
            'age' => $this->input->post('age'),
            'class' => $this->input->post('class'),
            'author' => $this->input->post('author'),
            'publisher' => $this->input->post('publisher'),
            'language' => $this->input->post('language'),
            'board' => $this->input->post('board'),
            'isOld' => !empty($this->input->post('isOld'))?1:0,
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


    public function PrintQrCode()
    {
        $result = [];
        $qr_code = $this->input->post('qr_code');
        if (!empty($qr_code)) {
            $data['product']=$this->Product_model->GetProductByQrCode($qr_code);
            ob_start();
            QRcode::png($qr_code, NULL,'L',4, 2);
             $imageString1 = base64_encode(ob_get_contents());
            ob_end_clean();
            $base64_qrcode = 'data:image/png;base64,' . $imageString1;
            $data['qr_code']=$base64_qrcode;
            $html = $this->load->view('qr_code', $data, true);
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [100, 150], 'orientation' => 'L', 'margin_top' => 1, 'margin_bottom' => 0.3, 'margin_left' => 0.5, 'margin_right' => 0.5]);
            //generate the PDF from the given html
            $mpdf->SetJS('this.print();');
            $mpdf->WriteHTML($html);

            $file = 'pass' . time() . '.pdf';
            $file_name = 'assets/pass_pdf/' . $file;
            //download it.
            $mpdf->Output($file_name, 'F');
            $result = ['file_name' => $file_name, 'response' => true, 'msg' => 'success'];
        } else {
            $result = ['response' => false, 'msg' => 'Invalid Param'];
        }
        echo json_encode($result);
    }

    public function Contact()
    {
        $data = [
            'title' => 'Manage Contact Transport',
            'AllWorkers' => $this->Transport_model->Contact()
        ];
        $data['SideBarbutton'] ='' ;
        template('transport/contact', $data);
    }


}