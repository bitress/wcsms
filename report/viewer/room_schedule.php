<?php
session_start();
require('html_table.php');
require_once '../../conn.php';
$currentsettings = $_SESSION['current_settings'];
$room = $_GET['room'];

			$tablehead='<table  border="1">
				<tr>
						<td width="130">Course No.</td>
						<td width="290">Descriptive Title</td>
						<td>Time</td>
						<td width="70">Day</td>
						<td width="150">Class</td>
						<td width="180">Instructor</td>	
				</tr>';

  			$query =   "SELECT
						class_schedule.sched_id,
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
		                faculty.faculty_dletter
						FROM
						class_schedule
						Inner Join class ON class.class_id = class_schedule.class_id
						Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
						Inner Join subject ON subject.CourseNo = class_schedule.course_no
						WHERE class_schedule.room = '$room' AND setting_id = '$currentsettings'
						group by time_in, time_out, subject.CourseNo ORDER BY subject.CourseNo";
  			$result = $conn->query($query);				
  			
							
$pdf=new PDF_HTML_Table();
$pdf->AddFont('GOTHIC','','GOTHIC.php');
$pdf->AddFont('GOTHICB','','GOTHICB.php');
$pdf->AddPage('L', 'Letter', 0);
$pdf->SetLeftMargin(17);
$pdf->Ln(15);
$pdf->SetFont('GOTHICB', '', 12);
$pdf->Cell(35,10, $room, 0, 0);
$pdf->ln();
$pdf->SetFont('GOTHICB', '', 10);
$pdf->WriteHTML($tablehead);
$pdf->SetFont('GOTHIC', '', 10);
while($row = $result->fetch_array(MYSQLI_ASSOC)){
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
    $instr = substr($row['faculty_fname'], 0,1).'. '.$mi.' '.$row['faculty_lname'].$dletter;		
	$tablebody ='
				<tr>
					<td width="130">'.$row['CourseNo'].'</td>
					<td width="290">'.$row['DescTitle'].' '.$type.'</td>
					<td>'.$time.'</td>
					<td width="70">'.$row['days'].'</td>
					<td width="150"	>'.$row['class'].'</td>
					<td width="180">'.$instr.'</td>
				</tr>';
$pdf->WriteHTML($tablebody);
}
$pdf->WriteHTML('</table>');	
$pdf->Output();
?>





				