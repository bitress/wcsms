<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM subject WHERE subject_id = '$sid'";
	$conn->query($query);

	echo 'Subject deleted!';

	$conn->close();
}




?>