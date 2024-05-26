
<style>
table, th,td{
    border: 1px solid black;
    /* width: 100%; */
}
td{
    padding: 2vh;
}
</style>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    require_once("../conn.php");
    $name = $_POST['name'];
    $current_date = date("Y-m-d");

    $query = "INSERT INTO todos(name,created,completed) VALUES ('$name','$current_date','0');";

    $result = mysqli_query($conn,$query);

    if (!$result){
        echo "Could Not Insert Data!";
        die();
    }
    header("Location: ./");
    die();
}
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    require_once('../conn.php');
    $query = "SELECT * FROM todos ORDER BY id desc;";
    $results = mysqli_query($conn,$query);
    if (!$results){
        echo "Error getting Results";
        die();
    }

}

?>

<form method="POST" action="">
    <label for="name">Name</label>
    <input type="text" name="name" required >
    <button type="submit">Submit</button>
</form>


<div>
    <table >
        <tr>
            <th>Name</th>
            <th>Completed</th>
            <th>Created</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php
    while($row = mysqli_fetch_assoc($results)){
        echo "<tr>";
        echo "<td>".$row['name'] . "</td>";
        echo "<td>"."<input type='checkbox' disabled value=".$row['completed'] . "></td>";
        echo "<td>". $row["created"] . "</td>";
        echo "<td> <a href=/edit.php?id=".$row["id"]."> Edit </a> </td>";
        echo "<td> <a href=/delete.php?id=".$row["id"]."> Delete </a> </td>";
        // echo "<div> === </div>";
        echo "</tr>";
    }
    ?>
</div>