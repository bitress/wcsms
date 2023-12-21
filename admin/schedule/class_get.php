<?php
session_start();
require_once '../../conn.php';
	$class_id = $_SESSION['class_id'];
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
	    $mi = '';	
		if (!empty($row['faculty_mname'])) {
			$mi = substr($row['faculty_mname'], 0, 1).'.';
		}

		$dletter = '';
		if (!empty($row['faculty_dletter'])) {
			$dletter = ', '.$row['faculty_dletter'];
		}	
		
	    if (($daylength > 2 && strpos($days,'h') == true) || ($daylength > 1 && strpos($days,'h') == false)) {
	  		$link = 'class_edit_schedule_redirect.php?subject='.$row['CourseNo'].'&class='.$class_id;
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
			$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter,
			$actionButton
		);
	  }	

$conn->close();
echo json_encode($output);

?>

