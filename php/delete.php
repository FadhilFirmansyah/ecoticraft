<?php
    session_start();
    if(isset($_GET["id"])){
        include 'connect.php';

    $connection -> query("DELETE FROM product WHERE productID = ".$_GET["id"]);

    }

    header("location:view.php");
    exit();

?>