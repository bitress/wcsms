<?php 
session_start();
$dept = $_SESSION['current_dept'];
$settings = $_SESSION['current_settings'];
require_once '../../conn.php';

$output = array('data' => array());
$cnt = 1;
$query =   "SELECT
			CONCAT(
			class.class_course, ' ',
			class.class_year, ' ',
			class.class_section, ' ',
			class.class_major) AS class,
			class.class_id
			FROM
			class_schedule
			Inner Join class ON class.class_id = class_schedule.class_id
			Inner Join course ON class.class_course = course.course_code
			WHERE course_dept = '$dept' AND setting_id = '$settings'
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