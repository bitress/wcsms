<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM department WHERE dept_id = '$sid'";
	$conn->query($query);

	echo 'Department deleted!';

	$conn->close();
}




?>