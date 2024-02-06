<html>
<head>
	<title> Deletion page </title>
</head>
<body>
	<center>
<h1>Delete data from users table using id</h1>
<form action="" method="POST">
	<input type="text" name="id" placeholder="Enter ID here" /><br>
	<input type="submit" name="delete" value="Delete id" /><br>
	</center>
</body>
</html>

<?php
$connection= mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"step4d1");

if(isset($_POST["delete"]))
{
	$id = $_POST['id'];

	$query = "DELETE FROM `users` WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);
}


?>