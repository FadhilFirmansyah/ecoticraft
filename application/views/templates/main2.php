<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php 
    if (!empty($css)) {
        foreach ($css as $style): ?>
            <link rel="stylesheet" type="text/css" href="<?= $style ?>">
        <?php endforeach;
    }
    ?>
    <link rel="icon" href="assets/logo/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- <script src="https://kit.fontawesome.com/a502a8bc22.js" crossorigin="anonymous"></script> -->

    <title><?= $title ?></title>
</head>
<?= $getAllProduct ?>
<body>
    
    <?php include __DIR__ . '/../layouts/navbar.php' ?>

    <?= $contents ?>

    <?php include __DIR__ . '/../layouts/footer.php' ?>
    

    <script src="js/library/live_view.js"></script>
    <script src="js/library/umkm-footer-query.js"></script>
    <script src="js/library/navbar.js"></script>

</body>

</html>