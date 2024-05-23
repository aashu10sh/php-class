<?php

$num = (int) $_POST["number"];

if ($num % 2 == 0) {
    echo "Even";
} else {
    echo "Odd";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="request.php" method="post">
        <input type="text" name="number">
        <input type="submit" value="Submit">
    </form>
</body>
</html>