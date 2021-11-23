<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
require_once 'dbConnect.php';
require_once 'toolBox.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql = "SELECT * FROM user";
    $result = mysqli_query($connect, $sql);
    if($result){
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        response(200, 'Data fetched successfully', $row);
    }else{
        response(400, 'error: '.mysqli_error($connect));
    }
}
mysqli_close($connect);