<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Endorse extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->model('talent_model', 'talent');
        $this->load->model('product_model', 'product');
        $this->load->model('endorse_model', 'endorse');
    }
    function index()
    {
        $data['title'] = 'endorse';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['data'] = $this->talent->talent_list();
        $data['data'] = $this->product->tampil_barang();
        $data['transaction_id'] = $this->endorse->get_transaction_id();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('endorse_view', $data);
        $this->load->view('templates/footer');
    }
    function get_talent()
    {
        $tname = $this->input->post('talentname');
        $x['tln'] = $this->talent->get_talent($tname);
        $this->load->view('talent_details_view', $x);
    }
    function get_barang()
    {
        $pname = $this->input->post('productname');
        $x['brg'] = $this->product->get_barang($pname);
        $this->load->view('endorse_details_view', $x);
    }
    function add_to_cart()
    {
        $transaction_id = $this->input->post('transaction_id');
        $text_order_date = $this->input->post('text_order_date');
        $productcode = $this->input->post('codeproduct');
        $produk = $this->product->get_barang($productcode);
        $i = $produk->row_array();
        $data = array(
            'id'       => $i['product_code'],
            'name'     => $i['name'],
            'price'    => $this->input->post('price') - $this->input->post('disc'),
            'disc'     => $this->input->post('disc'),
            'qty'      => $this->input->post('qty'),
            'amount'   => $this->input->post('price')
        );

        $this->cart->insert($data);
        // var_dump($this->cart->contents());
        redirect('endorse');
    }

    function remove()
    {
        $row_id = $this->uri->segment(3);
        $this->cart->update(array(
            'rowid' => $row_id,
            'qty'   => 0
        ));
        redirect('endorse');
    }
    function simpan_penjualan()
    {
        $total = $this->input->post('total');
        $shipping_charges = $this->input->post('shipping_charges');
        $grand_total = $shipping_charges + $total;

        $transaction_id = $this->endorse->get_transaction_id();
        $order_date = $this->input->post('order_date');

        $order_proses = $this->endorse->simpan_penjualan($transaction_id, $order_date, $total, $shipping_charges, $grand_total);

        $this->cart->destroy();

        redirect('endorse');
    }

    function cetak_faktur()
    {
        $x['data'] = $this->endorse->cetak_faktur();
        $this->load->view('admin/laporan/v_faktur', $x);
        //$this->session->unset_userdata('nofak');
    }

    function fetch()
    {
        echo $this->talent->fetch_data($this->uri->segment(3));
    }
}
