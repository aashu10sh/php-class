<?php
// require("./conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("./conn.php");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];

    $query = "INSERT INTO users (name, email, password, phone, dob) VALUES ('$name','$email','$password','$phone','$dob')";

    $res = mysqli_query($conn, $query);

    if ($res) {
        header("Location: /edit-data.php");
        die();
    } else {
        echo "Couldn't insert data <br/>";
        echo mysqli_error($conn);
    }
}