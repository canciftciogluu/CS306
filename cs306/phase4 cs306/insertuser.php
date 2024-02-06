<?php

include "userconfig.php";

// Get the form data
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];

// Create the new user
$sql = "INSERT INTO users (id,first_name, last_name, password)
VALUES ('$id','$first_name', '$last_name', '$password')";

if (mysqli_query($db, $sql)) {
header('Location:adminpanel.php');
}

    
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>
