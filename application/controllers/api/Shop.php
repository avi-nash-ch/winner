<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Shop extends REST_Controller
{
    private $data;
    private $UserData;
    private $UserId;
    public function __construct()
    {
        parent::__construct();
        $header = $this->input->request_headers('token');

        if (!isset($header['token'])) {
            $data['message'] = 'Invalid Request';
            $data['code'] = HTTP_UNAUTHORIZED;
            $this->response($data, HTTP_OK);
            exit();
        }

        if ($header['token'] != getToken()) {
            $data['message'] = 'Invalid Authorization';
            $data['code'] = HTTP_METHOD_NOT_ALLOWED;
            $this->response($data, HTTP_OK);
            exit();
        }

        $this->data = $this->input->post();

        $this->load->model([
            'Shop_model','Users_model'
        ]);
    }

    public function userById_post()
    {
        $user = $this->Users_model->UserProfile($this->data['user_id']);
        if ($user) {
            $data['code'] = HTTP_OK;
            $data['message'] = 'Success';
            $data['result'] = $user;
            if(!empty($this->data['fcm'])){
                $this->Users_model->fcmUpdate($this->data['user_id'],$this->data['fcm']);
            }
            $this->response($data, HTTP_OK);
        } else {
                $data['message'] = 'Invalid Id';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }

    public function confirm_update_status_post()
    {
        $order_id=$this->data['order_id'];
        $status=$this->data['status'];
        $order = $this->Users_model->getOrderStatus($this->data['order_id']);
        if($order->status==1){
            $data['message'] = 'Order already accepted by other delevery boy';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        //status=1 confirm,2=on the way,3=delivered,4=customer not accepted
        if ($order) {
            $data['code'] = HTTP_OK;
            $data['message'] = 'Success';
            $data['result'] = $order;
            if(!empty($this->data['user_id'])){
                $this->Users_model->acceptStatus($this->data['user_id'],$order_id,$status);
            }
            $this->response($data, HTTP_OK);
        } else {
               
            $data['message'] = 'Order is not found';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
        }
    }


    public function deleveryBoy_post()
    {
        $user = $this->Users_model->AllDeleveryBoys();
        if ($user) {
            $data['code'] = HTTP_OK;
            $data['message'] = 'Success';
            $data['result'] = $user;
            $this->response($data, HTTP_OK);
        } else {
                $data['message'] = 'Invalid Id';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }

    public function callDeleveryBoy_post()
    {
        $data_post=[
            'shop_id'=>$this->data['shop_id'],
            'first_name'=>$this->data['customer_name'],
            'phone'=>$this->data['mobile_no'],
            'address'=>$this->data['address'],
            'latitude'=>$this->data['lat'],
            'longitude'=>$this->data['long'],
        ];
        $orderId = $this->Shop_model->orderPlaced($data_post);
        if($orderId){
            $user = $this->Users_model->getAllFcm();
            if ($user) {
                $dat['title']='New Order recieved';
                $dat['order_id']=$orderId;
                $dat['description']=$this->data['shop_name'].'('.$this->data['address'].')';
                $dat['order_status']='0';
                $result=push_notification_android($user[0]->fcm_str,$dat);
                $data['code'] = HTTP_OK;
                $data['message'] = 'Success';
                $data['result'] = $result;
                $this->response($data, HTTP_OK);
            }
        }
                $data['message'] = 'Something went wrong';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
    }


    public function pushNoti_post()
    {
        $user = $this->Users_model->UserProfile($this->data['user_id']);
        if ($user) {
            $dat['title']='New Order recieved';
            $dat['order_id']='1';
            $dat['description']='Garam Masala';
            $dat['order_status']='1';
            $result=push_notification_android($user[0]->fcm,$dat);
            $data['code'] = HTTP_OK;
            $data['message'] = 'Success';
            $data['result'] = $result;
            $this->response($data, HTTP_OK);
        } else {
                $data['message'] = 'Invalid Id';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }

    public function TodaysOrder_post()
    {
        $user = $this->Users_model->getTodaysOrder($this->data['user_id'],$this->data['type']);
        if ($user) {
            $data['message'] = 'Success';
            $data['data'] = $user;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
                $data['message'] = 'No orders found';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }
  
}