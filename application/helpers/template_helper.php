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
    function apptemplate($view, $data) {
        $title['title'] = $data['title'];
        $ci = &get_instance();
        $ci->load->model('Setting_model');
        $title['logo'] = $ci->Setting_model->Setting();
        $ci->load->view('appview/src/header', $data);
        $ci->load->view('appview/src/nav', $title); 
        $ci->load->view('appview/src/sidebar',$data);
        $ci->load->view('appview/src/notification', $title);
        $ci->load->view($view, $data);
        $ci->load->view('appview/src/footer', $data);
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
        $ci->db->where('shop_id',$ci->session->admin_id);
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

    function random_number($maxlength = 17) {
        /*$chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
                        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=0; $x<=$maxlength; $x++ ) {
            $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;*/
        return rand(100000000000, 999999999999);
    }

    function getOrderedProducts()
    {
        $ci = &get_instance();
        $ci->load->model('Cart_model');
        return $ci->Cart_model->OrderedProducts();
    }

    function sendSellItemOTPOwner()
    {
        // Send the POST request with cURL
        $message = "Your order has been successfully placed at PRATAP MULTI SERVICES. Your order number is $orderId. For more details, please contact us at helpline number- ".CONTACT_PERSON_NUMBER." Regards, -NextGenTech.";
        $message = urlencode($message);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://2factor.in/API/R1/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'module=TRANS_SMS&apikey='.SMS_API_KEY.'&to='.CONTACT_PERSON_NUMBER.'&from=Nxgtch&msg='.$message
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);
    }

    function sendSmsNotification($number, $message)
    {
        // Send the POST request with cURL
        $message = urlencode($message);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://2factor.in/API/R1/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'module=TRANS_SMS&apikey='.SMS_API_KEY.'&to='.$number.'&from=Nxgtch&msg='.$message
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);

        //   echo json_encode($response);die;
    }

}