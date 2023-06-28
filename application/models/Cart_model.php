<?php
class Cart_model extends MY_Model
{
    public function All()
    {
        $userId = $this->session->userdata('admin_id');
        $this->db->select('cart.*,tbl_product.name as product_name,image');
        $this->db->from('cart');
        $this->db->join('tbl_product', 'tbl_product.id=cart.product_id');
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->where('cart.user_id', $userId);
        $this->db->where('status', 0);
        $this->db->order_by('cart.id', 'asc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('cart');
        return $Query->row();
    }

    public function AddTableMaster($data)
    {
        $this->db->insert('cart', $data);
        return $this->db->insert_id();
    }

    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('cart', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('cart', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('cart');
        $this->db->where(['title' => $name, 'isDeleted' => 0]);
        return $this->db->count_all_results();
    }

    public function removeCart($cart_id)
    {
        $this->db->where('id', $cart_id);
        $this->db->delete('cart');
        return $this->db->last_query();
    }

    public function placeOrder($data)
    {
        $this->db->insert('product_orders', $data);
        return $this->db->insert_id();
    }
}
