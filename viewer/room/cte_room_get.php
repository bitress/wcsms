<?php
	require_once '../../conn.php';
	$settings = $_SESSION['current_settings'];
	$query =   "SELECT
				class_schedule.room
				FROM
				class_schedule
				Inner Join room ON room.room_no = class_schedule.room
				WHERE room_dept = 'CTE' AND setting_id = '$settings'
				GROUP BY room";
	$result	= $conn->query($query);		

?>