<?php
session_start();

// cek apakah sudah login
if(!isset($_SESSION["login"])){
    header("Location: login.php");
}

if(isset($_POST["productName"])){
    include 'connect.php';

    $productName = htmlspecialchars($_POST["productName"]);
    $productDescription = htmlspecialchars($_POST["productDescription"]);
    $productLink = htmlspecialchars($_POST["productLink"]);
    $productImage = $_FILES["productImage"];

    $message = "";

    if($productName==""){
        $message = "Nama product perlu diisi";
    }elseif($productDescription==""){
        $message = "Deskripsi product perlu diisi";
    }elseif($productLink==""){
        $message = "Tautan product perlu diisi";
    }elseif(!isset($productImage["tmp_name"]) && $productImage["tmp_name"]=""){
        $message = "Gambar product perlu diisi";
    }else {
        $namaFile = str_shuffle(uniqid()) . "_" . basename($productImage["name"]);
        move_uploaded_file($productImage["tmp_name"], "../upload/" . $namaFile);

        $con->query("INSERT INTO product VALUES(null, '" . $productName."', '".$productDescription."', '".$productLink."', '".$namaFile."')" );

        $message = "Product berhasil ditambahkan";
    }

    $_SESSION["message"] = $message;

}

    header("location:../insert.php");
    exit()

?>