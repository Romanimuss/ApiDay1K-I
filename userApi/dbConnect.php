<?php
$localhost = 'localhost';
$user = "root";
$pass = "";
$dbname = "users";
$connect = mysqli_connect($localhost, $user, $pass, $dbname);
if(!$connect){
    echo ("error: ". mysqli_connect($connect));
}