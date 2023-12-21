<?php
session_start();
require_once '../fpdf/fpdf.php';
require_once '../conn.php';

class faculty_loadPDF extends FPDF
{

	function header()
	{
		$currentsy = $_SESSION['current_sy'];
		$currentsem = $_SESSION['current_sem'];

		$this->SetFont('ARIALN', '', 9);
		$this->Cell(196,10,'ILOCOS SUR POLYTECHNIC STATE COLLEGE',0,0,'C');
		$this->Ln(5);
		$this->SetFont('ARIALN');
		$this->Cell(196,10,'Tagudin Campus',0,0,'C');
		$this->Ln(5);
		$this->Cell(196,10,'Tagudin, Ilocos Sur',0,0,'C');
		$this->Ln(10);
		$this->SetFont('arialbd', '', 15);
		$this->Cell(196,10,'FACULTY LOAD',0,0,'C');
		$this->Ln(5);
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(196,10, $currentsem.', AY '.$currentsy,0,0,'C');
		$this->Ln(5);
	}

	function facultyInfo()
	{

		include 'fetch_faculty_load.php';
		global $NoofPrep;
		$mi = '';	
		if (!empty($row['faculty_mname'])) {
			$mi = substr($row['faculty_mname'], 0, 1).'.';
		}
		$faname = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'];

		$this->SetFont('ARIALN', '', 9);
		$this->Cell(25,5,'Name of Professor:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(50,5,$faname,'B',0,'L'); 
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(17,5,'Civil Status:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(30,5,$cstatus,'B',0,'L');
		$this->SetFont('ARIALN', '', 9);

		date_default_timezone_set('Asia/Manila');
		$datenow = date('Y-m-d');
		$d1 = new DateTime($datenow);
		$d2 = new DateTime($birthdate);
		$diff = $d2->diff($d1);
		$age = $diff->y;
		$this->Cell(8,5,'Age:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(7,5,$age,'B',0,'C');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(29,5,'Status of Appointment:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(23,5,$apstatus,'B',0,'L');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(19,5,'Salary/Month:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(30,5, 'P'.$salary.'.00','B',0,'L');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(11,5,'ID No.:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(26,5, $idno ,'B',0,'L');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(23,5,'Plantilla/Position:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(29,5, $pos,'B',0,'L');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(10,5,'Code:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(20,5,'','B',0,'L');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(26,5,'Faculty Rank (NBC):',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(46,5, $rank,'B',0,'L');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(10,5,'Code:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(20,5,'','B',0,'L');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(77,5,'Degree/s:',0,0,'');
		$this->Cell(15,5,'CODE',0,0,'');
		$this->Cell(79,5,'Graduate:',0,0,'');
		$this->Cell(15,5,'CODE',0,0,'');
		$this->ln();
		$this->Cell(24,5,'Undergraduate:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(45,5, $bachdeg,'B',0,'L');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(12,5,'(          )','B',0,'C');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(21,5,'Masteral:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(52,5, $masdeg,'B',0,'L');
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(16,5,'(          )','B',0,'C');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(24,5,'Major:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(45,5, $bachma,'B',0,'L');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(12,5,'(          )','B',0,'C');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(21,5,'Major:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(52,5, $masma,'B',0,'L');
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(16,5,'(          )','B',0,'C');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(24,5,'Minor:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(45,5, $bachmi,'B',0,'L');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(12,5,'(          )','B',0,'C');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(21,5,'Doctoral:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(52,5, $docdeg,'B',0,'L');
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(16,5,'(          )','B',0,'C');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(24,5,'Voc/Technical:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(45,5, $voctech,'B',0,'L');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(12,5,'(          )','B',0,'C');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(21,5,'Major:',0,0,'R');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(52,5, $docma,'B',0,'L');
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(16,5,'(          )','B',0,'C');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(34,5,'Teaching Load (Hrs/Week):',0,0,'');
		$this->SetFont('cambriab', '', 9);
		include 'fetch_totalhr.php';
		$this->Cell(35,5, $totalhour,'B',0,'L');
		$this->Cell(27,5,'','0',0,'');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(34,5,'Other Designations/Assignments:',0,0,'');
		$this->ln();
		$this->Cell(24,5,'Department/Unit:',0,0,'L');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(45,5, $fdept,'B',0,'L');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(7,5,'','0',0,'');
		$this->Cell(12,5,'(          )','B',0,'C');
		$this->Cell(9,5,'','0',0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(87,5, $fdesg,'B',0,'C');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(24,5,'CS Eligibility/ies:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(160,5, $cse,'B',0,'L');
		$this->ln();
		$this->SetFont('ARIALN', '', 9);

		$query = "SELECT course_no FROM class_schedule WHERE faculty_id = '$fid' GROUP BY course_no";
		$result = $conn->query($query);
		$NoofPrep = $result->num_rows;
		$this->Cell(26,5,'No. of Preparations:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(43,5, $NoofPrep,'B',0,'L');
		$this->Cell(8,5,'','0',0,'');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(35,5,'Yrs. of Experience in Public:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(25,5, $pub,'B',0,'L');
		$this->Cell(8,5,'','0',0,'');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(14,5,'In Private:',0,0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(25,5,$pri,'B',0,'C');
		
	}

	function tableHeader()
	{
			
		$this->SetFont('arialbd', '', 8);
		$this->Cell(23,5,'Time',1,0,'C');
		$this->Cell(12,5,'Days',1,0,'C');
		$this->Cell(20,5,'Subject',1,0,'C');
		$this->Cell(45,5,'Descriptive Title',1,0,'C');
		$this->Cell(25,5,'Course,Yr & Sec.',1);
		$this->Cell(10,5,'Units',1,0,'C');
		$this->SetFont('arialbd', '', 7);
		$this->Cell(12,5,'Hrs./Wk',1,0,'C');
		$this->Cell(12,5,'Eql Wrkld',1,0,'C');
		$this->Cell(12,5,'# of Stud',1,0,'C');
		$this->SetFont('arialbd', '', 7);
		$this->Cell(13,5,'Rm.',1,0,'C');
		$this->ln();

	}

	function tableBody()
	{
		global $conn;
		global $totalwrkld;
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
		$totalunits = 0;
		$totalhour = 0;
		$totalwrkld = 0;
		$fontSize = 8;
		$tempfontSize = $fontSize;
		$tempfontSize1 = $fontSize;
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

		  	$time = date("h:i", strtotime($row['time_in'])). ' - ' .date("h:i", strtotime($row['time_out']));
		  	$type = '';
			if ($row['sched_type'] == 'LAB')
			{
			   $type = '('.$row['sched_type'].')';
			}

			$totalunits += $row['Units'];
			$totalhour += $hour;
			$totalwrkld += $wrkld;

				$this->Cell(23,5, $time,1,0,'C');
				$this->Cell(12,5, $row['days'],1,0,'C');
				$cellWidth = 20;
				while ($this->GetStringWidth($row['CourseNo'].$type) > $cellWidth) {
					$this->SetFontSize($tempfontSize -= 0.1);
				}
				$this->Cell($cellWidth,5, $row['CourseNo'].$type,1,0,'C');
				$tempfontSize = $fontSize;
				$this->SetFontSize($fontSize);

				$cellWidth1 = 45;
				while ($this->GetStringWidth($row['DescTitle']) > $cellWidth1) {
					$this->SetFontSize($tempfontSize1 -= 0.1);
				}
				$this->Cell($cellWidth1,5, $row['DescTitle'],1,0,'C');
				$tempfontSize1 = $fontSize;
				$this->SetFontSize($fontSize);

				$this->Cell(25,5, $row['class'],1,0,'C');
				$this->Cell(10,5, $row['Units'],1,0,'C');
				$this->Cell(12,5, $hour,1,0,'C');
				$this->Cell(12,5, $wrkld,1,0,'C');
				$this->Cell(12,5,'',1,0,'C');
				$this->Cell(13,5,$row['room'],1,0,'C');
				$this->ln();
		}	

		$this->SetFont('arial', '', 8);
		$this->Cell(23,5,'',0,0,'C');
		$this->Cell(12,5, '',0,0,'C');
		$this->Cell(20,5, '',0,0,'C');
		$this->SetFont('arialbd', '', 8);
		$this->Cell(45,5, 'TOTAL UNITS:',1,0,'C');
		$this->Cell(25,5, '',1,0,'C');
		$this->Cell(10,5, $totalunits,1,0,'C');
		$this->Cell(12,5, $totalhour,1,0,'C');
		$this->Cell(12,5, $totalwrkld,1,0,'C');
		$this->Cell(12,5,'',1,0,'C');
		$this->Cell(13,5,'',1,0,'C');
	}

	function research()
	{
		global $conn;
	
		$this->SetFont('arialbd', '', 8);
		$this->Cell(89,5,'II. RESEARCH (Specify the Title)',0,0,'L');
		$this->Cell(15,5,'FROM',0,0,'C');
		$this->Cell(5,5,'','0',0,''); //BR
		$this->Cell(15,5,'TO',0,0,'C');
		$this->Cell(10,5,'','0',0,''); //BR
		$this->Cell(25,5,'ROLE',0,0,'C');
		$this->Cell(10,5,'','0',0,''); //BR
		$this->Cell(15,5,'EQL',0,0,'C');
		$this->ln();
		$this->SetLeftMargin(21);

		$facultyid = $_GET['faculty'];
        $r_query = "SELECT * FROM research WHERE faculty_id = '$facultyid'";
   		$r_result = $conn->query($r_query);
    	$i = 1;
       	while($r_row = $r_result->fetch_array(MYSQLI_ASSOC)){
			$rtitle = $r_row['research_title'];
			$rcnt = $r_row['rcnt'];
	        $rfrom = $r_row['from'];
	      	$rto = $r_row['to'];
	    	$rrole =$r_row['role'];
	   		$reql =$r_row['eql'];

			$this->SetFont('ARIALN', '', 9);
			$this->Cell(4,5, $rcnt.'.',0,0,'L'); //1
			$this->SetFont('cambriab', '', 9);
			$this->Cell(69,5, $rtitle,'B',0,'L'); //title
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(15,5, $rfrom,'B',0,'C'); //from
			$this->Cell(5,5,'','0',0,'');
			$this->Cell(15,5, $rto,'B',0,'C'); //to
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(25,5, $rrole,'B',0,'C'); //role
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(15,5, $reql,'B',0,'C'); //eql
			$this->ln();
		$i++;
		}
		$this->SetLeftMargin(15);
	}

	function extension()
	{
		global $conn;

		$this->SetFont('arialbd', '', 8);
		$this->Cell(89,5,'III. EXTENSION/PRODUCTION (Specify the Project)',0,0,'L');
		$this->Cell(15,5,'FROM',0,0,'C');
		$this->Cell(5,5,'','0',0,''); //BR
		$this->Cell(15,5,'TO',0,0,'C');
		$this->Cell(10,5,'','0',0,''); //BR
		$this->Cell(25,5,'ROLE',0,0,'C');
		$this->Cell(10,5,'','0',0,''); //BR
		$this->Cell(15,5,'EQL',0,0,'C');
		$this->ln();
		$this->SetLeftMargin(21);

        $facultyid = $_GET['faculty'];
        $e_query = "SELECT * FROM extension WHERE faculty_id = '$facultyid'";
        $e_result = $conn->query($e_query);
        $i = 1;
        while($e_row = $e_result->fetch_array(MYSQLI_ASSOC)){
	          $ext = $e_row['ext_project'];
	          $ecnt = $e_row['ecnt'];
	          $efrom = $e_row['from'];
	          $eto = $e_row['to'];
	          $erole =$e_row['role'];
	          $eeql =$e_row['eql_point'];

			$this->SetFont('ARIALN', '', 9);
			$this->Cell(4,5, $ecnt.'.',0,0,'L'); //1
			$this->SetFont('cambriab', '', 9);
			$this->Cell(69,5, $ext,'B',0,'L'); //title
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(15,5, $efrom,'B',0,'C'); //from
			$this->Cell(5,5,'','0',0,'');
			$this->Cell(15,5, $eto,'B',0,'C'); //to
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(25,5, $erole,'B',0,'C'); //role
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(15,5, $eeql,'B',0,'C'); //eql
			$this->ln();

		$i++;
		}
		$this->SetLeftMargin(15);
	}

	function administration()
	{
		global $conn;

		$this->SetFont('arialbd', '', 8);
		$this->Cell(89,5,'IV. ADMINISTRATION (Specify the Project)',0,0,'L');
		$this->ln();
		$this->SetLeftMargin(21);

		$facultyid = $_GET['faculty'];
        $ad_query = "SELECT * FROM administration WHERE faculty_id = '$facultyid'";
        $ad_result = $conn->query($ad_query);
        $i = 1;
        while($ad_row = $ad_result->fetch_array(MYSQLI_ASSOC)){
	        $adproject = $ad_row['admin_project'];
	        $adcnt =$ad_row['adcnt'];
	        $adeql =$ad_row['eql_point'];
	        $adfid = $ad_row['faculty_id'];

			$this->SetFont('ARIALN', '', 9);
			$this->Cell(4,5, $adcnt.'.',0,0,'L'); //1
			$this->SetFont('cambriab', '', 9);
			$this->Cell(149,5, $adproject,'B',0,'L'); //title
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(15,5, $adeql,'B',0,'C'); //eql
			$this->ln();
		$i++;
		}
		$this->SetLeftMargin(15);
	}

	function assignment()
	{
		global $conn;

		$this->SetFont('arialbd', '', 8);
		$this->Cell(89,5,'V. OTHER ASSIGNMENTS',0,0,'L');
		$this->ln();
		$this->SetLeftMargin(21);

		$facultyid = $_GET['faculty'];
        $as_query = "SELECT * FROM assignment WHERE faculty_id = '$facultyid'";
        $as_result = $conn->query($as_query);
        $i = 1;
        while($as_row = $as_result->fetch_array(MYSQLI_ASSOC)){
        	$assign = $as_row['assignment'];
        	$ascnt = $as_row['ascnt'];
        	$aseql =$as_row['eql_point'];

			$this->SetFont('ARIALN', '', 9);
			$this->Cell(4,5, $ascnt.'.',0,0,'L'); //1
			$this->SetFont('cambriab', '', 9);
			$this->Cell(149,5, $assign,'B',0,'L'); //title
			$this->Cell(10,5,'','0',0,'');
			$this->Cell(15,5, $aseql,'B',0,'C'); //eql
			$this->ln();
		$i++;	
		}	
		
		$this->SetLeftMargin(15);
		
	}

	function total()
	{	
		global $conn;
		global $totalwrkld;
		global $NoofPrep;
		$facultyid = $_GET['faculty'];
		$rquery = "SELECT SUM(eql) AS rsumeql FROM research WHERE faculty_id = '$facultyid'";
		$rresult = $conn->query($rquery);
		$rrow = $rresult->fetch_array(MYSQLI_ASSOC);
		$rsumeql = $rrow['rsumeql'];

		$equery = "SELECT SUM(eql_point) AS esumeql FROM extension WHERE faculty_id = '$facultyid'";
		$eresult = $conn->query($equery);
		$erow = $eresult->fetch_array(MYSQLI_ASSOC);
		$esumeql = $erow['esumeql'];

		$adquery = "SELECT SUM(eql_point) AS adsumeql FROM administration WHERE faculty_id = '$facultyid'";
		$adresult = $conn->query($adquery);
		$adrow = $adresult->fetch_array(MYSQLI_ASSOC);
		$adsumeql = $adrow['adsumeql'];

		$asquery = "SELECT SUM(eql_point) AS assumeql FROM assignment WHERE faculty_id = '$facultyid'";
		$asresult = $conn->query($asquery);
		$asrow = $asresult->fetch_array(MYSQLI_ASSOC);
		$assumeql = $asrow['assumeql'];

		// $desgquery = "	SELECT
		// 				designation.designation_eql_point
		// 				FROM
		// 				faculty_load
		// 				Inner Join designation ON designation.designation = faculty_load.faculty_desg
		// 				WHERE faculty_id = '$facultyid'";
		// $desgresult = $conn->query($desgquery);
		// $desgrow = $desgresult->fetch_array(MYSQLI_ASSOC);
		// $desgeql = $desgrow['designation_eql_point'];

		$excessPrep = "";
		if ($NoofPrep > 3) {
			$excess = $NoofPrep - 3;
			$excessPrep = $excess * 0.33;
		}

		$eqlworkld = array($rsumeql, $esumeql, $adsumeql, $assumeql, $totalwrkld);
							
		$totaeqlworkload = array_sum($eqlworkld);

		$this->SetFont('arialbd', '', 8);
		$this->Cell(110,5,'',0,0,'L');
		$this->Cell(49,5,'IN EXCESS OF 3 PREPARATIONS',0,0,'R');
		$this->Cell(10,5,'','0',0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(15,5, $excessPrep,'B',0,'C'); //eql
		$this->ln();
		$this->Cell(110,5,'',0,0,'L');
		$this->SetFont('arialbd', '', 8);
		$this->Cell(49,5,'TOTAL EQUIVALENT WORK LOAD',0,0,'R');
		$this->Cell(10,5,'','0',0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(15,5, $totaeqlworkload,'B',0,'C'); //eql
		$this->ln();
		$this->Cell(110,5,'',0,0,'L');
		$this->SetFont('arialbd', '', 8);
		$this->Cell(49,5,'TOTAL EXCESS WORK LOAD',0,0,'R');
		$this->Cell(10,5,'','0',0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(15,5,'','B',0,'L'); //eql
		$this->ln();
	}

	function signatories()
	{
		global $conn;
		$facultyid = $_GET['faculty'];
		$query = "  SELECT
					faculty.faculty_fname,
					faculty.faculty_mname,
					faculty.faculty_lname,
					faculty.faculty_dletter,
					faculty.faculty_dept,
					faculty_load.faculty_desg
					FROM
					faculty_load
					Inner Join faculty ON faculty.faculty_id = faculty_load.faculty_id 
					WHERE faculty_load.faculty_id = '$facultyid'";
		$result = $conn->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		$mi = '';	
		if (!empty($row['faculty_mname'])) {
			$mi = substr($row['faculty_mname'], 0, 1).'.';
		}

		$dletter = '';
		if (!empty($row['faculty_dletter'])) {
			$dletter = ', '.$row['faculty_dletter'];
		}	
		$faculty = strtoupper($row['faculty_fname']).' '.$mi.' '.strtoupper($row['faculty_lname']).$dletter;
		$conforme = strtoupper($row['faculty_fname']).' '.$mi.' '.strtoupper($row['faculty_lname']);
		$faculty_desg = $row['faculty_desg'].', '. $row['faculty_dept'];

		$this->SetFont('ARIALN', '', 9);
		$this->Cell(77,5,'Prepared by:',0,0,'');
		$this->ln(10);
		$this->SetFont('cambriab', '', 9);
		$this->Cell(70,5, $faculty,'B',0,'C');
		$this->Cell(44,5,'','0',0,'');
		$this->Cell(70,5, $conforme,'B',0,'C');
		$this->ln(5);
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(70,5, $faculty_desg,'0',0,'C');
		$this->Cell(44,5,'','0',0,'');
		$this->Cell(70,5,'Conforme','0',0,'C');
		$this->ln(10);
		$this->Cell(113,5,'','0',0,'');
		$this->Cell(77,5,'Recommending Approval:',0,0,'');
		$this->ln(10);
		$queryCED = "  SELECT
					faculty.faculty_fname,
					faculty.faculty_mname,
					faculty.faculty_lname,
					faculty.faculty_dletter,
					faculty.faculty_dept,
					faculty_load.faculty_desg
					FROM
					faculty_load
					Inner Join faculty ON faculty.faculty_id = faculty_load.faculty_id 
					WHERE faculty_load.faculty_desg = 'Campus Executive Director'";
		$resultCED = $conn->query($queryCED);
		$rowCED = $resultCED->fetch_array(MYSQLI_ASSOC);

		$miCED = '';
		if (!empty($rowCED['faculty_mname'])) {
			$miCED = substr($rowCED['faculty_mname'], 0, 1).'.';
		}

		$dletterCED = '';
		if (!empty($rowCED['faculty_dletter'])) {
			$dletterCED = ', '.$rowCED['faculty_dletter'];
		}
		$CED = strtoupper($rowCED['faculty_fname']).' '.$miCED.' '.strtoupper($rowCED['faculty_lname']).$dletterCED;
		$this->Cell(114,5,'','0',0,'');
		$this->SetFont('cambriab', '', 9);
		$this->Cell(70,5,$CED,'B',0,'C');
		$this->ln(5);
		$this->Cell(114,5,'','0',0,'');
		$this->SetFont('ARIALN', '', 9);
		$this->Cell(70,5,'Campus Executive Director','0',0,'C');
		$this->ln(10);
		$this->Cell(184,5,'APPROVED: By the Authority of the SUC President II',0,0,'C');
		$this->ln(10);
		$this->SetFont('cambriab', '', 9);
		$this->Cell(184,5,'WILMA M. PONCE, Ed.D.',0,0,'C');
		$this->SetFont('ARIALN', '', 9);
		$this->ln(4);
		$this->Cell(184,5,'Vice President for Academic Affairs',0,0,'C');
	}

}

$pdf = new faculty_loadPDF();
$pdf->AddFont('ARIALN','','ARIALN.php');
$pdf->AddFont('arialbd','','arialbd.php');
$pdf->AddFont('cambriab','','cambriab.php');
$pdf->AddPage('P', 'Legal', 0);
$pdf->SetLeftMargin(15);
$pdf->Ln(5);
$pdf->facultyInfo();
$pdf->ln(7);
$pdf->SetFont('arialbd', '' , 8);
$pdf->Cell(10,5,'I. INSTRUCTION',0,0,'L');
$pdf->ln();
$pdf->tableHeader();
$pdf->SetFont('arial', '', 8);
$pdf->tableBody();
$pdf->ln(7);
$pdf->research();
$pdf->ln(3);
$pdf->extension();
$pdf->ln(3);
$pdf->administration();
$pdf->ln(3);
$pdf->assignment();
$pdf->ln(3);
$pdf->total();
$pdf->ln(3);
$pdf->signatories();
$pdf->Output();

function hr($from, $to)
{

	$total      = $to - $from;
	$hours      = floor($total / 60 / 60);
	$minutes    = round(($total - ($hours * 60 * 60)) / 60);

	$hrdecimal = ($minutes/60) * 100;
	if ($hrdecimal == 0) {
		$hrdecimal ='';
	}
	$hr = $hours.'.'.$hrdecimal;

	return $hr;
}
?>
