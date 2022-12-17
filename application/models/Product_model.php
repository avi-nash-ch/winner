<?php
class Product_model extends MY_Model
{

    public function AllProduct()
    {
        $this->db->select('tbl_product.*,(select sale_price from tbl_product_price where tbl_product_price.product_id=tbl_product.id and tbl_product_price.isDeleted=0 order by tbl_product_price.id desc limit 1 ) as sale_price');
        $this->db->from('tbl_product');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }




    public function getProductPrice($id)
    {
        $this->db->select('tbl_product_price.*,tbl_product.name as product_name');
        $this->db->from('tbl_product_price');
        $this->db->join('tbl_product', 'tbl_product_price.product_id=tbl_product.id');
        $this->db->order_by('tbl_product_price.id', 'DESC');
        $this->db->where('tbl_product_price.isDeleted', false);
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->where('product_id',$id);
        $Query = $this->db->get();
        return $Query->result();
    }


    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_product');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('tbl_product', $data);
        return $this->db->insert_id();
    }

    public function AddProductPrice($data)
    {
        $this->db->insert('tbl_product_price', $data);
        return $this->db->insert_id();
    }

    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_product', $data);
        $this->db->where('product_id', $id);
        $this->db->update('tbl_product_price', $data);
        return $this->db->last_query();
    }

    public function DeletePrice($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_product_price', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_product', $data);
        return $this->db->last_query();
    }

    public function UpdatePrice($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_product_price', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('tbl_product');
        $this->db->where(['name'=>$name,'isDeleted'=>0]);
        return $num_results = $this->db->count_all_results();
    }
}