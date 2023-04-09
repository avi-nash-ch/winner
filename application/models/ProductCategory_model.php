<?php
class ProductCategory_model extends MY_Model
{

    public function All()
    {
        $this->db->select('tbl_product_category.*');
        $this->db->from('tbl_product_category');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }


    public function AllSubCategory()
    {
        $this->db->select('tbl_sub_category.*');
        $this->db->from('tbl_sub_category');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_product_category');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('tbl_product_category', $data);
        return $this->db->insert_id();
    }

    public function AddTableMasterSubCategory($data)
    {
        $this->db->insert('tbl_sub_category', $data);
        return $this->db->insert_id();
    }

    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_product_category', $data);
        return $this->db->last_query();
    }

    public function deleteSubCategory($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_sub_category', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_product_category', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('tbl_product_category');
        $this->db->where(['name'=>$name,'isDeleted'=>0]);
        return $num_results = $this->db->count_all_results();
    }
    public function CheckDuplicateSubCategory($name)
    {
        $this->db->select('id');
        $this->db->from('tbl_sub_category');
        $this->db->where(['name'=>$name,'isDeleted'=>0]);
        return $num_results = $this->db->count_all_results();
    }
}