<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="hero">

        <header>
            <div>
                <img src="<?= base_url('assets/logo/logo.png') ?>" alt="logo" class="logo-header">
                <h4>ECOTICRAFT</h4>
            </div>
        </header>

        <section>
            
            <div class="title-hero-wrap" id="title-hero-wrap">
                <h2 class="title">
                    KOMUNITAS<br>
                    <span>
                        TUNTANG
                    </span>
                </h2>
                <h3 class="sub-title">
                    Inspirasi Lokal Ekspor Global
                </h3>
            </div>

            <div class="img-banner" style="background-image: url('assets/image/img-ibuibu.jpg');"></div>
        </section>    
        
    </div>

    <main>

        <article>
            <p>Cikidul Eceng Gondok, merupakan komunitas desa Tuntang, Dusun cikal, yang memiliki kepanjangan Cikal Kidul Eceng Gondok. Cikal Kidul ini sudah lama berdiri dari sebelum covid dan berlanjut hingga sekarang. Kegiatan Cikidul Community sendiri adalah mengolah kerajinan dan budaya yang berada di Desa Tuntang, Ambarawa, Dusun Cikal. Kerajinan dan budaya tersebut meliputi pembuatan singkong, sayur-sayuran segar dan besar, dan Eceng Gondok.</p>
            <p>Namun Cikidul Eceng Gondok Community lebih berfokus kepada kerajinan Eceng Gondok yang marketing nya bisa mencapai penjualan antar kota bahkan antar provinsi. Pengrajin-pengrajin dari Cikidul Community pun berasal dari Desa Tuntang, beberapa kalangan muda taruna desa juga mengikuti komunitas tersebut.</p>
        </article>

    </main>

    <a href="/" class="back-btn" id="flow_btn"><img src="assets/icon/left-arrow.png">Kembali</a>

    <footer>
        <?= $this->include('layouts/footer') ?>
    </footer>
    
    <script src="js/library/live_view.js"></script>
    <script src="js/library/btn_animation.js"></script>

    <?= $this->endSection() ?>