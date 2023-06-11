<?php
class SellItem extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SellItem_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Sell Item',
            'All' => $this->SellItem_model->All()
        ];
        // $data['SideBarbutton'] = ['backend/SellCategory/add', 'Add Category'];
        template('sellitem/items/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Category'
        ];

        template('sellitem/category/add', $data);
    }

    public function view($id)
    {
        $items = $this->SellItem_model->viewItemById($id);
        $itemArray = [];
        foreach($items as $key => $item) {
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
            'title' => 'View Item',
            'data' =>  $itemArray[0]
        ];

        template('sellitem/items/view', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'data' => $this->SellItem_model->ViewTableMaster($id)
        ];

        template('sellitem/category/edit', $data);
    }

    public function publish($status, $id)
    {
        $data = [
            'is_verified' => $status,
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->SellItem_model->UpdateTableMaster($data, $id);
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Verified Status Changed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellItem');
    }

    public function delete($id)
    {
        if ($this->SellItem_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellCategory');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'added_date' => date('Y-m-d H:i:s')
        ];

        $check = $this->SellItem_model->CheckDuplicate($this->input->post('name'));
        if (empty($check)) {
            $category = $this->SellItem_model->AddTableMaster($data);
            // echo "<pre>";
            // print_r($category);
            // die;
            if ($category) {
                $this->session->set_flashdata('msg', array('message' => 'Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellCategory');
    }



    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->SellItem_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellCategory');
    }
}
