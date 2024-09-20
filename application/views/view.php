<main id="main">

    <h1><?= $getUmkm['judul'] ?></h1>

    <section class="main-content">
        <div style="background-image: url('<?php echo base_url('assets/umkm/' . $getUmkm['gambar']) ?>');" class="img-banner">
            <?= $getUmkm['gambar'] != "" ? "" : "gambar tidak tersedia :(" ?>
        </div>

        <aside>
            <p>
                <?= $getUmkm['deskripsi'] ?>
            </p>
            <p>
                <?= $getUmkm['alamat_lengkap'] ?>
            </p>
            <h4>
                <?= $getUmkm['pemilik'] != "" ? "Oleh " . $getUmkm['pemilik'] : "" ?>
            </h4>

            <div class="link-option">
                <a href="https://wa.me/<?= $getUmkm['no_telp'] ?>" target="_blank"><?= $getUmkm['no_telp'] ?> <img src="<?= base_url('assets/logo/whatsapp.png') ?>"
                        alt="wa"></a>
                <a href="<?= $getUmkm['maps'] ?>"
                    target="_blank">Google Maps <img src="<?= base_url('assets/logo/gmaps.png') ?>" alt="maps"></a>
            </div>
        </aside>


    </section>

</main>

<section class="umkm-product" id="umkm-product">
    <h3 class="title-umkm-product" id="title-umkm-product"><?= json_decode($getUmkm['produk_lain']) != null || !empty(json_decode($getUmkm['produk_lain'])) ? "Produk " . $getUmkm['pemilik'] : "" ?></h3>

    <div class="product-wrap" id="product-wrap">

        <?php foreach (json_decode($getUmkm['produk_lain']) as $key) { ?>

            <?php if ($key->judul != "") { ?>

                <div class="product">
                    <div class="img" style="background-image: url('<?= base_url('assets/umkm/produk_lain/' . $key->gambar) ?>');"></div>
                    <aside>
                        <h4><?= $key->judul ?></h4>
                        <p><?= $key->deskripsi ?></p>
                        <p><?= $key->harga != null || $key->harga != "" ? number_format($key->harga, 0 ,",", ".") : "" ?></p>
                    </aside>
                </div>

            <?php } else { ?>
                    <h4>Produk belum ditambahkan</h4>
            <?php } ?>
        <?php } ?>

    </div>

</section>

<div class="contact-wrap">
    <a id="contact-link" target="_blank" href="https://wa.me/<?= $getUmkm['no_telp'] ?>"><img src="<?= base_url('assets/logo/whatsapp.png') ?>"
            alt="wa"> <span id="contact-name"><?= $getUmkm['pemilik'] ?></span></a>
</div>


<!-- <script src="js/view-umkm.js"></script> -->