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

    $verifyQuery = "SELECT email,password from auth where email='$email';";

    $result = mysqli_query($conn, $verifyQuery);

    if(!$result){
        echo "Invalid Credentials!";
        die();
    }
    $data = mysqli_fetch_assoc($result);

    if($password == $data['password']){
        $_SESSION['user'] = $data['email'];
        header("Location: /auth/welcome.php");
        die();
    }

    echo "Invalid Credentials!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<h1>Login Here!</h1>
<body>
    <form method="post" action="">
        Email: <input type="text" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
