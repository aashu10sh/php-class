<?php
    require_once("conn.php");

    $query = "SELECT * FROM users;";

    $response = mysqli_query($conn, $query);

    if (!$response){
        echo "Could Not Get Data!";
        die();
    }
    while($row = mysqli_fetch_assoc($response)){
        echo "ID : ". $row['id'] . "<br>";
        echo "Name : ".$row['name'] . "<br>";
        echo "Email : ". $row["email"] . "<br>";
        echo "Phone : " . $row["phone"] . "<br>";
        echo "Date of Birth : ". $row["dob"] . "<br>";
        echo "<div> === </div>";
    }

    mysqli_close($conn);

?>
