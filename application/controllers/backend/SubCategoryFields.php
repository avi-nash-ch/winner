<?php
class SubCategoryFields extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SubCategoryFields_model', 'Attribute_model']);
    }

    public function index($sub_cat_id)
    {
        $data = [
            'title' => 'Manage Attributes Options',
            'All' => $this->SubCategoryFields_model->All($sub_cat_id)
        ];
        $data['SideBarbutton'] = ['backend/SubCategoryFields/add/' . $sub_cat_id, 'Add Sub Category Fields'];
        template('sellitem/sub_fields/index', $data);
    }

    public function add($sub_cat_id)
    {
        $data = [
            'title' => 'Add Sub Category Fields',
            'sub_cat_id' => $sub_cat_id,
            'attributes' => $this->Attribute_model->All()
        ];

        template('sellitem/sub_fields/add', $data);
    }

    public function delete($id)
    {
        if ($this->SubCategoryFields_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Fields Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect($_SERVER['HTTP_REFERER']);
        // redirect('backend/SubCategoryFields/');
    }


    public function insert()
    {
        $sub_cat_id = $this->input->post('sub_cat_id');
        $attributes = $this->input->post('attributes');
        $subCatAttr = [];
        $i = 0;
        foreach ($attributes as $key => $attribute) {
            $check = $this->SubCategoryFields_model->CheckDuplicate($attribute, $sub_cat_id);
            if (empty($check)) {
                $subCatAttr[$i]['sub_cat_id'] = $sub_cat_id;
                $subCatAttr[$i]['added_date'] = date('Y-m-d H:i:s');
                $subCatAttr[$i]['field_id'] = $attribute;
                $i++;
            }
        }
        if(!empty($subCatAttr)) {
            $this->db->insert_batch('sub_category_field_mapping', $subCatAttr);
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Fields Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        }else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SubCategoryFields/index/' . $sub_cat_id);
    }
}
