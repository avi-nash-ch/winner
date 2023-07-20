<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class User extends REST_Controller
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
            'Users_model',
        ]);
    }

    public function Registration_post()
    {
        $mobile = $this->data['mobile'];
        $first_name = $this->data['first_name'];
        $last_name = $this->data['last_name'];
        $email = $this->data['email'];
        $user = $this->Users_model->UserCheck($mobile);
        if ($user) {
            $data['message'] = 'Mobile Already Exist, Please Login';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
        } else {
            $postData=[
                'first_name'=>$first_name,
                'phone'=>$mobile,
                'last_name'=>$last_name,
                'email'=>$email,
                'created'=>date('Y-m-d H:i:s')
            ];
            $last_id = $this->Users_model->Registration($postData);
            $data['message'] = 'Success';
            $data['inserted_id'] = $last_id;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        }
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


    public function login_post()
    {
        $user = $this->Users_model->LoginUser($this->data['mobile']);
        if ($user) {
            $data['message'] = 'Success';
            $data['user_data'] = $user;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
                $data['message'] = 'Invalid Credentials';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }

    public function forgot_password_post()
    {
        $user_data = $this->Users_model->UserProfileByMobile($this->data['mobile']);
        if ($user_data) {
            // $msg = "Your Password is ".$user_data[0]->password.", Keep Playing Teen Patti.";
            // Send_SMS($this->data['mobile'], $msg);
            Send_OTP($this->data['mobile'], $user_data[0]->password);
            $data['message'] = 'Password Sent.';
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
            $data['message'] = 'User Not Found With This Mobile Number';
            $data['code'] = HTTP_NOT_FOUND;
            $this->response($data, HTTP_OK);
            exit();
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


    function latLongUpdate_post() {
        
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $user_id = $this->input->post('user_id');
       
        if (empty($user_id)) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, HTTP_OK);
            exit();
        }
        $result = $this->Users_model->latLongUpdate($user_id,$latitude,$longitude);
        if ($result) {
            $data['message'] = 'updated Successfully';
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
        } else {
            $data['code'] = HTTP_FORBIDDEN;
            $data['message'] = 'Something Went Wrong';
            $this->response(NULL, 200);
        }
        // curl_close($curl);
    }


    public function TodaysOrder_post()
    {
        $user = $this->Users_model->getTodaysOrder($this->data['user_id']);
        if ($user) {
            $data['message'] = 'Success';
            $data['user_data'] = $user;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
            exit();
        } else {
                $data['message'] = 'Invalid Credentials';
                $data['code'] = 408;
                $this->response($data, HTTP_OK);
                exit();
           
        }
    }
  
}