<?php 

include "userconfig.php";

include "users.php";

?>

<form action="sendadminuser.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT id FROM users";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult))
{
	$id = $id_rows['id'];
	echo "<option value=$id>".$id."</option>";
}

?>
</select>

<button>DELETE</button>
</form>