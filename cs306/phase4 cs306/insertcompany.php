<?php

include "userconfig.php";

// Get the form data
$id = $_POST['id'];
$name = $_POST['name'];
$city = $_POST['city'];

// Create the new user
$sql = "INSERT INTO company (id,name,city)
VALUES ('$id','$name', '$city')";

if (mysqli_query($db, $sql)) {
header('Location:adminpanel.php');
}

    
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>
