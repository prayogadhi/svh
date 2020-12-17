<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->load->model('category_model');
        // $this->load->model('product_model');
        $this->load->model('sales_model');
    }

    function index()
    {
        $data['title'] = 'Sales List';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // $data['categories'] = $this->category_model->get_categories();
        $data['data'] = $this->sales_model->get_sales();
        // $data['productcode'] = $this->product_model->create_code();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sales_list_view', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_get_sales_by_id()
    {
        $transaction_id = $this->input->get('transaction_id');
        $data = $this->sales_model->get_sales_by_id($transaction_id);
        $output = array(
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function show_sales_list()
    {
        $output = '';
        $no     = 0;
        $data = $this->sales_model->get_sales();
        //<a href='.base_url() . 'sales/remove/' .$items['rowid'].' class="remove_cart remove-item"><i class="pg-close"></i></a>
        foreach ($data as $value) {
            $no++;
            $stat  = '';
            switch ($value->status) {
                case "Proses":
                    $stat = '<span class="label label-important">Diproses</span>';
                    break;
                case "Kirim":
                    $stat =  '<span class="label label-warning">Dikirim</span>';
                    break;
                case "Terima":
                    $stat = '<span class="label label-success">Diterima</span>';
                    break;
                default:
                    $stat = '';
            }
            $output .= '
            <tr>
                <td>' . $value->order_date . '</td>
                <td>' . $value->transaction_id . '</td>
                <td>' . $value->cust_name . '</td>
                <td>' . 2 . '</td>
                <td>' . $value->total . '</td>
                <td>' . $stat . '</td>
                <td>
                    <div class="dropdown pull-right d-none d-lg-block d-xl-block">
                        <a href="#" class="btn btn-primary btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false">
                           <i class="pg-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right action-dropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#" onclick="modal_delete()"><i class="fa fa-trash-o"></i> Delete</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="dropdown-item" href="#" onclick="get_modal_status(`' . $value->transaction_id . '`)" ><i class="fa fa-leaf"></i> Status</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_member"><i class="fa fa-eye"></i> View</a>
                        </div>
                    </div>
                        <div class="text-center">
                             <div class="btn-group sm-m-t-10 d-lg-none">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#" onclick="modal_delete()"><i class="fa fa-trash-o"></i></button>
                                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                <button type="button" class="btn btn-default" onclick="get_modal_status(`' . $value->transaction_id . '`)"><i class="fa fa-leaf"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_member"><i class="fa fa-eye"></i></button>
                             </div>
                        </div>
                </td>
            </tr>';
        }
        return $output;
    }

    public function load_sales_list()
    {

        echo $this->show_sales_list();
    }

    public function update_status()
    {
        $id     = $this->input->post('transaction_id');
        $status = $this->input->post('status');
        $save   = $this->sales_model->update_status_sales($status, $id);
        echo $this->show_sales_list();
        # code...
    }

    // $data['data'] = $this->m_barang->tampil_barang();
    // $data['kat'] = $this->m_kategori->tampil_kategori();
    // $data['kat2'] = $this->m_kategori->tampil_kategori();
    // $this->load->view('admin/v_barang', $data);

    function add_product()
    {
        // if ($this->session->userdata('akses') == '1') {
        $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $this->product_model->save_product($product_code, $name, $category, $price, $stock);

        redirect('product');
    }
    function edit_product()
    {
        // if ($this->session->userdata('akses') == '1') {

        $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $this->product_model->update_product($product_code, $name, $category, $price, $stock);
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
