<?php
    session_start();

    if(!isset($_GET["id"])){
        header("location:view.php");
        exit();
    }

    include 'connect.php';

    $id = $_GET["id"];

    $getData = $connection->query("SELECT * from product WHERE productID = ".$id);

    if($getData->num_rows==0){
        header("location:view.php");
        exit();
    }

    $getData = $getData->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="icon" href="assets/Icon moon 1.png" >
    <title>Tuntang Cikidul</title>
</head>
<body>
  
    <div class="kotak">
    <a href="view.php" >< Kembali</a>
    <form action="doUpdateProduct.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
            <p class="judulweb" style="font-size: 2rem; font-weight: 800;">Perbarui Product</p>
		        <div class="productName">
			        <td> Nama Product: <input type="text" name="productName" value="<?=$getData["productName"]?>"> </td>
		        </div>
                <div class="productDescription">
                
                    <td>Deskripsi Product: </td>
                    <td><textarea name="productDescription" id="" cols="30" rows="10"><?=$getData["productDescription"]?></textarea></td>
                </div>
                <div class="productLink">
			        <td>Tautan Product: <input type="text" name="productLink" value="<?=$getData["productLink"]?>"> </td>
		        </div>
                <div class="productImage">
			        <td>Gambar Product: <input type="file" name="productImage"> </td>
		        </div>
                <div class="tombol-submit">
			        <button name="submit" class="btn">Perbarui</button>
		        </div>
    </form>
                
    
   
    
    <br>

    <?php
        if (isset($_SESSION["message"])){
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
    ?>

</body>
</html>