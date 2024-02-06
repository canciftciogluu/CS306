<?php

include "userconfig.php";

$id = $_POST['id'];

$sql_post = "DELETE FROM post WHERE author_usr='$id'";
mysqli_query($db, $sql_post);

    
$sql = "DELETE FROM users WHERE id='$id' ";

if (mysqli_query($db, $sql)) {
header('Location:adminpanel.php');
}

    
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);
?>
