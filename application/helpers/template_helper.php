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

    function getSubcategory($cat_id)
    {
        $ci = &get_instance();
        $ci->load->model('ProductCategory_model');
        return $ci->ProductCategory_model->AllSubCategory($cat_id,6);
    }

}