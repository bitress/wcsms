<?php
session_start();
require_once '../../conn.php';
	  $instr_id = $_SESSION['instructor'];
	  $settings = $_SESSION['current_settings'];
	  $output = array('data' => array());

	  $query = "SELECT
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

	  $result = $conn->query($query);

	  while($row = $result->fetch_array(MYSQLI_ASSOC))
	  {
	  	$time = date("h:i A", strtotime($row['time_in'])). ' - ' .date("h:i A", strtotime($row['time_out']));
	  	$days = $row['days'];
		$daylength = strlen($days);
	    $link = '';
	    $icon = '';
	    $edt = '';
	    $delbtn = '';
	    $type = '';
	    if ($row['sched_type'] == 'LAB') {
	     	$type = '('.$row['sched_type'].')';
	    } 

	    if (($daylength > 2 && strpos($days,'h') == true) || ($daylength > 1 && strpos($days,'h') == false)) {
	  		$link = 'class_edit_schedule_redirect.php?subject='.$row['CourseNo'].'&class='.$row['class_id'];
	  		$icon = 'fa fa-list';
	  		$edt = ' EDIT';
	    }
	    else
	    {
	  		$link = 'edit_schedule.php?schedule='.$row['sched_id'];
	  		$icon = 'fa fa-edit';
	  		$delbtn = '<a href="#" class= "del_sched btn btn-danger btn-xs" id="'.$row['sched_id'].'" title="Delete Schedule" ><i class="fa fa-calendar-times-o"></i></a>';
	    }
	  	
		$actionButton = '<a href="'.$link.'" class= "edit_sched btn btn-default btn-xs" title="Edit Schedule" ><i class="'.$icon.'"></i>'.$edt.'</a> '.$delbtn;

		$output['data'][] = array(
			$row['CourseNo'],
			$row['DescTitle'].' '.$type,
			$time,
			$row['days'],
			$row['room'],
			$row['class'],
			$actionButton
		);
	  }	
$conn->close();
echo json_encode($output);
?>