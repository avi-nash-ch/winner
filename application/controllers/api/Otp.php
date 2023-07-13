<?php 
use Restserver\Libraries\REST_Controller;
include (APPPATH . '/libraries/REST_Controller.php');
include (APPPATH . '/libraries/Format.php');
class Otp extends REST_Controller {
private $data;
    public function __construct() {
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
        // if (!isset($header['Content-Type']) && $header['Content-Type']!= 'application/json') {
        //     $data['message'] = 'Invalid Data';
        //     $data['code'] = HTTP_UNAUTHORIZED;
        //     $this->response($data, HTTP_OK);
        //     exit();
        // }
        $this->load->model([
            'Users_model','Website_model'
        ]);
    }
    function index_post() {
        
        $MobileNo = $this->input->post('MobileNo');
       
        if (empty($MobileNo) || strlen($MobileNo) !== 10) {
            $data['message'] = 'Invalid Mobile Number';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, HTTP_OK);
            exit();
        }
        // $OTP = rand(100000,999999);
        $OTP = 9988;
        // $GenerateOTP = $this->Users_model->InsertOTP($MobileNo,$OTP);
         
        // Send_OTP($MobileNo,$OTP);
        $strc = true;
        if ($strc) {
            $data['message'] = 'OTP Sent Successfully';
            // $data['id'] = $this->url_encrypt->encode($GenerateOTP);
            $data['id'] = 1;
            $data['code'] = HTTP_OK;
            $this->response($data, HTTP_OK);
        } else {
            $data['code'] = HTTP_FORBIDDEN;
            $data['message'] = 'Something Went Wrong';
            $this->response(NULL, 200);
        }
        // curl_close($curl);
    }
    function statusUpdate_post() {
        
        $status = $this->input->post('status');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $fcm = $this->input->post('fcm');
        $user_id = $this->input->post('user_id');
       
        if (empty($status) || empty($user_id)) {
            $data['message'] = 'Invalid User Id';
            $data['code'] = HTTP_NOT_ACCEPTABLE;
            $this->response($data, HTTP_OK);
            exit();
        }
        $result = $this->Website_model->statusUpdate($id,$status,$latitude,$longitude,$fcm);
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
    public function VerifyOtp_post()
    {
        $result = [];
        $data = $this->Website_model->getDeleveryrData($this->input->post('mobile'));
        if (!empty($data)) {
            $check_otp = $this->Website_model->verifyotp($this->input->post('mobile'), $this->input->post('otp'));
            if (!empty($check_otp)) {
                // $user_data = array(
                //     'admin_id' => $data->id,
                //     'email' => $data->email,
                //     'name' => $data->first_name,
                // );
                // $this->Website_model->otpUpdate($check_otp->id);
                $result['message'] = 'OTP Verified Successfully';
                $result['result'] = $data;
                $result['code'] = HTTP_OK;
                $this->response($result, HTTP_OK);
                // $result['date'] = $data;
            } else {
                $result['code'] = 404;
                $result['message'] = 'Otp not matched';
                $this->response($result, 400);
            }
        } else {
            $result['code'] = 404;
            $result['message'] = 'Something went wrong.';
            $this->response($result, 400);
            // $this->session->set_flashdata('msg', array('message' => 'Email Already Exists', 'class' => 'error', 'position' => 'top-right'));
        }
        // echo json_encode($result);
    }

}
