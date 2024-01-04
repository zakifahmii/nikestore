<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->tampil_data();
        $username = $this->session->userdata('username');
        $data['user_data'] = $this->ModelUser->getDataByUsername($username);

        // Mengirimkan semua data yang diperlukan ke view
        $this->load->view('tampilan/headerUser', $data); // Mengirimkan $data ke header
        $this->load->view('user/dashboard', $data); // Mengirimkan $data ke view user/beranda
        $this->load->view('tampilan/footerUser');
    }
}
