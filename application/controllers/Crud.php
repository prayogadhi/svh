<?php
class Crud extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables'); //load library ignited-dataTable
        $this->load->model('crud_model'); //load model crud_model
    }
    function index()
    {
        $data['title'] = 'Product Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['kategori'] = $this->crud_model->get_kategori();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('crud_view', $data);
        $this->load->view('templates/footer');
    }

    function get_produk_json()
    { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->crud_model->get_all_produk();
    }

    function simpan()
    { //function simpan data
        $data = array(
            'barang_kode'     => $this->input->post('kode_barang'),
            'barang_nama'     => $this->input->post('nama_barang'),
            'barang_harga'    => $this->input->post('harga'),
            'barang_kategori_id' => $this->input->post('kategori')
        );
        $this->db->insert('barang', $data);
        redirect('crud');
    }

    function update()
    { //function update data
        $kode = $this->input->post('kode_barang');
        $data = array(
            'barang_nama'     => $this->input->post('nama_barang'),
            'barang_harga'    => $this->input->post('harga'),
            'barang_kategori_id' => $this->input->post('kategori')
        );
        $this->db->where('barang_kode', $kode);
        $this->db->update('barang', $data);
        redirect('crud');
    }

    function delete()
    { //function hapus data
        $kode = $this->input->post('kode_barang');
        $this->db->where('barang_kode', $kode);
        $this->db->delete('barang');
        redirect('crud');
    }
}
