<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>dtl_produk.css">
</head>

<body>
    <?php foreach ($barang as $brg) : ?>
        <div class="card">
            <h3 class="card-header">Detail Produk</h3>
            <img src="<?php echo base_url() . 'assets/img/' . $brg->gambar ?>" class="card-img-top">
            <div class="container">
                <table class="table">
                    <tr>
                        <td>Nama Produk</td>
                        <td><strong><?php echo $brg->nama_barang ?></strong></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><strong><?php echo $brg->keterangan ?></strong></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><strong><?php echo $brg->stok ?></strong></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><strong>
                                <div class="btn btn-sm">Rp. <?php echo number_format($brg->harga, 0, ',', '.')  ?></div>
                            </strong></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <div class="product-actions">
                <?php echo anchor('produk/tambahKeranjang/' . $brg->id_brg, '<div class="tambah">Tambah Keranjang</div>') ?>
                <a href="<?= base_url('produk/index') ?>" class="kembali">Kembali</a>
            </div>
            </div>
        </div>

</body>

</html>