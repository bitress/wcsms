<?php
require_once '../../conn.php';

if (isset($_POST['end'])) {
	$end = date("H:i A", strtotime($_POST['end']));
	$query = "SELECT time_start FROM `time` WHERE TIME_TO_SEC(TIMEDIFF('$end', time_start))/3600 <=3 AND TIME_TO_SEC(TIMEDIFF('$end', time_start))/3600 >= 1 AND time_start <'$end'";
	$result = $conn->query($query);

		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {		
			$timein = date("h:i A", strtotime($row['time_start']));
			echo "<option value = '$timein'>";
		}
}


?>