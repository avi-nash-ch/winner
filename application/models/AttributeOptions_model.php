<?php
class AttributeOptions_model extends MY_Model
{

    public function All($fieldId)
    {
        $this->db->select('tbl_attributes_options.*,tbl_attributes.name as fieldName');
        $this->db->from('tbl_attributes_options');
        $this->db->join('tbl_attributes', 'tbl_attributes.id=tbl_attributes_options.field_id');
        $this->db->where('field_id', $fieldId);
        $this->db->where('tbl_attributes_options.isDeleted', false);
        $this->db->order_by('tbl_attributes_options.id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }
    
    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_attributes_options');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('tbl_attributes_options', $data);
        return $this->db->insert_id();
    }


    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_attributes_options', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_attributes_options', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name, $fieldId)
    {
        $this->db->select('id');
        $this->db->from('tbl_attributes_options');
        $this->db->where(['name'=>$name,'isDeleted'=>0, 'field_id' => $fieldId]);
        return $this->db->count_all_results();
    }
}