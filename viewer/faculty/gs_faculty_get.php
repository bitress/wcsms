<?php
	require_once '../../conn.php';
	$settings = $_SESSION['current_settings'];
	$query =   "SELECT
				class_schedule.faculty_id,
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname,
				faculty.faculty_dletter
				FROM
				class_schedule
				Inner Join faculty ON class_schedule.faculty_id = faculty.faculty_id
				WHERE faculty_dept = 'GS' AND setting_id = '$settings'
				GROUP BY
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname
				ORDER BY faculty.faculty_lname";
	$result	= $conn->query($query);		

?>