<?php
require_once '../../conn.php';
if (isset($_GET['faculty'])) {
	$facultyid = $_GET['faculty'];
	$currentsettings = $_SESSION['current_settings'];
	$query = "  SELECT
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname,
				faculty.faculty_dletter,
				faculty_load.faculty_id,
				faculty_load.civil_status,
				faculty_load.birthdate,
				faculty_load.appointment_status,
				faculty_load.salary,
				faculty_load.idno,
				faculty_load.position,
				faculty_load.rank,
				faculty_load.bachelor_deg,
				faculty_load.bachelor_ma,
				faculty_load.bachelor_mi,
				faculty_load.voc_tech,
				faculty_load.masteral_deg,
				faculty_load.masteral_dletter,
				faculty_load.masteral_ma,
				faculty_load.doctoral_deg,
				faculty_load.doctoral_dletter,
				faculty_load.doctoral_ma,
				faculty.faculty_dept,
				faculty_load.faculty_desg,
				faculty_load.cse,
				faculty_load.expyrs_public,
				faculty_load.expyrs_private
				FROM
				faculty_load
				Inner Join faculty ON faculty.faculty_id = faculty_load.faculty_id 
				WHERE faculty_load.faculty_id = '$facultyid'";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$fname = $row['faculty_fname'];
	$mname = $row['faculty_mname'];
	$lname = $row['faculty_lname'];
	$dletter = $row['faculty_dletter'];
	$fid = $row['faculty_id'];
	$cstatus = $row['civil_status'];
	$bdate = strtotime($row['birthdate']);
	$birthdate = date("Y-m-d", $bdate);
	$birthdate2 = date("d/m/Y", $bdate);
	$apstatus = $row['appointment_status'];
	$salary = $row['salary'];
	$idno = $row['idno'];
	$pos = $row['position'];
	$rank = $row['rank'];
	$bachdeg = $row['bachelor_deg'];
	$bachma = $row['bachelor_ma'];
	$bachmi = $row['bachelor_mi'];
	$voctech = $row['voc_tech'];
	$masdeg = $row['masteral_deg'];
	$masdletter = $row['masteral_dletter'];
	$masma = $row['masteral_ma'];
	$docdeg = $row['doctoral_deg'];
	$docdletter = $row['doctoral_dletter'];
	$docma = $row['doctoral_ma'];
	$fdept = $row['faculty_dept'];
	$fdesg = $row['faculty_desg'];
	$cse = $row['cse'];
	$pub = $row['expyrs_public'];
	$pri = $row['expyrs_private'];



	// $r_query = "SELECT * FROM research WHERE faculty_id = '$facultyid'";
	// $r_result = $conn->query($r_query);
	// $r_row = $r_result->fetch_array(MYSQLI_ASSOC);
	// $rid = $r_row['research_id'];
	// $rtitle = $r_row['research_title'];
	// $rfrom = $r_row['from'];
	// $rto = $r_row['to'];
	// $rrole =$r_row['role'];
	// $rfid = $r_row['faculty_id'];

}


?>