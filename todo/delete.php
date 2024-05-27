<?php

require_once('../conn.php');

$id = $_GET['id'];

if (!$id){
    echo "No ID Passed!";
    die();
}

$deleteQuery = "DELETE FROM todos WHERE id='$id';";

$result = mysqli_query($conn, $deleteQuery);

if(!$result){
    echo "Could Not Delete";
    die();
}

header("Location: /todo/");

die();


