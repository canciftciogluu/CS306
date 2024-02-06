<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>	
  <center>
<h1>Search data from users table using first name</h1>

<form method="post">
<input type="text" name="search" placeholder="Enter first name here">
<input type="submit" name="submit" value="Search">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=step4d1",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `users` WHERE first_name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	while($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Last Name</th>
			</tr>
			<tr>
				<td><?php echo $row->first_name; ?></td>
				<td><?php echo $row->last_name;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		


}

?>