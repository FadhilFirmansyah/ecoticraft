<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


    <link rel="icon" href="assets/logo/logo.png">

    <?php foreach ($css as $key) { ?>
        <link rel="stylesheet" href="<?= $key; ?>">
    <?php } ?>

    <title><?= $title ?></title>
</head>

<body>

    <header>

        <div class="title-web" onclick="window.location.href = 'home'">
            <img src="assets/logo/logo.png">
            <h2>Ecoticraft</h2>
        </div>

        <nav>
            <a id="dashboardBtn"><i class="fas fa-home"></i> Dashboard</a>
            <a id="productBtn"><i class="fas fa-box"></i> Produk</a>
            <a id="umkmBtn"><i class="fa fa-shop"></i> Umkm</a>

            <hr>

            <?php if ($user["role"] == "superadmin" && $user["role"] != "admin") { ?>
                <a id="superadminBtn"><i class="fa fa-bolt"></i> SuperAdmin Power</a>
                <a id="folderadminBtn"><i class="fa fa-folder"></i> Directory</a>
            <?php } ?>

            <a href="admin/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>

        </nav>

        <div class="user">
            <div style="<?= $user['role'] == 'superadmin' && $user['role'] != 'admin' ? 'background-color: #d4af37;' : '' ?>" class="pp-user"><?= substr($user['username'], 0, 1); ?></div>
            <h2><?= $user['username'] ?></h2>
            <?= $user['role'] == 'superadmin' && $user['role'] != 'admin' ? '<i class="fa fa-bolt"></i>' : '' ?>
        </div>
    </header>

    <main id="main-content">

    </main>

    <script type="module" src="js/admin/main.js"></script>
</body>

</html>