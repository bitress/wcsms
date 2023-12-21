<?php
require_once '../../conn.php';

if (isset($_POST['start'])) {
	$start = date("H:i A", strtotime($_POST['start']));
	$query = "SELECT time_end FROM `time` WHERE TIME_TO_SEC(TIMEDIFF(time_end,'$start'))/3600 <=3 AND TIME_TO_SEC(TIMEDIFF(time_end,'$start'))/3600 >= 1 AND time_end >'$start'";
	$result = $conn->query($query);
	
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$timeout = date("h:i A", strtotime($row['time_end']));
			echo "<option value = '$timeout'>";
		}
}


?>