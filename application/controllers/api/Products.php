<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Products extends REST_Controller
{
   
    public function list_post()
    {
        $this->load->model(['Product_model']);
        $All = $this->Product_model->AllProduct();
        if ($All) {
            $data = [
                'List' => $All,
                'message' => 'Success',
                'code' => HTTP_OK,
            ];
            $this->response($data, HTTP_OK);
        } else {
            $data = [
                'message' => 'No Data Found.',
                'code' => HTTP_NOT_FOUND,
            ];
            $this->response($data, HTTP_OK);
        }
    }


}