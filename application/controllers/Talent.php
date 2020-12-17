<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talent extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('talent_model', 'talent');
    }

    function index()
    {
        $data['title'] = 'Talent';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['data'] = $this->talent->talent_list();
        // $data['productcode'] = $this->product_model->create_code();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('talent_view', $data);
        $this->load->view('templates/footer');
    }

    function add_talent()
    {
        // $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $type = $this->input->post('type');
        $address = $this->input->post('address');
        $this->talent->save_talent($name, $contact, $type, $address);
        redirect('talent');
    }
    function edit_talent()
    {
        $talent_id = $this->input->post('talent_id');
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $type = $this->input->post('type');
        $address = $this->input->post('address');
        $this->talent->update_talent($talent_id, $name, $contact, $type, $address);
        redirect('talent');
    }
    function delete_talent()
    {
        $talent_id = $this->input->post('talent_id');
        $this->talent->delete_talent($talent_id);
        redirect('talent');
    }
    function fetch()
    {
        echo $this->talent->fetch_data($this->uri->segment(3));
    }
}
