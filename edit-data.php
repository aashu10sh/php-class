<style>
table, th,td{
    border: 1px solid black;
    /* width: 100%; */
}
td{
    padding: 2vh;
}
</style>

<table >
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date of Birth</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    require_once("conn.php");

    $query = "SELECT * FROM users;";
    
    $response = mysqli_query($conn, $query);
    
    if (!$response){
        echo "Could Not Get Data!";
        die();
    }
    while($row = mysqli_fetch_assoc($response)){
        echo "<tr>";
        echo "<td>". $row['id'] . "</td>";
        echo "<td>".$row['name'] . "</td>";
        echo "<td>". $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>". $row["dob"] . "</td>";
        echo "<td> <a href=/edit.php?id=".$row["id"]."> Edit </a> </td>";
        echo "<td> <a href=/delete.php?id=".$row["id"]."> Delete </a> </td>";
        // echo "<div> === </div>";
        echo "</tr>";
    }

    mysqli_close($conn);

    ?>

</table>