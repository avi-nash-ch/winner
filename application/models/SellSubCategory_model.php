<?php
class SellSubCategory_model extends MY_Model
{

    public function All()
    {
        $this->db->select('tbl_sell_subcategories.*,tbl_sell_category.name as category');
        $this->db->from('tbl_sell_subcategories');
        $this->db->join('tbl_sell_category', 'tbl_sell_category.id=tbl_sell_subcategories.category_id');
        $this->db->where('tbl_sell_subcategories.isDeleted', false);
        $this->db->order_by('tbl_sell_subcategories.id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }
    
    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_sell_subcategories');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('tbl_sell_subcategories', $data);
        return $this->db->insert_id();
    }


    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_sell_subcategories', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_sell_subcategories', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name, $category_id)
    {
        $this->db->select('id');
        $this->db->from('tbl_sell_subcategories');
        $this->db->where(['name'=>$name,'isDeleted'=>0,'category_id'=>$category_id]);
        return $this->db->count_all_results();
    }
}