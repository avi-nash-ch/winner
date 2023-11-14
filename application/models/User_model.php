<?php

class User_model extends MY_Model
{
    public function insert_user($data)
    {
        // Assuming you have a database table named 'workers'
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    public function AllUsers()
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->order_by('user.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function editview($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('user');
        return $Query->row();
    }
    public function user_update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return $this->db->last_query();
    }

    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return $this->db->last_query();
    }
}
