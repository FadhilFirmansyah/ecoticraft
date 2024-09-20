<header id="header-navbar" class="navbar">
        <img id="icon-menu" class="icon-menu" src="<?= base_url('assets/icon/menu-r.png') ?>">
        <div onclick="window.location = '<?= base_url('home') ?>'" class="logo-navbar">
            <img src="<?= base_url('assets/logo/logo.png') ?>" alt="logo" class="logo-header">
            <h4>ECOTICRAFT</h4>
        </div>
        <div id="back-modal" class="back-modal"></div>
        <nav id="navbar">
            <h3 class="title-navbar">Menu Pilihan</h3>
            <a href="<?= base_url('home') ?>" <?= $page == "home"? "class='active-nav'": "" ?> >Beranda</a>
            <a href="<?= base_url('product') ?>" <?= $page == "product"? "class='active-nav'": "" ?> >Produk</a>
            <a href="<?= base_url('community') ?>" <?= $page == "community"? "class='active-nav'": "" ?>>Komunitas</a>
            <a href="<?= base_url('umkm') ?>" <?= $page == "umkm"? "class='active-nav'": "" ?> >UMKM</a>
            <a href="<?= base_url('about') ?>" <?= $page == "about"? "class='active-nav'": "" ?> >Tim PPKO</a>
            <span class="close-span">
                <img id="tulisan-tutup" class="close-navbar" src="<?= base_url('assets/icon/xicon.png') ?>">
            </span>
        </nav>
    </header>