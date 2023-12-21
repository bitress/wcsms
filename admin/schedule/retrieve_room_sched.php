<?php 
session_start();
require_once '../../conn.php';
$settings = $_SESSION['current_settings'];
$output = array('data' => array());
$cnt = 1;
$query = "SELECT room FROM class_schedule WHERE setting_id = '$settings' GROUP BY room ORDER BY room";
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