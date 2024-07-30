<?php
session_start();
if (isset($_GET["id"])) {
    include 'connect.php';

    $getId = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM product WHERE productID = $getId");
    $array = mysqli_fetch_assoc($query);

    $file_path = "../upload/" . $array["productImage"]; 
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo "File berhasil dihapus.";
        } else {
            echo "Gagal menghapus file.";
        }
    } else {
        echo "File tidak ditemukan.";
    }

    $con->query("DELETE FROM product WHERE productID = " . $_GET["id"]);
}

header("location:../view.php");
exit();
