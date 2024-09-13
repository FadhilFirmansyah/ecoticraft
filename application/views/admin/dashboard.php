<div class="title-wrap">
    <h1 class="title-content">Dashboard</h1>
    <button class="reload" onclick="if(confirm('Apakah anda yakin ingin memuat ulang halaman?')){location.reload()}">Reload Page</button>
</div>

<section class="main-section">

    <div class="count-stat">
        <!-- PRODUCT -->
        <div class="count-stat-detail">
            <i class="fa fa-box"></i>
            <div>
                <h4>Produk Eceng Gondok</h4>
                <h3><?= $stat['total_produk'][0]['count'] ?></h3>
            </div>
        </div>
        <!-- UMKM -->
        <div class="count-stat-detail">
            <i class="fa fa-shop"></i>
            <div>
                <h4>UMKM</h4>
                <h3>2</h3>
            </div>
        </div>

        <?php if ($user['role'] == "superadmin" && $user['role'] != "admin") { ?>
            <div class="count-stat-detail">
                <i class="fa fa-user"></i>
                <div>
                    <h4>Admin</h4>
                    <h3><?= $stat['total_admin'] ?></h3>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="count-stat">

        <div class="count-stat-detail">
            <i class="fa fa-eye"></i>
            <div>
                <h4>Total Kunjungan</h4>
                <h3><?= $stat['total_view'][0]['count'] ?></h3>
            </div>
        </div>

        <div class="count-stat-detail">
            <i class="fa fa-user"></i>
            <div>
                <h4>Kunjungan hari ini</h4>
                <h3><?= $stat['pengunjung_hari_ini'][0]['count'] ?></h3>
            </div>
        </div>

    </div>

    <div class="stat">
        <canvas id="view_page" width="100" height="100"></canvas>
    </div>

</section>

<!-- <script src="js/admin/dashboard.js"></script> -->