<?php

include "userconfig.php";

// Get the form data
$author = 0;
$text = $_POST['text'];

$date = date('Y-m-d');

// Create the new user
$sql = "INSERT INTO support (author, text, date)
VALUES ('$author', '$text', '$date')";

if (mysqli_query($db, $sql)) {
header('Location:support.php');
}


else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>
