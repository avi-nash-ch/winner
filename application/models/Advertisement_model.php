<?php

class Advertisement_model extends MY_Model{

    public function AddCompany($data)
    {
        $this->db->insert('tbl_advertisement', $data);
        return $this->db->insert_id();
    }
    public function AllCompanies()
    {
        $this->db->select("*");
        $this->db->from("tbl_advertisement");
        $this->db->order_by('tbl_advertisement.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function editview($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_advertisement');
        return $Query->row();
    }
    public function company_update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_advertisement', $data);
        return $this->db->last_query();
    }
    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_advertisement', $data);
        return $this->db->last_query();
    }
    
}