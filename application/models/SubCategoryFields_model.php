<?php
class SubCategoryFields_model extends MY_Model
{

    public function All($subCatId)
    {
        $this->db->select('sub_category_field_mapping.*,tbl_attributes.name as fieldName, tbl_sell_subcategories.name as sub_cat_name');
        $this->db->from('sub_category_field_mapping');
        $this->db->join('tbl_attributes', 'tbl_attributes.id=sub_category_field_mapping.field_id');
        $this->db->join('tbl_sell_subcategories', 'tbl_sell_subcategories.id=sub_category_field_mapping.sub_cat_id');
        $this->db->where('sub_cat_id', $subCatId);
        $this->db->where('sub_category_field_mapping.isDeleted', false);
        $this->db->order_by('sub_category_field_mapping.id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }
    
    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('sub_category_field_mapping');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('sub_category_field_mapping', $data);
        return $this->db->insert_id();
    }


    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('sub_category_field_mapping', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('sub_category_field_mapping', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($fieldId, $subCatId)
    {
        $this->db->select('id');
        $this->db->from('sub_category_field_mapping');
        $this->db->where(['field_id'=>$fieldId,'isDeleted'=>0, 'sub_cat_id' => $subCatId]);
        return $this->db->count_all_results();
    }
}