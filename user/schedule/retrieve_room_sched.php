<?php 
session_start();
$dept = $_SESSION['current_dept'];
$settings = $_SESSION['current_settings'];
require_once '../../conn.php';

$output = array('data' => array());
$cnt = 1;
$query = 	"SELECT
			class_schedule.room
			FROM
			class_schedule
			Inner Join room ON room.room_no = class_schedule.room
			WHERE room_dept = '$dept' AND setting_id = '$settings'
			GROUP BY room";
$result = $conn->query($query);
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a href="room_schedule_redirect.php?room='.$row['room'].'" class= "view_room_sched btn btn-danger btn-sm" title="View Room Schedule" ><i class="fa fa-eye"></i> View Schedule</a>
       			</center>
		';
		

	$output['data'][] = array(
		$cnt,
		$row['room'],
		$actionButton
	);

	$cnt++;
}

$conn->close();
echo json_encode($output);
?>