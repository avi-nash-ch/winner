<?php
class Worker_model extends MY_Model
{

    public function AllWorkers($cat=null,$search=null,$location=null)
    {
        $this->db->select('tbl_worker.*,tbl_category.name as category,tbl_location.name as location');
        $this->db->from('tbl_worker');
        $this->db->join('tbl_category','tbl_category.id=tbl_worker.category');
        $this->db->join('tbl_location','tbl_location.id=tbl_worker.location','left');
        $this->db->where('tbl_worker.isDeleted', false);
        if(!empty($cat)){
            $this->db->where_in('tbl_category.id',$cat);
        }
        if(!empty($location[0])){
            $this->db->where_in('tbl_worker.location',$location);
        }
        if(!empty($search)){          
            $this->db->like('tbl_worker.name',$search);
            $this->db->or_like('tbl_worker.location',$search);
            $this->db->or_like('tbl_worker.service_provider',$search);
        }
        $this->db->order_by('tbl_worker.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function Contact()
    {
        $this->db->select('user.first_name as user_name,user.phone as user_phone,tbl_worker.name as worker_name,tbl_worker.whatsapp_no as worker_phone,tbl_worker.shop_name,tbl_worker.address as shop_address,tbl_contact_worker.added_date');
        $this->db->from('tbl_contact_worker');
        $this->db->join('user','user.id=tbl_contact_worker.user_id');
        $this->db->join('tbl_worker','tbl_worker.id=tbl_contact_worker.worker_id');
        $this->db->where('tbl_contact_worker.isDeleted', false);
        $this->db->order_by('tbl_contact_worker.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AllMostViewedProduct()
    {
        $this->db->select('tbl_worker.*');
        $this->db->from('tbl_worker');
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
        $this->db->select('tbl_bill.*,tbl_worker.name as product_name');
        $this->db->from('tbl_bill');
        $this->db->join('tbl_worker', 'tbl_worker.id=tbl_bill.product_id');
        $this->db->where('tbl_bill.isDeleted', false);
        $this->db->order_by('tbl_bill.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }



    public function AllProductByClass($class)
    {
        $this->db->select('tbl_worker.*,tbl_class.name as class_name');
        $this->db->from('tbl_worker');
        $this->db->join('tbl_class', 'tbl_class.id=tbl_worker.class');
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('tbl_worker.class', $class);
        $this->db->order_by('tbl_worker.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AllProductByPublisher($publisher)
    {
        $this->db->select('tbl_worker.*,tbl_publisher.name as class_name');
        $this->db->from('tbl_worker');
        $this->db->join('tbl_publisher', 'tbl_publisher.id=tbl_worker.publisher');
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('tbl_worker.publisher', $publisher);
        $this->db->order_by('tbl_worker.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }
    public function AllProductBySubject($subject)
    {
        $this->db->select('tbl_worker.*,tbl_subject.name as class_name');
        $this->db->from('tbl_worker');
        $this->db->join('tbl_subject', 'tbl_subject.id=tbl_worker.subject');
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('tbl_worker.subject', $subject);
        $this->db->order_by('tbl_worker.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }



    public function getProductPrice($id)
    {
        $this->db->select('tbl_worker_price.*,tbl_worker.name as product_name');
        $this->db->from('tbl_worker_price');
        $this->db->join('tbl_worker', 'tbl_worker_price.product_id=tbl_worker.id');
        $this->db->order_by('tbl_worker_price.id', 'DESC');
        $this->db->where('tbl_worker_price.isDeleted', false);
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('product_id',$id);
        $Query = $this->db->get();
        return $Query->result();
    }


    public function ViewTableMaster($id)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('id', $id)
            ->get('tbl_worker');
        return $Query->row();
    }

    public function GetProductByQrCode($qr_code)
    {
        $Query = $this->db->where('isDeleted', False)
            ->where('qr_code', $qr_code)
            ->get('tbl_worker');
        return $Query->row();
    }
    
    public function AddTableMaster($data)
    {
        $this->db->insert('tbl_worker', $data);
        return $this->db->insert_id();
    }

    public function AddProductPrice($data)
    {
        $this->db->insert('tbl_worker_price', $data);
        return $this->db->insert_id();
    }

    public function Delete($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_worker', $data);
        return $this->db->last_query();
    }

    public function most_viewed_status($id,$status)
    {
        $data = [
            'most_viewd' => $status,
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_worker', $data);
        return $this->db->last_query();
    }

    public function DeletePrice($id)
    {
        $data = [
            'isDeleted' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_worker_price', $data);
        return $this->db->last_query();
    }

    public function UpdateTableMaster($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_worker', $data);
        return $this->db->last_query();
    }

    public function UpdatePrice($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_worker_price', $data);
        return $this->db->last_query();
    }

    public function CheckDuplicate($name)
    {
        $this->db->select('id');
        $this->db->from('tbl_worker');
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