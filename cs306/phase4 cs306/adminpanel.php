<!DOCTYPE html>
<html>
<?php
if(isset($_POST["submit1"])){
header('Location:index.php');
}

if(isset($_POST["submit2"])){
header('Location:delete.php');
}

if(isset($_POST["submit3"])){
	header('Location:selection.php');
}
?>



<head>
	<title> Admin Panel </title>
	<link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	.nav-link {
  	color: purple; /* or any other color value */
	}
	input[type=text],
    select {
      width: 10%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline;
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
	button {
		color: #ffffff;
		background-color: transparent;
		font-size: 19px;
		border: 1px transparent;
		padding: 15px 75px;
		cursor: pointer
	}
	button:hover {
		color: #2d63c8;
		background-color: #ffffff;
	}
	input[type=submit]:hover {
  		background-color: #2dd2be;
	}
	</style>
</head>

<body>
<nav class="navbar navbar-light" style="background-color: #effeff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="adminpanel.php" color: #a4fffd >Admin Page</a>
      <a class="nav-link" href="delete.php">Deletion Page</a>
      <a class="nav-link" href="index.php">Index/Insertion Page</a>
      <a class="nav-link" href="selection.php">Selection Page</a>
      <a class="nav-link" href="linkedin.php">LinkedIn Feed</a>
	  <a class="nav-link" href="adminsupport.php">Admin Support Page</a>
	  
    </div>
  </nav>

<style>
	body
{
    background-image:url('bg3.jpg');
	background-size: cover;
	background-repeat: repeat-y;
	height: 100vh;
}
</style>


<center>
<h2 style="text-align:center;font-family:Arial;color:#301934;">Insert a new user</h2>
<form action="insertuser.php" method="POST">
<input type="text" name="id" placeholder="Type user id">
<input type="text" name="first_name" placeholder="Type user name">
<input type="text" name="last_name" placeholder="Type user last name" ></textarea>
<input type="text" name="password" placeholder="Type user password" ></textarea><br>
  
<button class="submit">Insert</button>
</form>

<h2 style="text-align:center;font-family:Arial;color:#301934;">Insert a new company</h2>
<form action="insertcompany.php" method="POST">
<input type="text" name="id" placeholder="Company id">
<input type="text" name="name" placeholder="Company's name">
<input type="text" name="city" placeholder="Company's city" ></textarea><br>
  
<button class="submit">Insert</button>
</form>

<h2 style="text-align:center;font-family:Arial;color:#301934;">Insert a new post</h2>
<form action="insertpost.php" method="POST">
<input type="text" name="id" placeholder="Post id">
<input type="text" name="date" placeholder="Post date">
<input type="text" name="text" placeholder="Post text">
<input type="text" name="author_usr" placeholder="Post author user">
<input type="text" name="author_comp" placeholder="Post author company"></textarea><br>
  
<button class="submit">Insert</button>
</form>


<h2 style="text-align:center;font-family:Arial;color:#301934;">Delete User With ID</h2>
<form action="deleteuser.php" method="POST">
<input type="text" name="id" placeholder="Choose id to delete"><br>
<button class="submit">Delete</button>
</form>

<h2 style="text-align:center;font-family:Arial;color:#301934;">Delete Post With ID</h2>
<form action="deleteuser.php" method="POST">
<input type="text" name="id" placeholder="Choose id to delete"><br>
<button class="submit">Delete</button>
</form>
<h2 style="text-align:center;font-family:Arial;color:#301934;">User List</h2>
<?php
include "users.php";
?>


</html>
