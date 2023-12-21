<?php
require('html_table.php');
$currentsettings = $_SESSION['current_settings'];
$instr_id = $_GET['instructor'];

			$tablehead='<table  border="1">
				<tr>
						<td width="130">Course No.</td>
						<td width="350">Descriptive Title</td>
						<td>Time</td>
						<td width="70">Day</td>
						<td width="70">Room</td>
						<td width="200">Class</td>	
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
						class.class_major) AS class
						FROM
						class_schedule
						Inner Join class ON class.class_id = class_schedule.class_id
						Inner Join faculty ON faculty.faculty_id = class_schedule.faculty_id
						Inner Join subject ON subject.CourseNo = class_schedule.course_no
						WHERE class_schedule.faculty_id = '$instr_id' AND setting_id = '$currentsettings'
						group by time_in, time_out, subject.CourseNo";
  			$result = $conn->query($query);				


	$instrquery = "	SELECT
					faculty.faculty_fname,
		            faculty.faculty_mname,
		            faculty.faculty_lname,
		            faculty.faculty_dletter
					FROM
					faculty
					WHERE faculty.faculty_id = '$instr_id'";		
	$instrresult = $conn->query($instrquery);
	$instrrow = $instrresult->fetch_array(MYSQLI_ASSOC);
	$mi = '';   
    if (!empty($instrrow['faculty_mname'])) {
        $mi = substr($instrrow['faculty_mname'], 0, 1).'.';
    }

    $dletter = '';
    if (!empty($instrrow['faculty_dletter'])) {
        $dletter = ', '.$instrrow['faculty_dletter'];
    }
	$instr = $instrrow['faculty_fname'].' '.$mi.' '.$instrrow['faculty_lname'].$dletter;
							
$pdf=new PDF_HTML_Table();
$pdf->AddFont('GOTHIC','','GOTHIC.php');
$pdf->AddFont('GOTHICB','','GOTHICB.php');
$pdf->AddPage('L', 'Letter', 0);
$pdf->SetLeftMargin(17);
$pdf->Ln(15);
$pdf->SetFont('GOTHICB', '', 12);
$pdf->Cell(35,10, $instr, 0, 0);
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
	$tablebody ='
				<tr>
					<td width="130">'.$row['CourseNo'].'</td>
					<td width="350">'.$row['DescTitle'].' '.$type.'</td>
					<td>'.$time.'</td>
					<td width="70">'.$row['days'].'</td>
					<td width="70"	>'.$row['room'].'</td>
					<td width="200">'.$row['class'].'</td>
				</tr>';
$pdf->WriteHTML($tablebody);				
}	
$pdf->WriteHTML('</table>');
$pdf->Ln(20);
$pdf->Sign();
$pdf->Output();
?>





				