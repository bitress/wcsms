<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM room WHERE room_id = '$sid'";
	$conn->query($query);

	echo 'Room deleted!';

	$conn->close();
}




?>