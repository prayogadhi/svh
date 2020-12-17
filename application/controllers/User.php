<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['data'] = $this->user->user_list();

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_user()
    {
        $user_id = $this->input->post('user_id');
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $image = $this->input->post('image');
        $password = $this->input->post('password');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');
        $date_created = $this->input->post('password');


        // $upload_image = $_FILES['image']['name'];

        // if ($upload_image) {
        //     $config['upload_path']          = './upload/product/';
        //     $config['allowed_types']        = 'gif|jpg|png';

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('image')) {
        //         $image = $this->upload->data("file_name");
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }

        $this->user->save_user($user_id, $name, $username, $image, $password, $role_id, $is_active, $date_created);

        redirect('user');
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }

        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // $this->form_validation->set_rules('username', 'username', 'required|trim|valid_username|is_unique[user.username]', [
        //     'is_unique' => 'This username has already registered!'
        // ]);
        // $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[4]|matches[pass2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);
        // $this->form_validation->set_rules('pass2', 'Password', 'required|trim|min_length[4]|matches[pass1]');

        // if ($this->form_validation->run() == false) {
        //     $data['title'] = 'Registration Page';
        //     $this->load->view('templates/auth_header', $data);
        //     $this->load->view('auth/registration');
        //     $this->load->view('templates/auth_footer');
        // } else {
        //     $data = [
        //         'name' => htmlspecialchars($this->input->post('name', true)),
        //         'username' => htmlspecialchars($this->input->post('username', true)),
        //         'image' => 'default.jpg',
        //         'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
        //         'role_id' => 2,
        //         'is_active' => 1,
        //         'date_created' => time()
        //     ];

        //     $this->db->insert('user', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert"></button><strong>Success: </strong>The page has been added.</div>');
        // }
    }

    function delete_user()
    {
        $id = $this->input->post('id');
        $this->user->delete_user($id);
        redirect('user');
    }
}
