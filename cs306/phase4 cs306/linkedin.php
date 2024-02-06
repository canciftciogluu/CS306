<!DOCTYPE html>
<html>
<head>
	<title> LinkedIn </title>
	
<style>
	.post {
		width: 20%;
 		margin: 0 auto;
  		position: relative;
 		flex-wrap: wrap;
  		justify-content: left;
	}

	.author .name {
 	 font-size: larger;
	 font-weight: bold;
	}
	.box {
  		background-color: lightgrey;
	}
	.center {
    text-align: center;
	}


	.date {
 	 	position: absolute;
		top: 0;
 		right: 0;
	}

	button {
		color: #ffffff;
		background-color: transparent;
		font-size: 19px;
		border: 1px transparent;
		padding: 15px 75px;
		cursor: pointer
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
	button:hover {
		color: #2d63c8;
		background-color: #ffffff;
	}
	

	input[type=submit]:hover {
 		background-color: #2dd2be;
	}
	body
	{
   		background-image:url('bg4.jpg');
		background-size: cover;
		background-repeat: repeat-y;
		height: 100vh;
	}
</style>
</head>

<body>
<center>
	<h1>LinkedIn Feed</h1>
</center>
</body>
</html>


<?php

include "userconfig.php";

$sql_statement = "SELECT * FROM post";



$result = mysqli_query($db, $sql_statement);

$sql3 = "SELECT * FROM connections";


while($row = mysqli_fetch_assoc($result))
{
	
	$author_comp = $row['author_comp'];
	$author_usr = $row['author_usr'];
	$date = $row['date'];
	$id = $row['id'];
	$text = $row['text'];
	if($author_usr!=NULL){
		$sql2 = "SELECT first_name FROM users WHERE id='$author_usr'";
		$result2 = mysqli_query($db, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$first_name = $row2['first_name'];

	}
	else{
		$sql2 = "SELECT name FROM company WHERE id='$author_comp'";
		$result2 = mysqli_query($db, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$first_name = $row2['name'];
	}
	
	

	echo '<div class="post">';
	echo '  <div class="author">';
	echo '    <span class="name">' . $first_name . '</span>';
	echo '  </div>';
	echo '  <div class="content">';
	echo '    <p>' . $text . '</p>';
	echo '  </div>';
	echo '  <div class="date">';
	echo '    ' . $date;
	echo '  </div>';
	echo '</div>';
	echo '<br><br>';
}

$result4 = mysqli_query($db, $sql3);

while($row = mysqli_fetch_assoc($result4)){
	

    $id1= $row['user1'];
    $id2= $row['user2'];

    $sql22 = "SELECT first_name FROM users WHERE id=$id1";
    $result1 = mysqli_query($db, $sql22);
    $row1 = mysqli_fetch_assoc($result1);
    $name1 = $row1['first_name'];

    $sql22 = "SELECT first_name FROM users WHERE id=$id2";
    $result2 = mysqli_query($db, $sql22);
    $row2 = mysqli_fetch_assoc($result2);
    $name2 = $row2['first_name'];



	echo '<div class="center">';
	echo "<p> $name1   connected with   $name2  ! </p>";
	echo '</div>';
	echo' <br>';

}

?>
<center>
<html>
<head>
	<style>
		button {
			color: #ffffff;
			background-color: #2d63c8;
			font-size: 19px;
			border: 1px solid #2d63c8;
			padding: 15px 50px;
			cursor: pointer
		}
		button:hover {
			color: #2d63c8;
			background-color: #ffffff;
		}
	</style>
</head>
<a href="http://localhost/support.php">
   <button>Visit Support Page</button>
</a>

</html>

