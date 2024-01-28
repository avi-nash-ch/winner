<?php

class AppUser_Model extends MY_Model
{
    public function All()
    {
        $this->db->select('*');
        $this->db->from('app_tbl_user');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function UserFile($user_id)
    {
        $this->db->select('*');
        $this->db->from('app_tbl_user_file_mapping');
        $this->db->where('isDeleted', false);
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function insert_user($data)
    {
        $this->db->insert('app_tbl_user', $data);
        return $this->db->insert_id();
    }

    public function editview($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('app_tbl_user');
        return $Query->row();
    }

    public function user_update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('app_tbl_user', $data);
        return $this->db->last_query();
    }

    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('app_tbl_user', $data);
        return $this->db->last_query();
    }

    public function insert_user_file_mapping($data)
    {
        return $this->db->insert('app_tbl_user_file_mapping', $data);
    }

    public function getUpdatedFiles($user_id)
    {
        $this->db->select('file_id');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('app_tbl_user_file_mapping');
        return $query->result_array();
    }

    public function update_user_file_mapping($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('app_tbl_user_file_mapping', $data);
        return $this->db->last_query();
    }
}
