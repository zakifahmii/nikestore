<style>
h2 {
    margin: 1cm 0px 1cm 6.4cm;
}

/* Style untuk tabel */
table {
    margin-left: 6.4cm;
    width: 60%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid #ddd;
}

th,
td {
    padding: 8px;
    text-align: left;
}

.actions {
    margin: 1cm 0px 0px 6.4cm;
}

/* Gaya dasar untuk tombol */
.btn-hapus,
.btn-beli,
.btn-kembali {
    display: inline-block;
    padding: 10px 26px;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-kembali {
    margin-left: 5.7cm;
}

/* Gaya khusus untuk tombol Hapus */
.btn-hapus {
    background-color: #ff4d4d;
    color: white;
}

/* Gaya khusus untuk tombol Beli */
.btn-beli {
    background-color: #369e62;
    color: white;
}

/* Efek hover */
.btn-hapus:hover,
.btn-beli:hover {
    opacity: 0.8;
}
</style>

<div class="container-fluid">
    <h2>Halaman Keranjang</h2>
    <a href="<?php echo base_url('produk/index') ?>">
        <div class="btn-kembali">← Kembali</div>
    </a>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub Total</th>
        </tr>
        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $items['name'] ?></td>
            <td><?php echo $items['qty'] ?></td>
            <td>Rp. <?php echo number_format($items['price'], 0, ',', '.')  ?></td>
            <td>Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
        </tr>
        <?php
        endforeach;
        ?>
        <tr>
            <td colspan="4"><b>Total</b></td>
            <td>Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>
    </table>
    <div class="actions">
        <a href="<?php echo base_url('produk/hapusData') ?>" id="hapusButton">
            <div class="btn-hapus">Hapus</div>
        </a>
        <a href="<?php echo base_url('produk/beli') ?>">
            <div class="btn-beli">Beli</div>
        </a>
    </div>
</div>

<script>
document.getElementById('hapusButton').addEventListener('click', function(event) {
    if (!confirm('Anda yakin ingin menghapus seluruh produk dikeranjang anda?')) {
        event.preventDefault(); // Mencegah aksi default dari link jika pengguna membatalkan penghapusan
    } else {
        // Jika pengguna mengonfirmasi penghapusan, tampilkan notifikasi
        alert('Data berhasil dihapus');
    }
});
</script>