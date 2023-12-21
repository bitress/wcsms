<?php
session_start();
require_once '../../conn.php';

if(isset($_SESSION['current_user_id'], $_SESSION['current_settings']) && !empty($_POST))
{
	$settings = $_SESSION['current_settings'];
	$user_id = $_SESSION['current_user_id'];
	$schedtype = $_POST['schedtype'];
	$subject = $_POST["schedsubject"];
	$instr = $_POST['schedinstr'];
	$timein= strtotime($_POST["timestart"]);
	$timeout = strtotime($_POST["timeend"]);
	$time_start = date("H:i A", $timein);
	$time_end = date("H:i A", $timeout);
	$class = $_POST['schedclass'];
	$room = $_POST['schedroom'];
	$msg = "";
	$msginfo = false;

	$queryt = "SELECT 
			   faculty.faculty_fname,
			   faculty.faculty_mname,
			   faculty.faculty_lname,
			   faculty.faculty_dletter, 
			   faculty.faculty_id 
			   FROM faculty";
	$resultt = $conn->query($queryt);
	while($row = $resultt->fetch_array(MYSQLI_ASSOC))
	{
		$mi = '';	
		if (!empty($row['faculty_mname'])) {
			$mi = substr($row['faculty_mname'], 0, 1).'.';
		}

		$dletter = '';
		if (!empty($row['faculty_dletter'])) {
			$dletter = ', '.$row['faculty_dletter'];
		}
		$faculty = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
		if ($faculty == $instr) {
			$facultyid = $row['faculty_id'];
			break;
		}
	}

	$classquery = "SELECT class_id FROM class WHERE concat(class_course, ' ', class_year, ' ', class_section, ' ', class_major) = '$class'";
	$classresult = $conn->query($classquery);
	$c_id = $classresult->fetch_array(MYSQLI_ASSOC);
	$class_id = $c_id['class_id'];


	$checkquery = "SELECT * FROM class_schedule WHERE (room = '$room' OR faculty_id = '$facultyid' OR class_id = '$class_id') AND setting_id = '$settings'";
	$checkresult = $conn->query($checkquery);
	
		$status =true;
		foreach ($_POST['day'] as $day) {

			while($checkrow = $checkresult->fetch_array(MYSQLI_ASSOC))
			{

				$start = strtotime($checkrow['time_in']);
				$end= strtotime($checkrow['time_out']);

				$intersect = min($timeout, $end) - max($timein, $start);
				if ( $intersect < 0 )
				{ 
					$intersect = 0;
				}	

				$overlap = $intersect / 3600;
	
				if($overlap > 0 && $day == $checkrow['day'])
				{
						$in = date("h:i A", $start);
						$out = date("h:i A", $end);
						$query = " SELECT 
								   faculty.faculty_fname,
								   faculty.faculty_mname,
								   faculty.faculty_lname,
								   faculty.faculty_dletter
								   FROM faculty WHERE faculty_id = '".$checkrow['faculty_id']."'";
						$result = $conn->query($query);
						$row= $result->fetch_array(MYSQLI_ASSOC);

						$mi = '';	
						if (!empty($row['faculty_mname'])) {
							$mi = substr($row['faculty_mname'], 0, 1).'.';
						}

						$dletter = '';
						if (!empty($row['faculty_dletter'])) {
							$dletter = ', '.$row['faculty_dletter'];
						}
						$faculty = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;

						echo '<table class="table">
										<tr>
											<th class="text-danger">Conflict</th>
											<td>'.$checkrow['course_no'].'</td>
											<td>'.$in.' - '.$out.'</td>
											<td>'.$checkrow['day'].'</td>
											<td>'.$checkrow['room'].'</td>
											<td>'.$faculty.'</td>
										</tr>
									</table>'; 
						
						$status = false;
						break;	
				}

			} // while

			if($status == true)
			{
				// $queryhr = "SELECT SUM(TIME_TO_SEC(TIMEDIFF(time_out,time_in))/3600) AS Hours FROM class_schedule WHERE course_no = '$subject' AND sched_type = '$schedtype' AND class_id = '$class_id' AND setting_id = '$settings'";
				// $resulthr = $conn->query($queryhr);
				// $rowhr = $resulthr->fetch_array(MYSQLI_ASSOC);
				// $rowshr = $resulthr->num_rows;
				// $hour = $rowhr['Hours'];
				// if ($rowshr > 0) 
				// {
				// 	$hr = hr($timein, $timeout) + $hour;
				// 	if ($hour < 3 && $hr <= 3) {
						$query = "INSERT INTO class_schedule VALUES(NULL, '$subject', '$schedtype', '$time_start', '$time_end', '$day', '$room', '$class_id', '$facultyid', '$settings', '$user_id')";
						$conn->query($query);
						echo '
								  <table class="table su">
										<tr>
											<th class="text-primary">Success</th>
											<td>'.$subject.'</td>
											<td>'.date("h:i A", $timein).' - '.date("h:i A", $timeout).'</td>
											<td>'.$day.'</td>
											<td>'.$room.'</td>
											<td>'.$instr.'</td>
										</tr>
									</table>';			
				// 	}
				// 	elseif($hour == 3)
				// 	{
				// 		$msgin = '<label class = "text-danger">Schedule for the subject is already completed.</label>';
				// 		$msginfo = true;
				// 	}
				// 	elseif($hr > 3)
				// 	{
				// 		$msgin = '<label class = "text-danger">Total time input is '.$hr.' hours. Max time alloted for a subject is 3 hours.</label>';
				// 		$msginfo = true;
				// 	}
					
				// }
				// else
				// {	
				// 	$query = "INSERT INTO class_schedule VALUES(NULL, '$subject', '$schedtype','$time_start', '$time_end', '$day', '$room', '$class_id', '$facultyid', '$settings', 'user_id')";
				// 	$conn->query($query);
				// 	echo '
				// 				  <table class="table su">
				// 						<tr>
				// 							<th class="text-primary">Success</th>
				// 							<td>'.$subject.'</td>
				// 							<td>'.date("h:i A", $timein).' - '.date("h:i A", $timeout).'</td>
				// 							<td>'.$day.'</td>
				// 							<td>'.$room.'</td>
				// 							<td>'.$instr.'</td>
				// 						</tr>
				// 					</table>';
				// }
			}//  status true

				
		} // for

		// if ($msginfo == true) {
		// 	echo $msgin;
		// }
		
	
}


// function hr($from, $to)
// {

// 	$total      = $to - $from;
// 	$hours      = floor($total / 60 / 60);
// 	$minutes    = round(($total - ($hours * 60 * 60)) / 60);

// 	$hr = $hours.'.'.$minutes;

// 	return $hr;
// }


	    

?>