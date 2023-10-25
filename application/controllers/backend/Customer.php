<?php 

class Customer extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Customer_model']);
    }

    public function index(){
         $data = [
            'title' => 'Manage Customers',
            'AllCustomers' => $this->Customer_model->AllCustomers()
         ];
         template('customer/index', $data);
    }

    public function delete($id)
    {
        if ($this->Customer_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Customer Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Customers');
    }

    public function orders($id)
    {
        $data = [
            'title' => 'Customer Orders',
            'customer_id' => $id,
            'Orders' =>$this->Customer_model->getOrderByCustomer($id)
        ];
        $data['SideBarbutton'] = ['backend/Customer', 'Back'];  
        template('customer/view_order',$data);
    }

}