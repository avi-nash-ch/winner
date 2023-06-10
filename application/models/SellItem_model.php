<?php
class SellItem_model extends MY_Model
{

    public function All($cat="", $sub_cat="", $title="")
    {
        $this->db->select('item_sells.*,tbl_sell_category.name as cat_name, tbl_sell_subcategories.name as sub_cat_name');
        $this->db->from('item_sells');
        $this->db->join('tbl_sell_category', 'tbl_sell_category.id=item_sells.cat_id');
        $this->db->join('tbl_sell_subcategories', 'tbl_sell_subcategories.id=item_sells.sub_cat_id');
        $this->db->where('item_sells.isDeleted', false);
        if(!empty($cat)) {
            $this->db->where_in('item_sells.cat_id', $cat);
        }
        if(!empty($sub_cat)) {
            $this->db->where_in('item_sells.sub_cat_id', $sub_cat);
        }
        if(!empty($title)) {
            $this->db->where_in('item_sells.title', $title, 'both');
        }
        $this->db->order_by('item_sells.id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }
    
    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('item_sells');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('item_sells', $data);
        return $this->db->insert_id();
    }


    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('item_sells', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('item_sells', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('item_sells');
        $this->db->where(['title'=>$name,'isDeleted'=>0]);
        return $this->db->count_all_results();
    }

    // Dynamic Fields
    public function AddDynamicFields($data)
    {
        $this->db->insert_batch('sells_item_fields_values', $data);
        return true;
    }
}