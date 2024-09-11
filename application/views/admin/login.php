<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin/login.css">
    <link rel="icon" href="assets/logo/logo.png">

    <script src="https://kit.fontawesome.com/a502a8bc22.js" crossorigin="anonymous"></script>

    <title><?= $title ?></title>
</head>

<body>

    <main>
        <section class="form-section">

            <h1 class="title-form">Login Admin</h1>
            <h3 class="sub-title-form">Masuk untuk mengelola dan mengatur konten Ecoticraft</h3>

            <form action="admin/login" class="admin-form" method="post">
                <?php echo form_open('admin/login'); ?>
                <div class="input-group">
                    <span>
                        <input value="<?php echo set_value('username', $this->session->flashdata('username')); ?>" class="input-form" type="text" name="username" id="username" required>
                        <label class="label-form" for="username">Username</label>
                        <i class="fa-solid fa-at icon-fa"></i>
                    </span>
                </div>
                <div class="input-group">
                    <span>
                        <input class="input-form" type="password" name="password" id="password" required>
                        <label class="label-form" for="password">Password</label>
                        <i class="fa-solid fa-key icon-fa"></i>
                    </span>
                </div>
                <?php if ($this->session->flashdata('error')) { ?>
                    <p class="warning-text"><?php echo $this->session->flashdata('error'); ?></p>
                <?php } ?>

                <button class="main-btn">Masuk</button>
                <?php echo form_close(); ?>
            </form>

        </section>
    </main>

    <script src="js/login.js"></script>
</body>

</html>