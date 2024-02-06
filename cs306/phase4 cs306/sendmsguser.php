<?php

include "userconfig.php";

if (isset($_POST['first_name'])){

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];


echo $first_name . " " . $last_name . " " . $password . "<br>";

$sql_statement = "INSERT INTO users(first_name,last_name,password)
					VALUES ('$first_name','$last_name','$password')";

$result = mysqli_query($db, $sql_statement);

header ("Location: index.php");

}

else
{

	echo "The form is not set.";

}												


?>