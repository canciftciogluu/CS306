<!DOCTYPE html>
<html>
<head>
	<title>Users</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  text-align: center;
  padding: 8px;
  color: #ffffff;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>

<div align="center">

	<table>

<tr> <th> ID </th> <th> FIRST NAME </th> <th> LAST NAME </th> <th> PASSWORD </th> <tr>

<?php

include "userconfig.php";

$sql_statement = "SELECT * FROM users";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
  $id = $row['id'];
  $firstname = $row['first_name'];
  $password = $row['password'];
	$lastname = $row['last_name'];
	

	echo "<tr>" . "<th>" . $id . "</th>" . "<th>" . $firstname . "</th>" . "<th>" . $lastname . "</th>" . "<th>" . $password . "</th>" . "<tr>" ;
}

?>

</table>
</div>

</body>
</html>