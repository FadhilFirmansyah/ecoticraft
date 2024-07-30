<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- <script src="https://kit.fontawesome.com/a502a8bc22.js" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" type="text/css" href="style/community/community.css">

    <link rel="stylesheet" type="text/css" href="style/about/about.css">

    <link rel="stylesheet" type="text/css" href="style/index/index.css">
     
    <title><?= $title; ?></title>
</head>

<body>

    <?php
    // if($isHeader !== 'home'){
    //     $this->include('layouts/header');
    // } 
    ?>

    <?= $this->renderSection('content') ?>
    

    <script src="js/library/live_view.js"></script>
</body>

</html>