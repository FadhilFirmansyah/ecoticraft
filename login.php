<?php
ob_start();
session_start();

// cek apakah sudah login
if(isset($_SESSION["login"])){
    header("Location: index.php");
}

include 'php/prosesLogin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/Icon moon 1.png">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Tuntang Cikidul</title>
</head>

<body>

    <div class="kotak">

        <a href="index.php">
            < Kembali</a>


                <form method="POST" enctype="multipart/form-data" class="form">
                    <p class="judulweb" style="font-size: 2rem; font-weight: 800;">Login</p>
                    <div class="username">
                        <td> Username: <input type="text" placeholder="Username..." name="username" required> </td>
                    </div>
                    <div class="password">
                        <td> Password: <input type="password" placeholder="Password..." name="password" required> </td>
                    </div>

                    <div class="tombol-submit">
                        <?php if (isset($salah_password)) { ?>
                            <p>Username atau Password salah</p>
                        <?php } ?>
                        <button name="login" class="btn">Login</button>
                    </div>



                </form>
                <?php
                if (isset($_SESSION["message"])) {
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
                ?>


    </div>
</body>

</html>