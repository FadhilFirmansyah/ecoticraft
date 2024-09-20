<div class="hero">

    <section>

        <div class="title-hero-wrap" id="title-hero-wrap">
            <h2 class="title">
                Produk<br>
                <span>
                    UMKM
                </span>
            </h2>
            <h3 class="sub-title">
                ━━ TUNTANG ━━
            </h3>
        </div>

        <div class="img-banner" id="img-banner"></div>
    </section>

</div>

<section class="grid-photo">

    <section class="justified-grid-gallery" id="grid-gallery">
        <figure style="--width: 640; --height: 520; ">
            <img src="assets/umkm/madu-manggaremas.jpg">
        </figure>
        <figure style="--width: 500; --height: 420; ">
            <img src="assets/umkm/tahubakso83.jpg">
        </figure>
        <figure style="--width: 710; --height: 580; ">
            <img src="assets/umkm/peningset.jpg">
        </figure>
        <!-- If you need something fancier, check out https://gridzy.gallery/ -->
    </section>

</section>


<section class="product-section">
    <div class="product-wrap-outer">
        <div class="products-wrap">

            <?php if (!empty($getAllUmkm)) { ?>
                <?php foreach ($getAllUmkm as $key) { ?>

                    <div class="card-product" id="umkm<?= $key['id'] ?>">
                        <a href="umkm/view/<?= $key['id'] ?>" target="_self">
                            <div style="background-image: url('assets/umkm/<?= $key['gambar'] ?>');" class="img-product <?= $key['gambar'] == '' ? 'no-img-product' : '' ?>"><?= $key['gambar'] == '' ? 'Gambar Tidak Tersedia' : '' ?></div>
                        </a>
                        <div class="title-product">
                            <span>
                                <h4><?= $key['judul'] ?></h4>
                                <h5><?= $key['alamat_lengkap'] ?></h5>
                                <div class="link-option">
                                    <a href="https://wa.me/<?= $key['no_telp'] ?>" target="_blank"><?= $key['no_telp'] ?> <img src="assets/logo/whatsapp.png"></a>
                                    <a href="<?= $key['maps'] ?>" target="_blank"><img src="assets/logo/gmaps.png"></a>
                                </div>
                            </span>
                        </div>
                    </div>

                <?php } ?>
            <?php } ?>

        </div>
    </div>
</section>

<!-- QUERY STATIC MENGGUNAKAN JSON KE GITHUB PRIBADI -->
<!-- <script src="js/umkm-query.js"></script> -->