<?php
class Transport_model extends MY_Model
{

   
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



    public function All($approved=null)
    {
        $this->db->select('tbl_transport.*,tbl_location.name as city');
        $this->db->from('tbl_transport');
        $this->db->join('tbl_location', 'tbl_location.id=tbl_transport.from_city');
        if($approved){
            $this->db->where('tbl_transport.approved', 1);
        }
        $this->db->where('tbl_transport.isDeleted', false);
        $this->db->order_by('tbl_transport.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function search($search=null)
    {
        $this->db->select('tbl_transport.*,tbl_location.name as city');
        $this->db->from('tbl_transport');
        $this->db->join('tbl_location','tbl_location.id=tbl_transport.from_city');
        $this->db->where('tbl_transport.isDeleted', false);

        if(!empty($search)){          
            $this->db->like('tbl_transport.name',$search);
            $this->db->or_like('tbl_location.name',$search);
            $this->db->or_like('tbl_transport.veh_no',$search);
        }
        $this->db->order_by('tbl_transport.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function TransportByFilter($a=[],$b=[])
    {
        $this->db->select('tbl_transport.*,tbl_location.name as city');
        $this->db->from('tbl_transport');
        $this->db->join('tbl_location', 'tbl_location.id=tbl_transport.from_city');
        if($a){
            $this->db->where_in('tbl_transport.from_city',$a);
        }
        if($b){
            $this->db->where_in('tbl_transport.veh_type',$b);
        }
        $this->db->where('tbl_transport.isDeleted', false);
        $this->db->where('tbl_transport.approved', 1);
        $this->db->order_by('tbl_transport.id', 'desc');
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

    public function Approved($id,$status)
    {
        $data = [
            'approved' => $status,
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_transport', $data);
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

    public function Contact()
    {
        $this->db->select('user.first_name as user_name,user.phone as user_phone,tbl_transport.name as worker_name,tbl_transport.whatsapp_no as worker_phone,tbl_transport.veh_no,tbl_transport.veh_name,tbl_contact_transport.added_date');
        $this->db->from('tbl_contact_transport');
        $this->db->join('user','user.id=tbl_contact_transport.user_id');
        $this->db->join('tbl_transport','tbl_transport.id=tbl_contact_transport.transport_id');
        $this->db->where('tbl_contact_transport.isDeleted', false);
        $this->db->order_by('tbl_contact_transport.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

}