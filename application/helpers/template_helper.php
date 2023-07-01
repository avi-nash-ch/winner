<?php

if (!function_exists('render')) {

    function template($view, $data) {
        $title['title'] = $data['title'];
        $ci = &get_instance();
        $ci->load->model('Setting_model');
        $title['logo'] = $ci->Setting_model->Setting();
        $ci->load->view('src/header', $data);
        $ci->load->view('src/nav', $title);
        $ci->load->view('src/sidebar',$data);
        $ci->load->view('src/notification', $title);
        $ci->load->view($view, $data);
        $ci->load->view('src/footer', $data);
    }
    function website($view, $data) {
        $title['title'] = $data['title'];
        $ci = &get_instance();
        $ci->load->model('Setting_model');
        $ci->load->view('website/src/header', $data);
        $ci->load->view('website/src/nav', $title);
        $data['Setting'] = $ci->Setting_model->Setting();
        $ci->load->view($view, $data);
        $ci->load->view('website/src/footer', $data);
    }
  

    function getProductName($id) {
      
        $ci = &get_instance();
        $ci->db->select('name');
        $ci->db->from('tbl_product');
        $ci->db->where('id',$id);
        $Query=$ci->db->get();
        return $Query->row();
    }

    function getAllProduct() {
      
        $ci = &get_instance();
        $ci->db->select('id,name,price_sale');
        $ci->db->from('tbl_product');
        $ci->db->where('isDeleted',false);
        $Query=$ci->db->get();
        return $Query->result();
    }

    function getSellsCategories()
    {
        $ci = &get_instance();
        $ci->load->model('SellCategory_model');
        return $ci->SellCategory_model->All();
    }

    function getStates()
    {
        $ci = &get_instance();
        $ci->load->model('Setting_model');
        return $ci->Setting_model->getStates();
    }

    function getCart()
    {
        $ci = &get_instance();
        $ci->load->model('Cart_model');
        return $ci->Cart_model->All();
    }

    function getSubcategory($cat_id)
    {
        $ci = &get_instance();
        $ci->load->model('ProductCategory_model');
        return $ci->ProductCategory_model->AllSubCategory($cat_id,6);
    }

    function getColorNameByNumber($number)
    {
        $color = '';
        switch ($number) {
            case '1':
                $color = 'White';
                break;
            case '2':
                $color = 'Red';
                break;
            case '3':
                $color = 'Blue';
                break;
            case '4':
                $color = 'Green';
                break;
            case '5':
                $color = 'Yellow';
                break;
            case '6':
                $color = 'Pink';
                break;
            case '7':
                $color = 'Black';
                break;
            case '8':
                $color = 'Brown';
                break;
            
            default:
                # code...
                break;
        }
        return $color;
    }

    function getSizeNameByNumber($number)
    {
        $size = '';
        switch ($number) {
            case '1':
                $size = 'L';
                break;
            case '2':
                $size = 'XL';
                break;
            case '3':
                $size = 'M';
                break;
            case '4':
                $size = 'S';
                break;
            
            default:
                # code...
                break;
        }
        return $size;
    }

}