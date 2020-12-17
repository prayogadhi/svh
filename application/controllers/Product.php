<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        $this->load->model('product_model');
    }
    function index()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['categories'] = $this->category_model->get_categories();
        $data['data'] = $this->product_model->tampil_barang();
        $data['productcode'] = $this->product_model->create_code();

        $this->load->helper('url');
        $this->load->helper('activity_helper');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product_view', $data);
        $this->load->view('templates/footer');
    }

    // $data['data'] = $this->m_barang->tampil_barang();
    // $data['kat'] = $this->m_kategori->tampil_kategori();
    // $data['kat2'] = $this->m_kategori->tampil_kategori();
    // $this->load->view('admin/v_barang', $data);

    function add_product()
    {
        $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $price = $this->input->post('price');
        $stock1 = $this->input->post('stock1');
        $stock2 = $this->input->post('stock2');
        $stock3 = $this->input->post('stock3');

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path']          = './upload/product/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data("file_name");
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->product_model->save_product($product_code, $name, $category, $price, $stock1, $stock2, $stock3, $image);
        if ($this->db->affected_rows() > 0) {
            $assign_to  = '';
            $assign_type = '';
            activity_log("inventori", "menambah stok", $product_code, $assign_to, $assign_type);
            return true;
        } else {
            return false;
        }

        redirect('Product');
    }
    function edit_product()
    {
        // if ($this->session->userdata('akses') == '1') {

        $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $price = $this->input->post('price');
        $stock1 = $this->input->post('stock1');
        $stock2 = $this->input->post('stock2');
        $stock3 = $this->input->post('stock3');
        $this->product_model->update_product($product_code, $name, $category, $price, $stock1, $stock2, $stock3);
        $assign_to  = '';
        $assign_type = '';
        activity_log("inventori", "editing product info", $product_code, $assign_to, $assign_type);
        redirect('product');
    }
    function delete_product()
    {
        $product_code = $this->input->post('product_code');
        $this->product_model->delete_product($product_code);
        redirect('product');
    }
    function fetch()
    {
        echo $this->product_model->fetch_data($this->uri->segment(3));
    }
}
