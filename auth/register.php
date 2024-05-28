<?php

session_start();

if(isset($_SESSION['user'])){
    header("Location: /auth/welcome.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once("../conn.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $verifyQuery = "SELECT id from auth where email='$email';";

    $result = mysqli_query($conn, $verifyQuery);

    if(!$result){
        echo "User with that email already exists!";
        die();
    }

    $createUserQuery = "INSERT INTO auth(email,password) VALUES ('$email','$password');";
    $result = mysqli_query($conn, $createUserQuery);
    if(!$result){
        echo "Could Not Register User!";
        die();
    }

    echo "Registered User! Please to to <a href='/auth/login.php'> Login Page </a>";
    die();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<h1>Register Here!</h1>
<body>
    <form method="post" action="">
        Email: <input type="text" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
