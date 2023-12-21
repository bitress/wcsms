 <?php
require_once '../../conn.php';

if (isset($_GET['class'])) {
	$class = $_GET['class'];
		
	  $query = "SELECT
	  			class_schedule.sched_id,
				subject.CourseNo,
				subject.DescTitle,
				class_schedule.sched_type,
				class_schedule.time_in, 
				class_schedule.time_out,
				class_schedule.day,
				class_schedule.room,
				CONCAT(faculty.faculty_fname,' ', faculty.faculty_lname, ' ', faculty.faculty_dletter) AS instr
				FROM
				subject
				Inner Join class_schedule ON class_schedule.course_no = subject.CourseNo
				Inner Join faculty ON class_schedule.faculty_id = faculty.faculty_id
				WHERE class_schedule.class = '$class'
				group by time_in, time_out, subject.CourseNo";
	  $result = $conn->query($query);


	  while($row = $result->fetch_array(MYSQLI_ASSOC))
	  {
	  	$time = date("h:i A", strtotime($row['time_in'])). ' - ' .date("h:i A", strtotime($row['time_out']));
	  	echo '
	  	<tr>
			<td>'.$row['CourseNo'].'</td>
			<td>'.$row['DescTitle'].' ('.$row['sched_type'].')</td>
			<td>'.$time.'</td>
			<td>'.$row['day'].'</td>
			<td>'.$row['room'].'</td>
			<td>'.$row['instr'].'</td>
			<td>
					<a href="edit_schedule.php?schedule='.$row['sched_id'].'" class= "edit_user btn btn-default btn-xs" title="Edit Schedule" ><i class="fa fa-edit"></i> Edit</a>
			</td>
		</tr>';
	  }	
}  

                            
                           

?>
