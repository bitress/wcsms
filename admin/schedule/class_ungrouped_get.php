<?php
session_start();
require_once '../../conn.php';
	$class_id = $_SESSION['class_id'];
	$subject = $_SESSION['subject'];
	$output = array('data' => array());

	  $query = "SELECT 
	  			class_schedule.sched_id,
				subject.DescTitle,
				class_schedule.sched_type,
				class_schedule.time_in, 
				class_schedule.time_out,
				class_schedule.day,
				class_schedule.room,
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname,
				faculty.faculty_dletter
				FROM
				subject
				Inner Join class_schedule ON class_schedule.course_no = subject.CourseNo
				Inner Join faculty ON class_schedule.faculty_id = faculty.faculty_id
				WHERE class_schedule.class_id = '$class_id' AND subject.CourseNo = '$subject'"; 
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

		$actionButton = '<a href="edit_schedule.php?schedule='.$row['sched_id'].'" class= "edit_user btn btn-default btn-xs" title="Edit Schedule" ><i class="fa fa-edit"></i></a>
					<a href="#" class= "del_sched btn btn-danger btn-xs" id="'.$row['sched_id'].'" title="Delete Schedule" ><i class="fa fa-calendar-times-o"></i></a>';

		$output['data'][] = array(
			$row['DescTitle'].' '.$type,
			$time,
			$row['day'],
			$row['room'],
			$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter,
			$actionButton
		);			
	  }	 

$conn->close();
echo json_encode($output);

?>


