<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser'); // Memuat model ModelUser
        $this->load->model('ModelAdmin');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username harus diisi!',
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password harus diisi!',
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $data['user'] = '';
        } else {
            $this->_login();
        }

        $this->load->view('tampilan/auth-header', $data);
        $this->load->view('auth/login');
    }

    private function _login()
    {
        $username = $this->input->post('username', true);
        $password = ($this->input->post('password'));
        $user = $this->ModelUser->cekData(['username' => $username])->row_array();
        $admin = $this->ModelAdmin->cekData(['username' => $username])->row_array();

        if ($user && $user['password'] == $password) {
            redirect('user');
        }
        if ($admin && $admin['password'] == $password) {
            redirect('admin');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Belum diisi!!'
            ]
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            [
                'required' => 'Nama Belum diisi!!'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email' => 'Email Tidak Benar!!',
                'required' => 'Email Belum diisi!!',
                'is_unique' => 'Email Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama!!',
                'required' => 'Password Harus diisi',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'RepeatPassword',
            'required|trim|matches[password1]',
            [
                'matches' => 'Password Tidak Sama!!',
                'required' => 'Password Harus diisi',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            [
                'required' => 'Alamat Belum diisi!!'
            ]
        );
        $this->form_validation->set_rules(
            'no_hp',
            'Nomer handphone',
            'required',
            [
                'required' => 'No Handphone Belum diisi!!'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('tampilan/auth-header', $data);
            $this->load->view('auth/registrasi');
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => $this->input->post('password1'),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            ];
            $this->ModelUser->simpanData($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth');
    }
}
