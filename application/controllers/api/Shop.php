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
        if (empty($this->data['user_id'])) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
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

    function updatePrice_post() {
        
        $price = $this->input->post('price');
        $shop_id = $this->input->post('shop_id');
        $order_id = $this->input->post('order_id');
        $payment_status = $this->input->post('payment_status');
       
        if (empty($user_id)) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, HTTP_OK);
            exit();
        }
        if (empty($order_id)) {
            $data['message'] = 'Invalid Order Id';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, HTTP_OK);
            exit();
        }
        $result = $this->Users_model->updatePrice($order_id,$shop_id,$price,$payment_status);
        if ($result) {
            $data['message'] = 'Price updated Successfully';
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
        } else {
            $data['code'] = HTTP_FORBIDDEN;
            $data['message'] = 'Something Went Wrong';
            $this->response(NULL, 200);
        }
        // curl_close($curl);
    }

    public function orderById_post()
    {
        $order = $this->Users_model->orderById($this->data['order_id']);
        if ($order) {
            $data['code'] = HTTP_OK;
            $data['message'] = 'Success';
            $data['result'] = $order;
            $this->response($data, HTTP_OK);
        } else {
                $data['message'] = 'Not data found.';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }

    public function confirm_update_status_post()
    {
        if (empty($this->data['user_id'])) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
         //status=1 confirm,2=on the way,3=delivered,4=customer not accepted
         $trans_pic='';
         $payment_mode=0;
         $collect_price=0;
         $reason='';
         $order_id=$this->data['order_id'];
         $status=$this->data['status'];
         $order = $this->Users_model->getOrderStatus($this->data['order_id']);
        if(empty($order)){
            $data['message'] = 'Order is not found';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
        }
        if(!empty($order->user_id)){
            if($this->data['status']==0){
                $data['message'] = 'Order already accepted by other delevery boy';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
            }
           if($order->user_id!=$this->data['user_id']){
                $data['message'] = 'Order already in process';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           }
            if ($order) {
                if($status==3){
                    $trans_pic = '';
                    if (!empty($this->data['trans_pic'])) {
                        $img = $this->data['trans_pic'];
                        $img = str_replace(' ', '+', $img);
                        $img_data = base64_decode($img);
                        $trans_pic = uniqid().'.jpg';
                        $file = './uploads/transaction/'.$trans_pic;
                        file_put_contents($file, $img_data);
                    }
                    $payment_mode=$this->data['payment_mode'];
                    $collect_price=$this->data['collect_price'];
                }
                if($status==4){
                    $reason=$this->data['reason'];
                }
                $data['code'] = HTTP_OK;
                $data['message'] = 'Success';
                $data['result'] = $order;
                if(!empty($this->data['user_id'])){
                    $this->Users_model->acceptStatus($this->data['user_id'],$order_id,$status,$payment_mode,$collect_price,$trans_pic,$reason);
                }
                $this->response($data, HTTP_OK);
            } 
        }else{
            $this->Users_model->acceptStatus($this->data['user_id'],$order_id,1,$payment_mode,$collect_price,$trans_pic,$reason);
            $data['code'] = HTTP_OK;
            $data['message'] = 'Success';
            $data['result'] = $order;
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
    public function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
      
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
      
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
          cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return round(($angle * $earthRadius)/1000,1);
      }

    public function callDeleveryBoy_post()
    {
        if (empty($this->data['shop_id'])) {
            $data['message'] = 'Invalid Shop Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        if (empty($this->data['order_id'])) {
            $data['message'] = 'Invalid Order Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        $shop=$this->Shop_model->orderById($this->data['order_id'],$this->data['shop_id']);
        $price_setting = $this->Users_model->getPriceSetting();
       if($shop->distance<=$price_setting->base_km){
        $user = $this->Users_model->getAllFcm(1);
        if(empty($user[0]->fcm_str)){
            $user = $this->Users_model->getAllFcm(0);
        }
       }else if(($price_setting->base_km<$shop->distance) && ($shop->distance<=$price_setting->after_km)){
        $user = $this->Users_model->getAllFcm(0);
       }else{
        $user = $this->Users_model->getAllFcm(0);
       }
            if ($user) {
                $dat['title']='New Order recieved';
                $dat['order_id']=$this->data['order_id'];
                $dat['description']=$shop->shop_name.'('.$shop->shop_address.')';
                $dat['order_status']='0';
                $result=push_notification_android(explode(",",$user[0]->fcm_str) ,$dat);
                $data['code'] = HTTP_OK;
                $data['result'] =['id'=>$this->data['order_id']];
                $this->response($data, HTTP_OK);
            }
                $data['message'] = 'Something went wrong';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
    }

    public function orderItem_post()
    {
        if (empty($this->data['shop_id'])) {
            $data['message'] = 'Invalid Shop Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        $shop=$this->Shop_model->getShop($this->data['shop_id']);
        $customer=$this->Shop_model->getCustomer($this->data['user_id']);
        $price_setting = $this->Users_model->getPriceSetting();
       $distance= $this->haversineGreatCircleDistance($shop->lat,$shop->lng,round($this->data['lat'], 6),round($this->data['long'], 6));
       if($distance<=$price_setting->base_km){
        $delivery_charges=$price_setting->base_price;
        $delivery_boy_charges=$price_setting->delivery_boy_charges;
       }else if(($price_setting->base_km<$distance) && ($distance<=$price_setting->after_km)){
        $delivery_charges=$price_setting->base_price+$price_setting->between_price;
        $delivery_boy_charges=$price_setting->delivery_boy_charges;
       }else{
        $delivery_charges=($price_setting->base_price+$price_setting->between_price)+(($distance-$price_setting->after_km)*$price_setting->after_km_price);
        $delivery_boy_charges=($price_setting->delivery_boy_charges)+(($distance-$price_setting->after_km)*$price_setting->after_km_delboy_chrgs);
       }
        $data_post=[
            'shop_id'=>$this->data['shop_id'],
            'first_name'=>$customer->name,
            'phone'=>$customer->whatsapp_no,
            'address'=>$this->data['address'],
            'latitude'=>round($this->data['lat'], 6),
            'longitude'=>round($this->data['long'], 6),
            'cost'=>'',
            'product_name'=>$this->data['items'],
            'customer_id'=>$customer->id,
            'room_no'=>$this->data['room_no'],
            'delivery_charges'=>$delivery_charges,
            'delivery_boy_charges'=>$delivery_boy_charges,
            'distance'=>$distance,
            'added_date'=>date('Y-m-d H:i:s'),
            'payment_status'=>1
        ];
        $orderId = $this->Shop_model->orderPlaced($data_post);
      
        if($orderId){
                $dat['title']='New Order recieved';
                $dat['order_id']=$orderId;
                $dat['customer_name']=$customer->name.'('.$shop->address.')';
                $dat['customer_address']=$this->data['address'];
                $dat['order_status']='0';
                $result=push_notification_android(explode(",",$shop->fcm) ,$dat);
                $data['code'] = HTTP_OK;
                $data['message'] = 'Order Placed Successfully,Check Order Status in My Orders';
                $data['result'] =['id'=>$orderId];
                $this->response($data, HTTP_OK);
        }
                $data['message'] = 'Something went wrong';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
    }

    public function Reassign_post()
    {
        if (empty($this->data['shop_id'])) {
            $data['message'] = 'Invalid Shop Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        $orderId=$this->data['order_id'];
        if($orderId){
            $shop=$this->Shop_model->getShop($this->data['shop_id']);
            $order = $this->Users_model->orderById($this->data['order_id']);
            if(empty($order)){
                    $data['message'] = 'Invalid Order';
                    $data['code'] = 408;
                    $this->response($data, HTTP_OK);
                    exit();
            }
            if($order[0]->distance<=2){
            $user = $this->Users_model->getAllFcm(1);
            if(empty($user[0]->fcm_str)){
                $user = $this->Users_model->getAllFcm(0);
            }                    
            }else{
                $user = $this->Users_model->getAllFcm(0);
            }           
            if ($user && !empty($shop)) {
                $dat['title']='New Order recieved';
                $dat['order_id']=$orderId;
                $dat['description']=$shop->name.'('.$shop->address.')';
                $dat['order_status']='0';
                $result=push_notification_android(explode(",",$user[0]->fcm_str) ,$dat);
                $data['code'] = HTTP_OK;
                $data['message'] = 'Order Re-Assigned Successfully';
                $data['result'] =['id'=>$orderId];
                $this->response($data, HTTP_OK);
            }
        }
    }

    public function pushNoti_post()
    {
        $user = $this->Users_model->UserProfile($this->data['user_id']);
        if ($user) {
            $dat['title']='New Order recieved';
            $dat['order_id']='1';
            $dat['description']='Garam Masala';
            $dat['order_status']='1';
            $result=push_notification_android([$user[0]->fcm],$dat);
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
        if (empty($this->data['user_id'])) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        $orders = $this->Users_model->getTodaysOrder($this->data['user_id'],$this->data['type'],$this->data['date']);
        if ($user) {
            $data['message'] = 'Success';
            $data['result'] = $orders;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
                $data['message'] = 'No orders found';
                $data['code'] = 408;
                $data['result'] ='No' ;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }
  

    public function List_post()
    {
        if (empty($this->data['user_id'])) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = 408;
            $this->response($data, HTTP_OK);
            exit();
        }
        $shops = $this->Shop_model->All();
        if ($shops) {
            $data['message'] = 'Success';
            $data['result'] = $shops;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
                $data['message'] = 'No shop found';
                $data['code'] = 408;
                $data['result'] ='No' ;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }
}