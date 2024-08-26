<header id="header-navbar" class="navbar">
        <img id="icon-menu" class="icon-menu" src="assets/icon/menu-r.png">
        <div onclick="window.location.href = 'home'" class="logo-navbar">
            <img src="assets/logo/logo.png" alt="logo" class="logo-header">
            <h4>ECOTICRAFT</h4>
        </div>
        <div id="back-modal" class="back-modal"></div>
        <nav id="navbar">
            <h3 class="title-navbar">Menu Pilihan</h3>
            <a href="home" <?= $page == "home"? "class='active-nav'": "" ?> >Beranda</a>
            <a href="product" <?= $page == "product"? "class='active-nav'": "" ?> >Produk</a>
            <a href="community" <?= $page == "community"? "class='active-nav'": "" ?>>Komunitas</a>
            <a href="umkm" <?= $page == "umkm"? "class='active-nav'": "" ?> >UMKM</a>
            <a href="about" <?= $page == "about"? "class='active-nav'": "" ?> >Tim PPKO</a>
            <span class="close-span">
                <img id="tulisan-tutup" class="close-navbar" src="assets/icon/xicon.png">
            </span>
        </nav>
    </header>