<img class="header-bg-component" src="assets/components/header-component.png">

<div id="maskot-wrap" class="maskot-wrap">
    <div class="maskot">
        <img class="main-maskot" src="assets/components/maskot-ppko.png" alt="maskot">
        <img class="alas-maskot" src="assets/components/alas-maskot.png" alt="alas-maskot">
    </div>
</div>

<!-- JUDUL WEBSITE - KERAJINAN TUNTANG -->
<div id="hero-index" class="hero">
    <header style="position: relative; z-index: 1">
        <div class="left-header">
            <img class="logo-header" src="assets/logo/logo.png">
            <button class="btn-header"><span id="btn-header"></span></button>
            <!-- <button class="btn-header">ECOTICRAFT</button> -->
        </div>
        <div class="right-header">
            <!-- <i class="menu-icon fa-solid fa-bars"></i> -->
        </div>
    </header>

    <section>
        <div class="title-hero-wrap" id="title-hero-wrap">
            <h2 class="title">
                KERAJINAN<br>
                <span>
                    ECENG<br>GONDOK
                </span>
            </h2>
            <h3 class="sub-title">
                Inspirasi Lokal Ekspor Global
            </h3>
        </div>


    </section>
</div>


<!-- PENJELASAN ECENG GONDOK -->
<div class="sub-hero" id="eceng-gondok-explain">
    <!-- Penamaan id pada tiap div sesuai backend keinginan backend, wkwk -->
    <div class="circle" id="circle-sub-hero">
        <img src="assets/logo/logo.png">
    </div>

    <div class="text" id="text-sub-hero">
        <h2>ECENG GONDOK</h2>
        <hr>
        <p>
            Stok eceng gondok mulai menipis pada pertengahan 2022 dikarenakan tidak ada penanaman ulang dan
            terjadinya pengerukan eceng gondok oleh pemerintah dalam rangka membangun wahana besar ditengah rawa
            pening. Namun sampai sekarang pembangunan wahana tersebut masih dalam bentuk wacana belum ada
            pelaksanaan berlanjut.
            <br><br>
            Eceng Gondok mulai tumbuh kembali pada akhir 2022-2023 karena mulai ada petani eceng gondok yang
            bermitra dengan Cikidul dan membantu pemasokan produksi eceng gondok sendiri.
        </p>
        <hr>
    </div>

</div>

<!-- EDUKASI ECENG GONDOK -->
<div class="sub-hero row-reverse" id="edukasi-explain">
    <!-- Penamaan id pada tiap div sesuai backend keinginan backend, wkwk -->
    <div class="circle" id="circle-sub-hero2">
        <img src="assets/logo/logo.png">
    </div>

    <div class="text" id="text-sub-hero2">
        <h2>EDUKASI DAN KERAJINAN</h2>
        <hr>
        <p>
            Edukasi tentang budidaya eceng gondok dan kerajinan dari tanaman ini sangat penting dalam memanfaatkan
            potensi yang ada di lingkungan sekitar.
            Eceng gondok, yang sering dianggap sebagai gulma air, sebenarnya memiliki nilai ekonomi yang tinggi jika
            dikelola dengan baik.
            Dalam budidayanya, masyarakat diajarkan cara mengendalikan pertumbuhan eceng gondok agar tidak merusak
            ekosistem perairan, sekaligus memanfaatkannya sebagai bahan dasar kerajinan.
            <br><br>
            Produk kerajinan dari eceng gondok, seperti tas, tikar, dan berbagai aksesoris rumah tangga, memiliki
            daya tarik tersendiri karena ramah lingkungan dan memiliki nilai estetika yang unik.
            Dengan edukasi yang tepat, masyarakat dapat mengubah tantangan lingkungan menjadi peluang ekonomi yang
            menguntungkan.
        </p>
        <hr>
    </div>

</div>


<!-- PRODUK ECENG GONDOK -->
<section class="product-section" id="product_sect">

    <div class="title-product-section-wrap">
        <span class="title-product-section">
            <h3>Produk Kerajinan</h3>
            <h1>Eceng<br>Gondok</h1>
            <h4>━━ TUNTANG ━━</h4>
        </span>
        <span class="title-product-section-link">
            <a href="product">Lihat Selengkapnya</a>
        </span>
    </div>

    <div class="product-wrap-outer" id="product-wrap-outer">
        <div class="products-wrap">

            <?php if (!empty($getAllProduct)) { ?>
                <?php foreach ($getAllProduct as $key) { ?>
                    <div class="card-product">
                        <a href="<?= $key['link'] ?>" target='_blank'>
                            <div style="background-image: url('<?= base_url('assets/products/' . $key['gambar']) ?>');" class="img-product"></div>
                            <div class="title-product">
                                <span>
                                    <h4><?= $key['nama'] ?></h4>
                                    <h5><?= $key['bahan'] ?></h5>
                                </span>
                                <span>
                                    <h4><?= "Rp " . number_format($key['harga_range'], 0, '.', '.') ?></h4>
                                </span>
                            </div>
                        </a>
                    </div>

                <?php } ?>
            <?php } ?>

        </div>
        <button class="more-button-index" id="more-product">Tampilkan Lebih Banyak</button>
    </div>

</section>



<!-- ========== UMKM SECTION ========== -->
<section class="product-section row-reverse" id="product_sect">

    <div class="title-product-section-wrap">
        <span class="title-product-section">
            <h3>Produk</h3>
            <h1>UMKM</h1>
            <h4>━━ TUNTANG ━━</h4>
        </span>
        <span class="title-product-section-link">
            <a href="umkm">Lihat Selengkapnya</a>
        </span>
    </div>

    <div class="product-wrap-outer">
        <div class="card-umkm-wrap">


            <?php if (!empty($getAllUmkm)) { $i=0; ?>
                <?php foreach ($getAllUmkm as $key) { ?>
                    <?php if($i < 6){ ?>
                    <div class="card-product">
                        <a href="umkm/view/<?= $key['id'] ?>">
                            <div style="background-image: url('<?= base_url('assets/umkm/' . $key['gambar']) ?>');" class="img-product <?= $key['gambar'] == '' ? 'no-img-product' : "" ?> "><?= $key['gambar'] == '' ? 'Gambar Tidak Tersedia :(' : "" ?></div>
                        </a>
                        <div class="title-product">
                            <span>
                                <h4><?= $key['judul'] ?></h4>
                                <h5><?= $key['alamat_lengkap'] ?></h5>
                            </span>
                        </div>
                    </div>
                <?php } ?>
                <?php $i++;} ?>
            <?php } ?>

        </div>
    </div>

</section>


<!-- PROGRAM DIKEMBANGKAN OLEH -->
<section class="about-section">

    <h2>PROGRAM <br>DIKEMBANGKAN
        <span>OLEH</span>
    </h2>

    <div class="carousel">

        <button class="btn prev">
            <svg height="35px" version="1.1" viewBox="0 0 512 512" width="35px" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M327.3,98.9l-2.1,1.8l-156.5,136c-5.3,4.6-8.6,11.5-8.6,19.2c0,7.7,3.4,14.6,8.6,19.2L324.9,411l2.6,2.3c2.5,1.7,5.5,2.7,8.7,2.7c8.7,0,15.8-7.4,15.8-16.6h0V112.6h0c0-9.2-7.1-16.6-15.8-16.6C332.9,96,329.8,97.1,327.3,98.9z" />
            </svg>
        </button>

        <div class="item active" style="background-image: url('assets/image/fotbar.png');">
            <a href="about" class="caption">
                Tim PPKO
            </a>
        </div>
        <div class="item" style="background-image: url('assets/image/img-ibuibu.jpg');">
            <a href="community" class="caption">
                Komunitas
            </a>
        </div>

        <button class="btn next">
            <svg height="35px" viewBox="0 0 512 512" width="35px" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M184.7,413.1l2.1-1.8l156.5-136c5.3-4.6,8.6-11.5,8.6-19.2c0-7.7-3.4-14.6-8.6-19.2L187.1,101l-2.6-2.3  C182,97,179,96,175.8,96c-8.7,0-15.8,7.4-15.8,16.6h0v286.8h0c0,9.2,7.1,16.6,15.8,16.6C179.1,416,182.2,414.9,184.7,413.1z" />
            </svg>
        </button>


    </div>



    <div class="dots"></div>
</section>


<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script src="js/library/typed.js"></script>
<script src="js/index.js"></script>
<script src="js/library/carousel-index.js"></script>