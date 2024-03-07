<?php
$connection = new mysqli("localhost", "root", "", "ppko_hmdkv");

if(!$connection){
    echo "Server not found";
    exit();
}