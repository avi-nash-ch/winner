<?php 

class AppUser_Model extends MY_Model {
    public function All(){
        $this->db->select('*');
        $this->db->from('app_tbl_user');
        $this->db->where('isDeleted', false);
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

    public function associateFilesWithUser($userId, $fileId, $permission)
    {
        // Assuming you have a table named 'app_tbl_user_file_mapping' with columns 'user_id', 'file_id', and 'permission'
        $data = array(
            'user_id' => $userId,
            'file_id' => $fileId,
            'permission' => $permission
        );

        $this->db->insert('app_tbl_user_file_mapping', $data);
    }
    
}
