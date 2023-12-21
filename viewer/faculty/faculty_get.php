<?php
require_once '../../conn.php';
$settings = $_SESSION['current_settings'];
	  $query2 =    "SELECT
					class_schedule.sched_id,
					subject.CourseNo,
					subject.DescTitle,
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
					class.class_major) AS class
					FROM
					class_schedule
					Inner Join class ON class.class_id = class_schedule.class_id
					Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
					Inner Join subject ON subject.CourseNo = class_schedule.course_no
					WHERE class_schedule.faculty_id = '$instr_id' AND setting_id = '$settings'
					group by time_in, time_out, subject.CourseNo";
	  $result2 = $conn->query($query2);
	  while($row2 = $result2->fetch_array(MYSQLI_ASSOC))
	  {
	  	$time = date("h:i A", strtotime($row2['time_in'])). ' - ' .date("h:i A", strtotime($row2['time_out']));
	  	$type = '';
	    if ($row2['sched_type'] == 'LAB') {
	     	$type = '('.$row2['sched_type'].')';
	    } 
	  	 echo "	
	  	 		<tr>
				    <td>".$row2['CourseNo']."</td>
				    <td>".$row2['DescTitle']." ".$type."</td>
				    <td>".$time."</td>
				    <td>".$row2['days']."</td>
				    <td>".$row2['room']."</td>
				    <td>".$row2['class']."</td>
				</tr>

	  	 ";
	  }	

?>

