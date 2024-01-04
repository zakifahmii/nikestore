<body>
    <div class="slider">
        <div class="sliderWrapper">
            <div class="sliderItem">
                <img src="<?= base_url('assets/img/'); ?>air.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">AIR FORCE</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">$119</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="<?= base_url('assets/img/'); ?>jordan.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">AIR JORDAN</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">$149</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="<?= base_url('assets/img/'); ?>blazer.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">BLAZER</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">$109</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="<?= base_url('assets/img/'); ?>crater.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">CRATER</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">$129</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="<?= base_url('assets/img/'); ?>hippie.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">HIPPIE</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">$99</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
        </div>
    </div>
    <h1>Produk</h1>
    <div class="product-container">
        <?php foreach ($barang as $item) : ?>
            <div class="product-card">
                <img src="<?= base_url('assets/img/') . $item->gambar; ?>" alt="Product Image">

                <div class="product-details">
                    <h2><?= $item->nama_barang; ?></h2>
                    <!-- <p><strong>Keterangan:</strong> <?= $item->keterangan; ?></p>
                <p><strong>Kategori:</strong> <?= $item->kategori; ?></p> -->
                    <p><strong>Harga:</strong> Rp. <?= number_format($item->harga, 0, ',', '.') ?></p>
                    <p><strong>Stok:</strong> <?= $item->stok; ?></p>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->

                    <div class="product-actions">
                        <?php echo anchor('produk/tambahKeranjang/' . $item->id_brg, '<div class="tambah">Tambah Keranjang</div>') ?>
                        <a href="<?= base_url('produk/detail/') . $item->id_brg; ?>" class="detail">Detail</a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const alertMessage = urlParams.get('cart-alert');

    if (alertMessage === 'success') {
        alert('Barang berhasil ditambahkan ke keranjang');
    }
</script>