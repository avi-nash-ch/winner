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
        // $header = $this->input->request_headers('token');

        // if (!isset($header['token'])) {
        //     $data['message'] = 'Invalid Request';
        //     $data['code'] = HTTP_UNAUTHORIZED;
        //     $this->response($data, HTTP_OK);
        //     exit();
        // }

        // if ($header['token'] != getToken()) {
        //     $data['message'] = 'Invalid Authorization';
        //     $data['code'] = HTTP_METHOD_NOT_ALLOWED;
        //     $this->response($data, HTTP_OK);
        //     exit();
        // }

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
  
}