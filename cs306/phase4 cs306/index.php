<!DOCTYPE html>
<html>
<head>
	<title>Index Page</title>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  width: 100%;
  color: white;
  padding: 14px 20px;
  display: inline-block;
  margin: 8px 0;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 4px;
}




input[type=submit]:hover {
  background-color: #45a049;
}

.button2 {
  background-color: #EA9999;
  border: none;
  color: white;
  padding: 15px 30px;
  text-align: left;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  } /* Blue */

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


</head>
<body>


<div align="center">
<b>CS 306 Database Project </b>
<br>
<br>Here we can see our user data
<br>
<br>

<?php 
include "users.php";
?>

<form action="sendmsguser.php" method="POST">
	<input type="text" id="id" name="first_name" placeholder="Type your name"><br>
	<textarea name="last_name" placeholder="Type your last name" rows="10" cols="100"></textarea><br>
	<textarea name="password" placeholder="Type your password" rows="10" cols="100"></textarea><br>
  
	<button class="button2">SEND IT</button>
</form>
</div>
</body>
</html>