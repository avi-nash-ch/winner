<?php
class AppMasterProduct_model extends MY_Model
{

    public function All()
    {
        $this->db->select('app_tbl_product.*');
        $this->db->from('app_tbl_product');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AddTableMaster($data)
    {
        $this->db->insert('app_tbl_product', $data);
        return $this->db->insert_id();
    }
    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('app_tbl_product');
        $this->db->where(['name'=>$name,'isDeleted'=>0]);
        return $num_results = $this->db->count_all_results();
    }
    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('app_tbl_product');
        return $Query->row();
    }
    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('app_tbl_product', $data);
        return $this->db->last_query();
    }
    
    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('app_tbl_product', $data);
        return $this->db->last_query();
    }  
}