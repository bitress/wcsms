<?php 
session_start();
$dept = $_SESSION['current_dept'];
$settings = $_SESSION['current_settings'];
require_once '../../conn.php';

$output = array('data' => array());
$cnt = 1;
$query =   "SELECT
			class_schedule.faculty_id,
			faculty.faculty_fname,
			faculty.faculty_mname,
			faculty.faculty_lname,
			faculty.faculty_dletter
			FROM
			class_schedule
			Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
			WHERE faculty.faculty_dept = '$dept' AND setting_id = '$settings'
			GROUP BY
			faculty.faculty_fname,
			faculty.faculty_mname,
			faculty.faculty_lname";
$result = $conn->query($query);
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a href="instructor_schedule_redirect.php?instructor='.$row['faculty_id'].'" class= "view_instructor_sched btn btn-danger btn-sm" title="View Instructor Schedule" ><i class="fa fa-eye"></i> View Schedule</a>
       			</center>
		';
		
	$mi = '';	
	if (!empty($row['faculty_mname'])) {
		$mi = substr($row['faculty_mname'], 0, 1).'.';
	}

	$dletter = '';
	if (!empty($row['faculty_dletter'])) {
		$dletter = ', '.$row['faculty_dletter'];
	}

	$output['data'][] = array(
		$cnt,
		$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter,
		$actionButton
	);

	$cnt++;
}

$conn->close();
echo json_encode($output);
?>