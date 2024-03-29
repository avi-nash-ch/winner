<?php

class AppFiles_model extends MY_Model
{
    public function allFiles()
    {
        $this->db->select('*');
        $this->db->from('app_tbl_files');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function AddFiles($data)
    {
        $this->db->insert('app_tbl_files', $data);
        return $this->db->insert_id();
    }
    public function CheckDuplicate($file_name)
    {
        $this->db->select('id');
        $this->db->from('app_tbl_files');
        $this->db->where(['file_name' => $file_name, 'isDeleted' => 0]);
        return $num_results = $this->db->count_all_results();
    }
    public function ViewFiles($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('app_tbl_files');
        return $Query->row();
    }
    public function UpdateFiles($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('app_tbl_files', $data);
        return $this->db->last_query();
    }
    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('app_tbl_files', $data);
        return $this->db->last_query();
    }
}
