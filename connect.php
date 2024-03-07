<?php
$connection = new mysqli("localhost", "root", "", "ecoticraft");

if(!$connection){
    echo "Server not found";
    exit();
}