<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('customer_model', 'customer');
    }

    function index()
    {
        $data['title'] = 'Customer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // $data['categories'] = $this->category_model->get_categories();
        $data['data'] = $this->customer->customer_list();
        // $data['productcode'] = $this->product_model->create_code();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('customer_view', $data);
        $this->load->view('templates/footer');
    }

    function add_customer()
    {
        // $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $this->customer->save_customer($name, $phone, $email, $address);
        redirect('customer');
    }
    function edit_customer()
    {
        $cust_id = $this->input->post('cust_id');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $this->customer->update_customer($cust_id, $name, $phone, $email, $address);
        redirect('customer');
    }
    function delete_customer()
    {
        $cust_id = $this->input->post('cust_id');
        $this->customer->delete_customer($cust_id);
        redirect('customer');
    }

    function get_customer_by_name()
    {
        $pname = $this->input->get('cust_name');
        $data  = $this->customer->get_customer_by_name($pname);
    
        $output = array(
            'data' => $data
        );
        echo json_encode($output);

    }

    function fetch()
    {
        echo $this->customer->fetch_data($this->uri->segment(3));
    }
}
