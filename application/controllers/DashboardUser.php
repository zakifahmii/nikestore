<?php
class DashboardUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
    }

    public function index()
    {
        $data['barang'] = $this->ModelBarang->tampil_data()->result();
        $this->load->view('tampilan/headerUser');
        $this->load->view('dashboard', $data);
        $this->load->view('tampilan/footerUser');
    }

    
}
