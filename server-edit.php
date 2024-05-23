<?php
// require("./conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("./conn.php");

    $id = $_POST["id"];

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];

    $query = "UPDATE users SET name='$name',email='$email',phone='$phone',dob='$dob' WHERE id='$id';";

    $res = mysqli_query($conn, $query); 

    mysqli_close($conn);

    if ($res) {
        header("Location: /edit-data.php");
        die();
    } else {
        echo "Couldn't insert data <br/>";
        echo mysqli_error($conn);
    }
}