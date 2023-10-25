<?php 

class Customer_model extends MY_Model
{
    public function AllCustomers(){
        $this->db->select('tbl_worker.*');
        $this->db->from('tbl_worker');
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('tbl_worker.role', 2);
        $this->db->order_by('tbl_worker.id','desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Delete($id)
    {
        $data = ['isDeleted' => TRUE];
        $this->db->where('id', $id);
        $this->db->update('tbl_worker', $data);
        return $this->db->last_query();
    }

    public function getOrderByCustomer($id)
    {
        $this->db->select('product_orders.*,tbl_worker.name as customer_name,tbl_worker.whatsapp_no as c_contact,shop.shop_name');//We use the alias "shop" for the tbl_worker table that represents the shop, which allows us to specify shop.shop_name in the select statement.
        $this->db->from('product_orders');
        $this->db->join('tbl_worker','tbl_worker.id = product_orders.customer_id');
        $this->db->join('tbl_worker shop','shop.id = product_orders.shop_id');
        $this->db->where('product_orders.isDeleted', false);
        $this->db->where('product_orders.customer_id', $id);
        $this->db->order_by('product_orders.id','desc');
        $Query = $this->db->get();
        return $Query->result(); 
    }
}

?>