<?php
// require("./conn.php");

    require_once "./conn.php";

    $id = $_GET["id"];


    $userVerifyQuery = "SELECT * FROM users WHERE id='$id';";

    $response = mysqli_query($conn, $userVerifyQuery);

    if(!$response){
        echo mysqli_error($conn);
        die();
    }


    $data = mysqli_fetch_assoc($response);

    if(!$data){
        echo "No Such User in the Database";
        die();
    }

    $query = "DELETE FROM users WHERE id='$id'";

    $res = mysqli_query($conn, $query);

    mysqli_close($conn);

    if ($res) {
        header("Location: /edit-data.php");
        die();
    } else {
        echo "Couldn't insert data <br/>";
        echo mysqli_error($conn);
    }
?>