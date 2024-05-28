<?php


session_start();

if(!isset($_SESSION['user'])){
    header("Location: /auth/login.php");
    die();
}
require_once("../conn.php");

$userEmail = $_SESSION["user"];

$sql = "SELECT * FROM auth WHERE email='$userEmail';";

$result = mysqli_query($conn,$sql);

$data = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1> Welcome <?php echo $data['email'] ?>, This is your page!</h1>

    <h2> Log out of the system by clicking here:  <a href="/auth/logout.php">Logout</a></h2>
    
</body>
</html>