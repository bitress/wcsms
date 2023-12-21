<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM class_schedule WHERE sched_id = '$sid'";
	$conn->query($query);

	echo 'Schedule deleted!';

	$conn->close();
}




?>