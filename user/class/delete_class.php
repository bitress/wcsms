<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM class WHERE class_id = '$sid'";
	$conn->query($query);

	echo 'Class deleted!';

	$conn->close();
}




?>