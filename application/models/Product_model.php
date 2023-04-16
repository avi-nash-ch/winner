<?php
class Product_model extends MY_Model
{

    public function AllProduct($limit =null)
    {
        $this->db->select('tbl_product.*');
        $this->db->from('tbl_product');
        $this->db->where('isDeleted', false);
        $this->db->order_by('id', 'desc');
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $Query = $this->db->get();
        return $Query->result();
    }
    public function AllProductByType($column,$id,$limit =null)
    {
        $this->db->select('tbl_product.*');
        $this->db->from('tbl_product');
        $this->db->where('isDeleted', false);
        $this->db->where($column,$id);
        $this->db->order_by('id', 'desc');
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $Query = $this->db->get();
        return $Query->result();
    }

    public function FilterAllProduct($sub_cat='')
    {
        $this->db->select('tbl_product.*');
        $this->db->from('tbl_product');
        $this->db->where('tbl_product.isDeleted', false);
        if(!empty($sub_cat)){
            $this->db->where('tbl_product.sub_cat',$sub_cat);
        }
        $this->db->order_by('tbl_product.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }


    public function AllMostViewedProduct()
    {
        $this->db->select('tbl_product.*');
        $this->db->from('tbl_product');
        $this->db->where('isDeleted', false);
        $this->db->where('most_viewd',1);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function TodaysSale()
    {
        $this->db->select('SUM(tbl_bill.price) as total');
        $this->db->from('tbl_bill');
        $this->db->where('isDeleted', false);
        $this->db->where('DATE(added_date)', date('Y-m-d'));
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->row();
    }



    public function AllSale()
    {
        $this->db->select('tbl_bill.*,tbl_product.name as product_name');
        $this->db->from('tbl_bill');
        $this->db->join('tbl_product', 'tbl_product.id=tbl_bill.product_id');
        $this->db->where('tbl_bill.isDeleted', false);
        $this->db->order_by('tbl_bill.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }



    public function AllProductByClass($class)
    {
        $this->db->select('tbl_product.*,tbl_class.name as class_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_class', 'tbl_class.id=tbl_product.class');
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->where('tbl_product.class', $class);
        $this->db->order_by('tbl_product.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AllProductById($class)
    {
        $this->db->select('tbl_product.*,tbl_class.name as class_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_class', 'tbl_class.id=tbl_product.class');
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->where('tbl_product.id', $class);
        $this->db->order_by('tbl_product.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AllProductByPublisher($publisher)
    {
        $this->db->select('tbl_product.*,tbl_publisher.name as class_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_publisher', 'tbl_publisher.id=tbl_product.publisher');
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->where('tbl_product.publisher', $publisher);
        $this->db->order_by('tbl_product.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function AllProductBySubject($subject)
    {
        $this->db->select('tbl_product.*,tbl_subject.name as class_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_subject', 'tbl_subject.id=tbl_product.subject');
        $this->db->where('tbl_product.isDeleted', false);
        $this->db->where('tbl_product.subject', $subject);
        $this->db->order_by('tbl_product.id', 'desc');
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

    public function GetProductByQrCode($qr_code)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('qr_code', $qr_code)
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
        return $this->db->last_query();
    }

    public function most_viewed_status($id,$status)
    {
        $data = [
            'most_viewd' => $status,
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_product', $data);
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

    public function AddOrderItemMapping($data)
    {
        if(!empty($data)){
            return $this->db->insert_batch('tbl_bill', $data);
        }
      
    }

}