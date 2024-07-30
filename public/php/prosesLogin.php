<?php 
ob_start();
include 'connect.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekdata = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($cekdata) === 1) {

        $array = mysqli_fetch_assoc($cekdata);

        if (password_verify($password, $array['password'])) {
            $_SESSION['login'] = $username;
            header("Location: insert.php");
            exit;
        }
    }

    $salah_password = true;
}