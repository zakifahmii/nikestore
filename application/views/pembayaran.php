<style>
.btn-total {
    margin: 28px;
    display: inline-block;
    padding: 8px 16px;
    background-color: #369e62;
    color: white;
    font-weight: bold;
}

.card {
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 20px;
    width: 60%;
}

.card-body {
    padding: 0;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: calc(100% - 16px);
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin: 8px;
    box-sizing: border-box;
}

.btn-beli {
    display: inline-block;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    background-color: #369E62;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}


.btn-beli:hover {
    color: #fff;
    background-color: #218838;
}
</style>
<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>auth.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn-total">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "Total Belanja Anda: Rp." . number_format($grand_total, 0, ',', '.');

                ?>
            </div>
        </div>
        <!-- Input -->
        <div class="container">
            <div class="card">
                <h2>Input Alamat Pengiriman dan Pembayaran</h2><br>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('produk/proses_pesanan'); ?>">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap Anda"">
                        </div>
                        <div class=" form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat Rumah Anda">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input class="form-control" type="text" name="no_hp" placeholder="Nomor Telepon Anda">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nama Barang</label>
                            <input class="form-control" type="text" name="no_hp" placeholder="Nomor Telepon Anda"
                                value="<?php echo isset($barang['nama_barang']) ? $barang['nama_barang'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Jumlah</label>
                            <input class="form-control" type="text" name="no_hp" placeholder="Nomor Telepon Anda">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Sub Total</label>
                            <input class="form-control" type="text" name="no_hp" placeholder="Nomor Telepon Anda">
                        </div>
                        <div class="form-group">
                            <label for="jasa">Jasa Pengiriman</label>
                            <select class="form-control" name="jasa_pengiriman">
                                <option value="">JNE</option>
                                <option value="">JNT</option>
                                <option value="">GOJEK</option>
                                <option value="">GRAB</option>
                                <option value="">DROP BOX</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bank">Pilih Bank</label>
                            <select class="form-control" name="bank">
                                <option value="">BCA</option>
                                <option value="">BNI</option>
                                <option value="">MANDIRI</option>
                                <option value="">BSI</option>
                                <option value="">BRI</option>
                            </select>
                        </div>
                        <a href="<?php echo base_url('produk/proses_pesanan') ?>">
                            <div class="btn-beli">Beli</div>
                        </a>
                    </form>
                    <?php
                } else {
                    echo "Keranjang Belanja Anda Kosong";
                }
                ?>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>