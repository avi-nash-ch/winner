<?php
class SellSubCategory extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'SellSubCategory_model',
            'SellCategory_model',
            'Attribute_model',
            'SubCategoryFields_model',
            'AttributeOptions_model'
        ]);
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Sub Category',
            'All' => $this->SellSubCategory_model->All()
        ];
        $data['SideBarbutton'] = ['backend/SellSubCategory/add', 'Add Sub Category'];
        template('sellitem/subcategory/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Sub Category',
            'categories' => $this->SellCategory_model->All(),
            'attributes' => $this->Attribute_model->All(),
        ];

        template('sellitem/subcategory/add', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Sub Category',
            'categories' => $this->SellCategory_model->All(),
            'data' => $this->SellSubCategory_model->ViewTableMaster($id)
        ];

        template('sellitem/subcategory/edit', $data);
    }

    public function delete($id)
    {
        if ($this->SellSubCategory_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellSubCategory');
    }


    public function insert()
    {
        $data = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'added_date' => date('Y-m-d H:i:s')
        ];
        $check = $this->SellSubCategory_model->CheckDuplicate($this->input->post('name'), $this->input->post('category_id'));
        if (empty($check)) {
            $subCat = $this->SellSubCategory_model->AddTableMaster($data);
            if ($subCat) {
                // Add Attributes for sub category
                $attributes = $this->input->post('attributes');
                if (!empty($attributes)) {
                    $attributeData = [];
                    foreach ($attributes as $key => $attr) {
                        $attributeData[$key]['field_id'] = $attr;
                        $attributeData[$key]['sub_cat_id'] = $subCat;
                    }
                    $this->db->insert_batch('sub_category_field_mapping', $attributeData);
                }
                $this->session->set_flashdata('msg', array('message' => 'Sub Category Added Successfully', 'class' => 'success', 'position' => 'top-right'));
            } else {
                $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
            }
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellSubCategory');
    }



    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
            'updated_date' => date('Y-m-d H:i:s')
        ];

        $class = $this->SellSubCategory_model->UpdateTableMaster($data, $this->input->post('id'));
        if ($class) {
            $this->session->set_flashdata('msg', array('message' => 'Sub Category Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/SellSubCategory');
    }

    public function getFields()
    {
        $sub_cat_id = $this->input->post('sub_cat_id');
        $fields = $this->SubCategoryFields_model->All($sub_cat_id);
        $str = "";
        foreach ($fields as $field) {
            $options = $this->AttributeOptions_model->All($field->field_id);
            if($field->field_type == "textfield") {
                $str .= $this->getTextField($field);
            }elseif($field->field_type == "dropdown") {
                $str .= $this->getDropdown($field, $options);
            }elseif($field->field_type == "radiobutton") {
                $str .= $this->getCheckbox($field, $options);
            }
            // $field->options = $this->AttributeOptions_model->All($field->field_id);
        }
        echo json_encode(['success' => true, 'data' => $fields, 'str' => $str]);
    }

    private function getTextField($field)
    {
        return "<div class='mb-4 mt-4'><label class='form-label'>$field->fieldName</label><input type='text' item-id='{$field->id}' class='form-control item-custom-field' placeholder='$field->fieldName'></div>";
    }

    private function getDropdown($field, $options)
    {
        $str = "<div class='mb-4 mt-4'><label>Select $field->fieldName</label><select item-id='{$field->id}' aria-label='.form-select-sm example' class='form-select form-select-sm item-custom-field'><option selected>select $field->fieldName</option>";
        foreach($options as $option) {
            $str .= "<option value='".$option->id."'>$option->name</option>";
        }
        $str .= "</select></div>";
        return $str;
    }

    private function getCheckbox($field, $options)
    {
        $fName = url_title($field->fieldName, 'dash', true);
        $str = "<div class='mb-4 mt-4'><label>Select $field->fieldName</label><br>";
        foreach($options as $option) {
            $fId = $fName.'_'.$option->id;
            $str .= "<div class='form-check form-check-inline'><input class='form-check-input item-custom-checkbox' item-id='{$field->id}' id='$fId' name='$fName' type='radio' value='$option->id'> <label class='form-check-label' for='$fId'>$field->fieldName</label></div>";
        }
        $str .= "</div>";
        return $str;
    }
}
