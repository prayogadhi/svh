<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('sales_model', 'sales');
        $this->load->model('customer_model', 'customer');
        // $this->load->model('customer_model', 'customer');
    }
    function index()
    {
        $data['title'] = 'Sales';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['data'] = $this->product->tampil_barang();
        $data['transaction_id'] = $this->sales->get_transaction_id();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sales_view', $data);
        $this->load->view('templates/footer');
    }

    function get_barang()
    {
        $pname = $this->input->post('productname');
        $x['brg'] = $this->product->get_barang($pname);
        $this->load->view('sales_details_view', $x);
    }

    function get_stock_barang()
    {
        $id       = $this->input->get('id_product');
        $stock    = $this->input->get('stock');
        $barang   = $this->product->get_barang_by_code($id);
        $jmlStock = 0;

        if ($stock == 'WhatsApp') {
            # code...
            $jmlStock = $barang[0]->stock1;
        } elseif ($stock == 'Shopee') {
            # code...
            $jmlStock = $barang[0]->stock2;
        } elseif ($stock == 'Websites') {
            # code...
            $jmlStock = $barang[0]->stock3;
        }

        $output = array(
            "data" => $jmlStock,
        );

        echo json_encode($output);
    }

    function add_to_cart()
    {
        // $transaction_id = $this->input->post('transaction_id');
        // $order_date = $this->input->post('order_date');
        $pname = $this->input->post('productname');
        $produk = $this->product->get_barang($pname);
        $stock_order = $this->input->post('stock_order');
        $i = $produk->row_array();
        $data = array(
            'id'           => $i['product_code'] . $this->input->post('stock_order'),
            'product_code' => $i['product_code'],
            'name'         => $i['name'],
            'price'        => $this->input->post('price') - $this->input->post('disc'),
            'disc'         => $this->input->post('disc'),
            'qty'          => $this->input->post('qty'),
            'amount'       => $this->input->post('price'),
            'stock_order'  => $this->input->post('stock_order'),
        );

        $this->cart->insert($data);
        echo $this->show_cart();
        // echo "<pre>";
        // print_r($data);
        // print_r($this->cart->contents());
        // echo "</pre>";
        // redirect('sales');
    }

    function show_cart()
    {
        $output = '';
        $no     = 0;
        //<a href='.base_url() . 'sales/remove/' .$items['rowid'].' class="remove_cart remove-item"><i class="pg-close"></i></a>
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
            ' . form_hidden($no . '[rowid]', $items['rowid']) . '
            <tr>   
                <td><button type="button" id="' . $items['rowid'] . '" class="remove_cart remove-item btn btn-danger"><i class="pg-close"></i></button></td>
                <td>' . $items['name'] . '</td>
                <td>' . $items['stock_order'] . '</td>
                
                <td class="autonumeric" data-a-sign="Rp " data-a-dec="," data-a-sep=".">' . "Rp " . number_format($items['amount'], 0, ',', '.') . '</td>
                <td>' . $items['disc'] . '</td>
                <td>' . $items['qty'] . '</td>
                <td class="autonumeric" data-a-sign="Rp " data-a-dec="," data-a-sep=".">' . "Rp " . number_format($items['subtotal'], 0, ',', '.') . '</td>
            </tr>';
        }
        return $output;
    }

    function load_cart()
    {
        echo $this->show_cart();
    }

    function load_total_cart()
    {

        $data = $this->cart->total();

        $output = array(
            "data" => $data,
        );

        echo json_encode($output);
    }

    function add_customer()
    {
        // $product_code = $this->input->post('product_code');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $this->customer->save_customer($name, $phone, $email, $address);
        redirect('sales');
    }

    function remove()
    {
        //$row_id = $this->uri->segment(3);
        $this->cart->update(array(
            'rowid' => $this->input->post('row_id'),
            'qty'   => 0
        ));
        echo $this->show_cart();
    }
    function simpan_penjualan()
    {
        $total = $this->input->post('total');
        $shipping_charges = $this->input->post('shipping_charges');
        $grand_total = $shipping_charges + $total;

        $order_date = $this->input->post('order_date');
        $order_from = $this->input->post('order_from');
        $transaction_id = $this->sales->get_transaction_id();

        $name = $this->input->post('cust_name');
        $phone = $this->input->post('cust_phone');
        $email = $this->input->post('cust_email');
        $address = $this->input->post('cust_address');

        $cust_id     = $this->input->post('cust_id');
        $cust_id_new = '';

        if ($cust_id == '' or $cust_id == NULL) {
            $this->customer->save_customer($name, $phone, $email, $address);
            $data  = $this->customer->get_customer_by_name($name);
            $cust_id_new = $data[0]->cust_id;
            $order_proses = $this->sales->simpan_penjualan($transaction_id, $order_date, $order_from, (int) $cust_id_new, $total, $shipping_charges, $grand_total);
        } else {
            $order_proses = $this->sales->simpan_penjualan($transaction_id, $order_date, $order_from, (int) $cust_id, $total, $shipping_charges, $grand_total);
        }

        //$order_proses = $this->sales->simpan_penjualan($transaction_id, $order_date, $total, $shipping_charges, $grand_total);

        $this->cart->destroy();

        redirect('sales');
    }

    function cetak_faktur()
    {
        $x['data'] = $this->sales->cetak_faktur();
        $this->load->view('admin/laporan/v_faktur', $x);
        //$this->session->unset_userdata('nofak');
    }

    function fetch()
    {
        echo $this->product->fetch_data($this->uri->segment(3));
    }
}
