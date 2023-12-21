<?php
require_once '../../conn.php';
$settings = $_SESSION['current_settings'];
	  $query2 = "SELECT
	  			class_schedule.sched_id,
				subject.CourseNo,
				subject.DescTitle,
				class_schedule.sched_type,
				class_schedule.time_in, 
				class_schedule.time_out,
				GROUP_CONCAT(class_schedule.`day` ORDER BY sched_id SEPARATOR '') AS days,
				class_schedule.room,
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname,
				faculty.faculty_dletter
				FROM
				subject
				Inner Join class_schedule ON class_schedule.course_no = subject.CourseNo
				Inner Join faculty ON class_schedule.faculty_id = faculty.faculty_id
				WHERE class_schedule.class_id = '$class_id' AND setting_id = '$settings'
				group by time_in, time_out, subject.CourseNo ORDER BY subject.CourseNo";
	  $result2 = $conn->query($query2);
	  while($row2 = $result2->fetch_array(MYSQLI_ASSOC))
	  {
	  	$time = date("h:i A", strtotime($row2['time_in'])). ' - ' .date("h:i A", strtotime($row2['time_out']));
	  	$type = '';
	    if ($row2['sched_type'] == 'LAB') {
	     	$type = '('.$row2['sched_type'].')';
	    }

	    $mi = '';   
	    if (!empty($row2['faculty_mname'])) {
	        $mi = substr($row2['faculty_mname'], 0, 1).'.';
	    }

	    $dletter = '';
	    if (!empty($row2['faculty_dletter'])) {
	        $dletter = ', '.$row2['faculty_dletter'];
	    }

	  	 echo "	
	  	 		<tr>
				    <td>".$row2['CourseNo']."</td>
				    <td>".$row2['DescTitle']." ".$type."</td>
				    <td>".$time."</td>
				    <td>".$row2['days']."</td>
				    <td>".$row2['room']."</td>
				    <td>".$row2['faculty_fname'].' '.$mi.' '.$row2['faculty_lname'].$dletter."</td>
				</tr>

	  	 ";
	  }	

?>

