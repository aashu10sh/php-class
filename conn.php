<?php

$host = "127.0.0.1";
$port = "3306"; // yo aafno
$username = "developer";
$password = "phprocks";
$database = "newdb"; // yo aafno



$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database,
    $port
);

if (!$conn) {
    echo mysqli_connect_error();
    die();
}
