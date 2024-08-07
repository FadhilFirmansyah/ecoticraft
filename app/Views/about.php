<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class="hero">

        <header>
            <div>
                <img src="assets/logo/logo.png" alt="logo" class="logo-header">
                <h4>ECOTICRAFT</h4>
            </div>
        </header>
        
        <div style="background-image: url('assets/image/fotbar.png');" class="banner">

            <div class="title-banner">
                <h1>TIM PPKO</h1>
                <h1>HM DKV</h1>
                <div class="jargon">
                    Inspirasi Lokal Ekspor Global
                </div>
            </div>
        </div>

    </div>

    <main>

        <article>
            Tim PPK Ormawa HM DKV adalah sebuah tim yang terdiri dari anggota organisasi mahasiswa dalam bidang Desain Komunikasi Visual. Mereka berfokus pada pengembangan kapasitas dan keterampilan organisasi mahasiswa dengan tujuan untuk memberdayakan masyarakat desa, khususnya dalam hal kewirausahaan dan ekonomi kreatif. Dalam konteks Desa Tuntang, tim ini berupaya mengatasi berbagai permasalahan yang dihadapi oleh pelaku usaha kerajinan eceng gondok melalui pendekatan Desain Komunikasi Visual. Mereka melaksanakan program bernama EcoMastery, yang meliputi sosialisasi dan workshop mengenai budidaya eceng gondok, pembuatan kerajinan, dan pemasaran produk melalui media sosial dan marketplace. Program ini bertujuan untuk meningkatkan promosi dan pemasaran produk, mengoptimalkan penggunaan teknologi dalam bisnis, serta memperkuat ekonomi lokal desa. Output dari program ini mencakup berbagai publikasi dan produk yang dihasilkan oleh para pelaku usaha, serta modul dan artikel ilmiah yang dapat digunakan untuk pemberdayaan masyarakat lebih lanjut.
        </article>

        <!-- WADAH SEMUA FOTO PP -->
        <section>

            <div style="background-image: url('assets/image/pp/MsLusi.jpg');">
            </div>
            
            <div style="background-image: url('assets/image/pp/ody.jpg');">
                <img src="assets/image/pp/pose/ody.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/nata.jpg');">
                <img src="assets/image/pp/pose/nata.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/silva.jpg');">
                <img src="assets/image/pp/pose/silva.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/risma.jpg');">
                <img src="assets/image/pp/pose/risma.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/jevon.jpg');">
                <img src="assets/image/pp/pose/jevon.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/nur.jpg');">
                <img src="assets/image/pp/pose/nur.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/reyhan.jpg');">
                <img src="assets/image/pp/pose/reyhan.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/nida.jpg');">
                <img src="assets/image/pp/pose/nida.jpg" alt="pose">
            </div>

            <div style="background-image: url('assets/image/pp/wawan.jpg');">
                <img src="assets/image/pp/pose/wawan.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/nina.jpg');">
                <img src="assets/image/pp/pose/nina.jpg" alt="pose">
            </div>

            <div style="background-image: url('assets/image/pp/arul.jpg');">
                <img src="assets/image/pp/pose/arul.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/haydar.jpg');">
                <img src="assets/image/pp/pose/haydar.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/fadhil.jpg');">
                <img src="assets/image/pp/pose/fadhil.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/daiyan.jpg');">
                <img src="assets/image/pp/pose/daiyan.jpg" alt="pose">
            </div>
            
            <div style="background-image: url('assets/image/pp/anggi.jpg');">
                <img src="assets/image/pp/pose/anggi.jpg" alt="pose">
            </div>
            
        </section>

    </main>

    <a href="/" class="back-btn" id="flow_btn"><img src="assets/icon/left-arrow.png">Kembali</a>

    <footer>
        <?= $this->include('layouts/footer') ?>
    </footer>


    <script src="js/library/live_view.js"></script>
    <script src="js/library/btn_animation.js"></script>

    <?= $this->endSection() ?>