<?php 
session_start();
require '../../conn.php';
$dept = $_SESSION['current_dept'];
$settings = $_SESSION['current_settings'];

if (isset($_POST)) {
	$sched = $_POST['sched'];
	if ($sched == 'class') 
	{
		$query =   "SELECT
					class_schedule.class_id,
					CONCAT(
					class.class_course, ' ',
					class.class_year, ' ',
					class.class_section, ' ',
					class.class_major) AS class
					FROM
					class_schedule
					Inner Join class ON class.class_id = class_schedule.class_id
					Inner Join course ON course.course_code = class.class_course
					WHERE course.course_dept = '$dept' AND setting_id = '$settings'
					GROUP BY class ORDER BY class";
		$result = $conn->query($query);
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<option value = "'.$row['class_id'].'">'.$row['class'].'</option>';
		}			
	}
	elseif ($sched == 'room')
	{
		$query =   "SELECT
					class_schedule.room
					FROM
					class_schedule
					Inner Join room ON room.room_no = class_schedule.room
					WHERE room_dept = '$dept' AND setting_id = '$settings' 
					GROUP BY room ORDER BY room";
		$result = $conn->query($query);
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<option value = "'.$row['room'].'">'.$row['room'].'</option>';
		}	
	}
	elseif ($sched == 'instructor') 
	{
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
					faculty.faculty_lname
					ORDER BY faculty.faculty_lname";
		$result = $conn->query($query);
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

			$mi = '';	
			if (!empty($row['faculty_mname'])) {
				$mi = substr($row['faculty_mname'], 0, 1).'.';
			}

			$dletter = '';
			if (!empty($row['faculty_dletter'])) {
				$dletter = ', '.$row['faculty_dletter'];
			}
			echo '<option value = "'.$row['faculty_id'].'">'.$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter.'</option>';
		}				
	}	

}


?>