<?php
require_once '../../conn.php';

if(isset($_POST['sid'])){
	$sid = $_POST['sid'];
	
	$query = "DELETE FROM rank WHERE rank_id = '$sid'";
	$conn->query($query);

	echo 'Rank deleted!';

	$conn->close();
}




?>