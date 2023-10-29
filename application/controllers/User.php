<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memanggil helper 'is_logged_in' untuk memeriksa apakah pengguna sudah login
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        
        // Mengambil informasi pengguna
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Memuat tampilan dashboard dan mengirimkan data pengguna
        $this->load->view('dashboard_view', $data);
    }
    
    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('_templates/header', $data);
        $this->load->view('_templates/navbar');
        $this->load->view('_templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('_templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/navbar');
            $this->load->view('_templates/sidebar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('_templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->session->userdata('email');
        
            $upload_image = $_FILES['image']['name'];
        
            if ($upload_image) {
                $config = array(
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => 2048,
                    'upload_path' => './assets/img/profile/'
                );
        
                $this->load->library('upload', $config);
        
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    // Tampilkan pesan kesalahan validasi upload gambar
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user/edit');
                }
            }
        
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
        
            // Tampilkan pesan bahwa profil berhasil diubah
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Berhasil Diubah!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ganti Kata sandi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('_templates/header', $data);
            $this->load->view('_templates/navbar');
            $this->load->view('_templates/sidebar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('_templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            
            if (!password_verify($current_password, $data['user']['password'])) {
                // Tampilkan pesan bahwa kata sandi sekarang salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi sekarang salah!</div>');
                redirect('user/changePassword');
            } else {
                if ($current_password == $new_password) {
                    // Tampilkan pesan bahwa kata sandi baru tidak boleh sama dengan yang sekarang
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi Baru tidak boleh sama dengan yang sekarang!</div>');
                    redirect('user/changePassword');
                } else {
                    // Kata sandi sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
        
                    // Tampilkan pesan bahwa kata sandi berhasil diubah
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi berhasil diubah!</div>');
                    redirect('user/changePassword');
                }
            }
        }
    }
}
