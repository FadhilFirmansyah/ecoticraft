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
</head>

<body>
    <img class="header-bg-component" src="assets/components/header-component.png">
    <div class="hero">
        <header style="position: relative; z-index: 1">
            <div class="left-header">
                <img class="logo-header" src="assets/logo/logo.png">
                <button class="btn-header">ECOTICRAFT</button>
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


    <script src="js/index.js"></script>
</body>

</html>