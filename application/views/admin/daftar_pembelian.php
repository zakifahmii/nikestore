<style>
.td-actions {
    display: flex;
    flex-direction: row;
    gap: 1px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid">
    <h1>DAFTAR PEMBELIAN</h1><br>
    <table class="table table-boardered">
        <tr>
            <th>NO</th>
            <th>NAMA PEMBELI</th>
            <th>ALAMAT</th>
            <th>NOMOR TELEPON</th>
            <th>NAMA BARANG</th>
            <th>HARGA</th>
            <th>SUB TOTAL</th>
            <th>GAMBAR</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php foreach ($pesanan as $item) { ?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $item->nama; ?></td>
            <td><?php echo $item->alamat; ?></td>
            <td><?php echo $item->no_hp; ?></td>
            <td><?php echo $item->nama_barang; ?></td>
            <td><?php echo $item->harga; ?></td>
            <td><?php echo $item->subtotal; ?></td>
            <td><img style="width:50px" src="<?php echo base_url('assets/img/') . $item->gambar; ?>"
                    alt="<?php echo $item->gambar; ?>">
            <td class="td-actions">
                <?php echo anchor('databarang/update_status/' . $item->id_brg . '/Diproses', 'Proses', 'class="btn btn-success btn-sm" data-status="Diproses"') ?>
                <?php echo anchor('databarang/update_status/' . $item->id_brg . '/Dikirim', 'Kirim', 'class="btn btn-info btn-sm" data-status="Dikirim"') ?>
                <?php echo anchor('databarang/update_status/' . $item->id_brg . '/Ditolak', 'Tolak', 'class="btn btn-danger btn-sm" data-status="Ditolak"') ?>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Input Sepatu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'databarang/tambah'; ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.update-status').on('click', function(e) {
        e.preventDefault();

        var status = $(this).data('status');

        // Menampilkan alert dengan status yang sesuai setelah tautan diklik
        alert('Pesanan berhasil diubah menjadi: ' + status);
    });
});
</script>