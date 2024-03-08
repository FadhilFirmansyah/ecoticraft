<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/testlistt.css">
    <link rel="icon" href="assets/Icon moon 1.png">
    <title>Tuntang Cikidul</title>
</head>

<body style="background-color: #4362c7;">
    <header>
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    < Kembali</a>
            </div>
        </nav>
    </header>

    <div class="container">

        <?php
        include 'php/connect.php';
        $getProduct = $con->query("SELECT * FROM product");
        while ($fetchProduct = $getProduct->fetch_assoc()) {
        ?>

            <section class="list">


                <div class="product">
                    <div class="card">


                        <div class="name">
                            <?= $fetchProduct["productName"] ?>
                        </div>
                        <div class="image">
                            <img src="upload/<?= $fetchProduct["productImage"] ?>">
                        </div>
                        <div>
                            <p></p>
                        </div>
                        <div class="sec">
                            <div class="deks">
                                <div class="bold">
                                    Deskripsi:
                                </div>
                                <p><?= $fetchProduct["productDescription"] ?></p>
                                <div class="bold">
                                    <p><a target="_blank" href="<?= $fetchProduct["productLink"] ?>">Kunjungi</a></p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p></p>
                        </div>
                        <a href="update.php?id=<?= $fetchProduct["productID"] ?>">
                            <button class="btn">Perbarui</button>
                        </a>

                        <br>
                        <!-- Kasih margin ya, <br> nya hapus aja ntar wkwk -->

                        <button onclick="confirm('Yakin ingin menghapus?') ? window.location.href = 'php/delete.php?id=<?= $fetchProduct['productID'] ?>' : false" class="btn">Hapus</button>


                    </div>
                </div>


            </section>


        <?php } ?>
    </div>







</body>

</html>