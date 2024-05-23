
<?php
    require_once("conn.php");

    $toEdit = (string) $_GET["id"];

    if (!$toEdit){
        echo "No ID Passed! Cannot Edit Data!";
        die();
    }

    $query = "SELECT * FROM users WHERE id=$toEdit;";

    $response = mysqli_query($conn, $query);

    if(!$response){
        echo mysqli_error($conn);
        die();
    }

    $data = mysqli_fetch_assoc($response);

    if(!$data){
        echo "No Such User in the Database";
        die();
    }


?>


<body>
    <form action="server-edit.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $data['name'] ?>">

        <br>
        <input type='hidden' name='id' value="<?php echo $data['id'] ?>">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $data['email'] ?>">

        <br>

        <label for="phone">Phone number</label>
        <input type="text" id="phone" name="phone" value="<?php echo $data['phone'] ?>">

        <br>

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" value="<?php echo $data['dob'] ?>">
        <br>

        <input type="submit" value="Submit">
    </form>
</body>