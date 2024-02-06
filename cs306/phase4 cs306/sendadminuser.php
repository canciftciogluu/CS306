<?php 

include "userconfig.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM users WHERE id = $selection_id";

$result = mysqli_query($db, $sql_statement);

header ("Location: useradmin.php");

}

else
{

	echo "The form is not set.";

}

?>