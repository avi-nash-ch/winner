<?php
class Auther_model extends MY_Model
{

    public function All()
    {
        $this->db->select('tbl_auther.*');
        $this->db->from('tbl_auther');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }


    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_auther');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('tbl_auther', $data);
        return $this->db->insert_id();
    }


    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_auther', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_auther', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('tbl_auther');
        $this->db->where(['name'=>$name,'isDeleted'=>0]);
        return $num_results = $this->db->count_all_results();
    }
}