<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DataBarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
    }

    public function index()
    {
        $data['barang'] = $this->ModelBarang->tampil_data();
        $this->load->view('tampilan/headerAdmin');
        $this->load->view('tampilan/sidebarAdmin');
        if ($this->session->flashdata('success')) {
            echo '<script>alert("' . $this->session->flashdata('success') . '");</script>';
        }
        if ($this->session->flashdata('delete')) {
            echo '<script>alert("' . $this->session->flashdata('delete') . '");</script>';
        }
        $this->load->view('admin/barang', $data);
        $this->load->view('tampilan/footerAdmin');
    }

    public function tambah()
    {
        $nama_barang = $this->input->post('nama_barang');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar != '') {
            // Lanjutkan dengan pengolahan gambar
            $config['upload_path'] = './uploads';
            $config['allowed_types']  = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }

            $data = array(
                'nama_barang' => $nama_barang,
                'keterangan' => $keterangan,
                'kategori' => $kategori,
                'harga' => $harga,
                'stok' => $stok,
                'gambar' => $gambar
            );

            $this->ModelBarang->tambah_barang($data, 'tb_barang');
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('databarang/index');
        }
    }
    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->ModelBarang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('tampilan/headerAdmin');
        $this->load->view('tampilan/sidebarAdmin');
        $this->load->view('admin/editbarang', $data);
        $this->load->view('tampilan/footerAdmin');
    }
    public function update()
    {
        $id = $this->input->post('id_brg');
        $nama_barang = $this->input->post('nama_barang');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_barang' => $nama_barang,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
        );

        $where = array(
            'id_brg' => $id
        );

        $this->ModelBarang->update_data($where, $data, 'tb_barang');
        redirect('databarang');
    }

    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->ModelBarang->hapus_data($where, 'tb_barang');
        $this->session->set_flashdata('delete', 'Data berhasil dihapus');
        redirect('databarang');
    }
    public function daftarPembelian()
    {
        $this->load->model('ModelPesanan');
        $data['pesanan'] = $this->ModelPesanan->getAllPesanan();
        $this->load->view('tampilan/headerAdmin');
        $this->load->view('tampilan/sidebarAdmin');
        $this->load->view('admin/daftar_pembelian', $data);
        $this->load->view('tampilan/footerAdmin');
    }
    public function update_status($id_barang, $status)
    {
        $data = array(
            'status' => $status
        );

        $this->db->where('id_brg', $id_barang);
        $this->db->update('tb_pesanan', $data);

        redirect('databarang/daftarPembelian');
    }
}
