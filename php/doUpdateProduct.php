<?php
ob_start();
session_start();

// cek apakah sudah login
if(!isset($_SESSION["login"])){
    header("Location: login.php");
}

if(isset($_POST["productName"])){
    include 'connect.php';

    $productID = htmlspecialchars($_POST["id"]);
    $productName =  htmlspecialchars($_POST["productName"]);
    $productDescription = htmlspecialchars($_POST["productDescription"]);
    $productLink = htmlspecialchars($_POST["productLink"]);
    $productImage = $_FILES["productImage"];

    $message = "";

    if($productName==""){
        $message = "Product name must be filled";
    }elseif($productDescription==""){
        $message = "Product description must be filled";
    }elseif($productLink==""){
        $message = "Product link must be filled";
    }else {

        if(isset($productImage["tmp_name"]) && $productImage["tmp_name"]!=""){
            $filePath = "upload/".basename($productImage["name"]);
            move_uploaded_file($productImage["tmp_name"], $filePath);

            $con -> query("UPDATE product SET productImage='".$filePath."' WHERE productID= ".$productID);

        }

        $con -> query("UPDATE product SET productName='".$productName."', productDescription='".$productDescription."', productLink='".$productLink."' WHERE productID=".$productID);

        $message = "Barang berhasil diperbarui";
    }

    $_SESSION["message"] = $message;

    header("location:../update.php?id=".$productID);
    exit();

}

    header("location:../insert.php");
    exit()

?>