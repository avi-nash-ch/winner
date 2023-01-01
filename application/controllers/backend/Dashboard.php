<?php

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Product_model', 'Users_model']);
    }

    public function index()
    {
        redirect('backend/dashboard/admin');
    }

    public function admin()
    {
        $data = [
            'title' => 'Dashboard',
            'Products' => $this->Product_model->AllProduct(),
            'TodaysSale' => $this->Product_model->TodaysSale()
        ];
        // $data['ActiveUser'];
        // exit;
        template('dashboard/manufacturer', $data);
    }

    public function generateBill()
    {
        $result = [];
        if (!empty($this->input->post())) {
            
            $html = $this->load->view('bill_template', $this->input->post(), true);



            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [152.4, 100], 'orientation' => 'p', 'margin_top' => 1, 'margin_bottom' => 0.3, 'margin_left' => 0.5, 'margin_right' => 0.5]);
            //generate the PDF from the given html
            $mpdf->SetJS('this.print();');
            $mpdf->WriteHTML($html);

            $file = 'pass' . time() . '.pdf';
            $file_name = 'assets/pass_pdf/' . $file;
            //download it.
            $mpdf->Output($file_name, 'F');
            $result = ['file_name' => $file_name, 'response' => true, 'msg' => 'success'];
        } else {
            $result = ['response' => false, 'msg' => 'Invalid Param'];
        }

        foreach ($this->input->post('item_desc') as $key => $value) {
            $data[] = [
                'product_id' => $value,
                'customer_name' => $this->input->post('customer_name'),
                'mobile_no' => $this->input->post('mobile_no'),
                'qty' => $this->input->post('qty')[$key],
                'price' => $this->input->post('price')[$key],
                'added_date' => date('Y-m-d H:i:s')
            ];
        }
        $last_id = $this->Product_model->AddOrderItemMapping($data);

        echo json_encode($result);
    }
}