<?php

require_once("../conn.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $name = $_POST['name'];
    $id = $_POST['id'];

    $completed = '0';

    if (isset($_POST['completed']) and $_POST['completed'] === 'on'){
        $completed = '1';
    }

    $updateQuery = "UPDATE todos SET name='$name', completed='$completed' WHERE id='$id';";


    $ran = mysqli_query($conn, $updateQuery);

    if (!$ran){
        echo "Could Not Update the required value";
        die();
    }
        
    mysqli_close($conn);

    header("Location: /todo/");
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = (string) $_GET['id'];

    $getTodoQuery = "SELECT * FROM todos where id='$id';";

    $getTodoResult = mysqli_query($conn, $getTodoQuery);

    if (!$getTodoResult){
        echo "Such Task Does Not Exist!";
        die();
    }

    $data = mysqli_fetch_assoc($getTodoResult);
    mysqli_close($conn);

    $completed = $data['completed'] == '1' ? "checked" : "";
}
?>
<body>
    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">

        <br>
        <input type='hidden' name='id' value="<?php echo $data['id'] ?>">
        <br>

        <label for="completed">Completed: </label>
        <input type="checkbox" name="completed" <?php echo $completed ?> >
        <br> 

        <label for="dob">Created</label>
        <input type="date" id="created" name="created" disabled value="<?php echo $data['created'] ?>">
        <br>

        <input type="submit" value="Submit">
    </form>
</body>