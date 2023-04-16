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


    public function productCategory_post()
    {
        $this->load->model(['Category_model']);
        $All = $this->Category_model->ProductCategory();
        if ($All) {
            foreach ($All as $key => $value) {
                $subcat = $this->Category_model->subCategory($value->id); 
            $data['list'][] = [
                'id'=>$value->id,
                'cat_name'=>$value->name,
                'image'=>$value->icon,
                'subcategory'=>$subcat
            ];
        }
        $data['message'] = 'Success';
        $data['code'] = HTTP_OK;
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