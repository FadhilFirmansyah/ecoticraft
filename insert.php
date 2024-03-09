<?php
ob_start();
session_start();

// cek apakah sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
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


                <form action="php/doAddProduct.php" method="POST" enctype="multipart/form-data" class="form">

                    <p class="judulweb" style="font-size: 2rem; font-weight: 800;">Menambahkan Produk Eceng Gondok</p>

                    <div class="productName">
                        <td> Nama Product: <input type="text" placeholder="Nama Product" name="productName" required> </td>
                    </div>

                    <div class="productDescription">
                        <td>Deskripsi Product: </td>
                        <td><textarea type="text" placeholder="Deskripsi Product" name="productDescription" id="" cols="22" rows="5"> </textarea></td>
                    </div>

                    <div class="productLink">
                        <td>Tautan Product: <input type="text" placeholder="Tautan Product" name="productLink" required> </td>
                    </div>

                    <div class="productImage">
                        <td>
                            <label for="img_input" class="label-foto">Gambar Product: </label>
                            <input type="file" id="img_input" name="productImage" onchange="preview()" required>
                        </td>
                        <img src="" alt="img preview" width="100" id="previewImg">
                    </div>

                    <div class="tombol-submit">
                        <button name="submit" class="btn">Simpan</button>
                    </div>



                </form>
                <?php
                if (isset($_SESSION["message"])) {
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
                ?>


    </div>
    <script src="js/script.js"></script>
</body>

</html>