<?php 
session_start();
require_once '../../conn.php';
$settings = $_SESSION['current_settings'];
$output = array('data' => array());
$cnt = 1;
$query =   "SELECT
			class.class_id,
			CONCAT(
			class.class_course, ' ',
			class.class_year, ' ',
			class.class_section, ' ',
			class.class_major) AS class
			FROM
			class_schedule
			Inner Join class ON class.class_id = class_schedule.class_id 
			WHERE setting_id = '$settings'
			GROUP BY class_schedule.class_id ORDER BY class_schedule.class_id";
$result = $conn->query($query);
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a href="class_schedule_redirect.php?class='.$row['class_id'].'" class= "view_class_sched btn btn-danger btn-sm" title="View Class Schedule" ><i class="fa fa-eye"></i> View Schedule</a>
       			</center>
		';
		

	$output['data'][] = array(
		$cnt,
		$row['class'],
		$actionButton
	);

	$cnt++;
}

$conn->close();
echo json_encode($output);
?>