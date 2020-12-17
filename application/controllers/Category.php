<?php
class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }
    function index()
    {
        $data['title'] = 'Product Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['data'] = $this->category_model->get_categories();

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('category_view', $data);
        $this->load->view('templates/footer');
    }
    function add_categories()
    {
        $cat = $this->input->post('categories');
        $this->category_model->save_categories($cat);
        redirect('category');
    }
    function edit_categories()
    {
        $code = $this->input->post('code');
        $cat = $this->input->post('category');
        $this->category_model->update_categories($code, $cat);
        redirect('category');
    }
    function delete_categories()
    {
        $code = $this->input->post('code');
        $this->category_model->delete_categories($code);
        redirect('category');
    }
}
