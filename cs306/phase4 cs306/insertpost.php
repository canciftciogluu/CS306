<?php

include "userconfig.php";

// Get the form data
$id = $_POST['id'];
$date = $_POST['date'];
$text = $_POST['text'];
$author_usr = $_POST['author_usr'];
$author_comp = $_POST['author_comp'];

// Create the new user
$sql = "INSERT INTO post (id,text,date,author_usr,author_comp)
VALUES ('$id','$text', '$date', '$author_usr','$author_comp')";

if (mysqli_query($db, $sql)) {
header('Location:adminpanel.php');
}

    
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>
