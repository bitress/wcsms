<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM designation WHERE designation_id = '$sid'";
	$conn->query($query);

	echo 'Designation deleted!';

	$conn->close();
}




?>