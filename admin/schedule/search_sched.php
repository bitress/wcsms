<?php
session_start();
require_once '../../conn.php';
	$settings = $_SESSION['current_settings'];
	$output = array('data' => array());

	  $query = "SELECT
				subject.CourseNo,
				subject.DescTitle,
				class_schedule.sched_type,
				class_schedule.time_in,
				class_schedule.time_out,
				GROUP_CONCAT(class_schedule.`day` ORDER BY sched_id SEPARATOR '') AS days,
				class_schedule.room,
				CONCAT(
				class.class_course, ' ',
				class.class_year, ' ',
				class.class_section, ' ',
				class.class_major) AS class,
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname,
				faculty.faculty_dletter,
				course.course_dept 
				FROM
				class_schedule
				Inner Join class ON class.class_id = class_schedule.class_id
				Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
				Inner Join subject ON subject.CourseNo = class_schedule.course_no
				Inner Join course ON course.course_code = class.class_course
				WHERE setting_id = '$settings' 
				group by time_in, time_out, subject.CourseNo ORDER BY subject.CourseNo";
	  $result = $conn->query($query);
	  while($row = $result->fetch_array(MYSQLI_ASSOC))
	  {
	  	$time = date("h:i A", strtotime($row['time_in'])). ' - ' .date("h:i A", strtotime($row['time_out']));
	  	$type = '';
	    if ($row['sched_type'] == 'LAB') {
	     	$type = '('.$row['sched_type'].')';
	    } 
	    $mi = '';	
		if (!empty($row['faculty_mname'])) {
			$mi = substr($row['faculty_mname'], 0, 1).'.';
		}

		$dletter = '';
		if (!empty($row['faculty_dletter'])) {
			$dletter = ', '.$row['faculty_dletter'];
		}

		$output['data'][] = array(
			$row['CourseNo'],
			$row['DescTitle'].' '.$type,
			$time,
			$row['days'],
			$row['room'],
			$row['class'],
			$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter,
			$row['course_dept']
		);
	  }	

$conn->close();
echo json_encode($output);

?>

