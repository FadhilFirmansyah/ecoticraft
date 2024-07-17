<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuntang Cikidul</title>
    <link rel="stylesheet" type="text/css" href="style/opening.css">
    <link rel="icon" href="assets/logo/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a502a8bc22.js" crossorigin="anonymous"></script>
</head>

<body>
    <img class="header-bg-component" src="assets/components/header-component.png">

    <!-- JUDUL WEBSITE - KERAJINAN TUNTANG -->
    <div class="hero">
        <header style="position: relative; z-index: 1">
            <div class="left-header">
                <img class="logo-header" src="assets/logo/logo.png">
                <button class="btn-header"><span id="btn-header"></span></button>
                <!-- <button class="btn-header">ECOTICRAFT</button> -->
            </div>
            <div class="right-header">
                <i class="menu-icon fa-solid fa-bars"></i>
            </div>
        </header>

        <section>
            <div class="title-hero-wrap" id="title-hero-wrap">
                <h2 id="title">
                    KERAJINAN<br>
                    <span>
                        TUNTANG
                    </span>
                </h2>
                <h3 class="sub-title">
                    Inspirasi Lokal Ekspor Global
                </h3>
            </div>

            <div class="mini-preview">
            </div>
        </section>
    </div>


    <!-- PENJELASAN ECENG GONDOK -->
    <div class="sub-hero">
        <!-- Penamaan id pada tiap div sesuai backend keinginan backend, wkwk -->
        <div class="circle" id="circle-sub-hero">
            <img src="assets/logo/logo.png">
        </div>

        <div class="text" id="text-sub-hero">
            <h2>ECENG GONDOK</h2>
            <hr>
            <p>
                Stock eceng gondok mulai menipis pada pertengahan 2022 dikarenakan tidak ada penanaman ulang dan terjadinya pengerukan eceng gondok oleh pemerintah dalam rangka membangun wahana besar ditengah rawa pening. Namun sampai sekarang pembangunan wahana tersebut masih dalam bentuk wacana belum ada pelaksanaan berlanjut.
                <br><br>
                Eceng Gondok mulai tumbuh kembali pada aakhir 2022-2023 karena mulai ada petani eceng gondok yang bermitra dengan Cikidul dan membantu pemasokan produksi eceng gondok sendiri.
            </p>
            <hr>
        </div>

    </div>


    <!-- PRODUK ECENG GONDOK -->
    <section class="product-section" id="product_sect">
        <h2>PRODUK ECENG GONDOK</h2>

        <div class="products-wrap">
            <!-- TEMPAT KARTU PRODUK [DATA NYA MENGGUNAKAN JSON], UBAH HTML nya ADA DI js/index.js -->

        </div>

        <div class="products-wrap">
            <!-- TEMPAT KARTU PRODUK [DATA NYA MENGGUNAKAN JSON], UBAH HTML nya ADA DI js/index.js -->

        </div>

    </section>


    <!-- PROGRAM DIKEMBANGKAN OLEH -->
    <section class="about-section">

        <h2>PROGRAM <br>DIKEMBANGKAN
            <span>OLEH</span>
        </h2>

        <div class="carousel-wrap">

            <div class="carousel-inner">

                <div style="background-image: url('assets/image/fotbar.png')" class="item-carousel">
                    <button>TIM PPKO</button>
                </div>

                <div style="background-image: url('assets/image/img-ibuibu.jpg')" class="item-carousel">
                    <button>KOMUNITAS</button>
                </div>


            </div>

        </div>

    </section>


    <footer>
        <div class="aside-wrap">
            <aside>
                <span><img src="assets/icon/maps.png" alt="icon"> Cikal RT05 RW07 Gang Manggar 7</span>
                <span><img src="assets/icon/call.png" alt="icon"> +62 857-2932-0717</span>
                <span><img src="assets/icon/instagram.png" alt="icon"> @cikidul077</span>
                <span><img src="assets/icon/email.png" alt="icon"> cikidul07@gmail.com</span>
            </aside>
            <aside>
                <a href="https://goo.gl/maps/4SFE6SCtnJPw8MpN7?g_st=aw" target="_blank"><img src="assets/components/maps.jpg" alt="maps"></a>
            </aside>
        </div>
        <div>
            <hr>
            <h4>Hak Cipta ©2024 Kerajinan Tuntang-Seluruh Hak Cipta</h4>
        </div>
    </footer>


    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/index.js"></script>
    <script src="js/swiper.js"></script>

    <!-- <script src="js/live_view.js"></script> -->
</body>

</html>