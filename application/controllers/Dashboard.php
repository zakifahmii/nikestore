<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('tampilan/headerCalonUser');
        $this->load->view('dashboard');
        $this->load->view('tampilan/footerUser');
    }
}