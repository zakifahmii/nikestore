<?php
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
    }
    public function index()
    {
        $data['barang'] = $this->ModelBarang->tampil_data();
        $this->load->view('tampilan/headerUser');
        $this->load->view('produk/index', $data);
        $this->load->view('tampilan/footerUser');
    }
    public function tambahKeranjang($id)
    {
        $barang = $this->ModelBarang->find($id);
        $data = array(
            'id' => $barang->id_brg,
            'qty' => 1,
            'price' => $barang->harga,
            'name' => $barang->nama_barang
        );
        $this->cart->insert($data);
        redirect('produk?cart-alert=success');
        redirect('produk');
    }
    public function dtl_keranjang()
    {
        $this->load->view('tampilan/headerUser');
        $this->load->view('keranjang/index');
        $this->load->view('tampilan/footerUser');
    }

    public function hapusData()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('success_message', 'Data berhasil dihapus.');
        redirect('produk/dtl_keranjang');
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->ModelBarang->detail_brg($id_brg);
        $this->load->view('tampilan/headerUser');
        $this->load->view('produk/dtl_produk', $data);
        $this->load->view('tampilan/footerUser');
    }
    public function beli()
    {
        $this->load->view('tampilan/headerUser');
        $this->load->view('pembayaran');
        $this->load->view('tampilan/footerUser');
    }
    public function bayar()
    {
        if ($this->input->post()) {
            $data = array(
                'id_barang' => $this->input->post('id_barang'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga'),
                'jumlah' => $this->input->post('jumlah'),
                'subtotal' => $this->input->post('subtotal'),
                'gambar' => $this->input->post('gambar'),
                'status' => $this->input->post('status')
            );
            $this->load->model('ModelPesanan');
            $this->ModelPesanan->simpanPesanan($data);

            // Redirect ke halaman yang sesuai
            redirect('produk/dtl_keranjang');
        } else {
            // Tampilkan halaman pembayaran dengan data barang
            $data['barang'] = $this->ModelBarang->tampil_data();
            $this->load->view('keranjang/index', $data);
        }
    }


    public function form_pesanan()
    {
        // Memuat model ModelUser
        $this->load->model('ModelUser');

        // Mengambil nama pengguna dari sesi jika tersedia
        $nama = $this->session->userdata('nama'); // Ganti dengan nama sesi yang berisi nama pengguna

        if ($nama) {
            // Mengambil informasi pengguna dari model berdasarkan nama pengguna
            $data['pengguna'] = $this->ModelUser->getDataByUsername($nama);

            // Menampilkan view dan mengirimkan data pengguna
            $this->load->view('pembayaran', $data);
        } else {
            // Sesi tidak tersedia, mungkin pengguna belum login atau sesi telah berakhir
            // Lakukan sesuatu, seperti redirect ke halaman login
            redirect('auth'); // Ganti dengan halaman login Anda
        }
    }
    // Di dalam controller
    public function proses_pesanan()
    {
        $this->cart->destroy();
        $this->load->view('tampilan/headerUser');
        $this->load->view('proses_pesanan');
        $this->load->view('tampilan/footerUser');
    }
}
