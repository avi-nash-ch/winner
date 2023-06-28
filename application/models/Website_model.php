<?php
class Website_model extends MY_Model
{

    public function ProductById($id)
    {
        $this->db->select('tbl_product.*');
        $this->db->from('tbl_product');
        $this->db->where('tbl_product.isDeleted', false);
        if($id){
            $this->db->where('tbl_product.id',$id);
        }
        $Query = $this->db->get();
        return $Query->row();
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



    public function getProductFeatures($id)
    {
        $this->db->select('tbl_product_features.*');
        $this->db->from('tbl_product_features');
        $this->db->where('tbl_product_features.isDeleted', false);
        $this->db->where('tbl_product_features.product_id',$id);
        $this->db->order_by('tbl_product_features.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }



    public function AllProductByClass()
    {
        $this->db->select('tbl_product.*,tbl_class.name as class_name');
        $this->db->from('tbl_product');
        $this->db->join('tbl_class', 'tbl_class.id=tbl_product.class');
        $this->db->where('tbl_product.isDeleted', false);
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
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function AddProductPrice($data)
    {
        $this->db->insert('tbl_product_price', $data);
        return $this->db->insert_id();
    }

    public function AddContact($data)
    {
        $this->db->insert('tbl_contact_worker', $data);
        return $this->db->insert_id();
    }

    public function AddTransportContact($data)
    {
        $this->db->insert('tbl_contact_transport', $data);
        return $this->db->insert_id();
    }

    public function store_transport($data)
    {
        $this->db->insert('tbl_transport', $data);
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
        $this->db->from('user');
        $this->db->where(['phone'=>$name,'isDeleted'=>0]);
        return $num_results = $this->db->count_all_results();
    }

    public function AddOrderItemMapping($data)
    {
        if(!empty($data)){
            return $this->db->insert_batch('tbl_bill', $data);
        }
      
    }

    public function ClassCount($id)
    {
        $this->db->select('id');
        $this->db->from('tbl_product');
        $this->db->where('class',$id);
        return $this->db->count_all_results();
    }

    public function login($username,$password)
    {
        $Query = $this->db->select('id,role,email,first_name,last_name')
                 ->where('isDeleted',false)
                 ->where('email',$username)
                 ->where('password',$password)
                 ->get('user');      
                 
        return $Query->row();
    }

    public function getUserData($mobile)
    {
        $Query = $this->db->select('id,role,email,first_name,last_name,phone')
                 ->where('isDeleted',false)
                 ->where('phone',$mobile)
                 ->get('user');      
        return $Query->row();
    }

    public function verifyotp($mobile,$otp)
    {
        $Query = $this->db->select('id')
                 ->where('isVerified',false)
                 ->where('mobile',$mobile)
                 ->where('otp',$otp)
                 ->get('tbl_otp');      
        return $Query->row();
    }

    public function InsertOtp($data)
    {
        $this->db->insert('tbl_otp', $data);
        return $this->db->insert_id();
    }

    public function otpUpdate($id)
    {
        $data = [
            'isVerified' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_otp', $data);
        return $this->db->last_query();
    }

    public function getUserById($id)
    {
        $Query = $this->db->select('first_name,last_name,email,phone')
                 ->where('isDeleted',false)
                 ->where('id',$id)
                 ->get('user');      
        return $Query->row();
    }
}