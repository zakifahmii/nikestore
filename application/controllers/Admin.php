<?php
class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('tampilan/headerAdmin');
        $this->load->view('tampilan/sidebarAdmin');
        $this->load->view('admin/index');
        $this->load->view('tampilan/footerAdmin');
    }
}
