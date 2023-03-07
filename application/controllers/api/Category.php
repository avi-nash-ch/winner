<?php

use Restserver\Libraries\REST_Controller;

include APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/libraries/Format.php';
class Category extends REST_Controller
{
   
    public function list_post()
    {
        $this->load->model(['Category_model']);
        $All = $this->Category_model->All();
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