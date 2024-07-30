<?php
$con = new mysqli("localhost", "root", "", "ecoticraft");

if(!$con){
    echo "Server not found";
    exit();
}