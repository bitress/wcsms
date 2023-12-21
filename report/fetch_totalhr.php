<?php
require_once '../conn.php';

		global $conn;
		$facultyid = $_GET['faculty'];
		$currentsettings = $_SESSION['current_settings'];
		$query = "		SELECT
						class_schedule.sched_id,
						subject.CourseNo,
						subject.DescTitle,
						subject.Units,
						class_schedule.sched_type,
						class_schedule.time_in,
						class_schedule.time_out,
						GROUP_CONCAT(class_schedule.`day` ORDER BY sched_id SEPARATOR '') AS days,
						class_schedule.room,
						class_schedule.class_id,
						CONCAT(
						class.class_course, ' ',
						class.class_year, ' ',
						class.class_section, ' ',
						class.class_major) AS class,
						class_schedule.faculty_id
						FROM
						class_schedule
						Inner Join class ON class.class_id = class_schedule.class_id
						Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
						Inner Join subject ON subject.CourseNo = class_schedule.course_no
						WHERE class_schedule.faculty_id = '$facultyid' AND setting_id = '$currentsettings'
						group by time_in, time_out, subject.CourseNo";
		$result = $conn->query($query);
		$totalhour = 0;
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
		  	$queryhr = "SELECT SUM(TIME_TO_SEC(TIMEDIFF(time_out,time_in))/3600) AS Hours FROM class_schedule WHERE course_no = '$row[CourseNo]' AND sched_type = '$row[sched_type]' AND class_id = '$row[class_id]' AND faculty_id = '$row[faculty_id]'";
			$resulthr = $conn->query($queryhr);
			$rowhr = $resulthr->fetch_array(MYSQLI_ASSOC);
			$hour = round($rowhr['Hours']);
			$wrkld = $hour;
			if ($row['sched_type'] == 'LAB') {
				$wrkld = $hour * 0.75;
			}

			$totalhour += $hour;

		}	

?>