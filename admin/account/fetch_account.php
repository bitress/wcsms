<?php
require_once '../../conn.php';

$user_id = $_SESSION['current_user_id'];
$query =   "SELECT
			faculty.faculty_fname,
			faculty.faculty_mname,
			faculty.faculty_lname,
			faculty.faculty_dletter,
			faculty.faculty_dept,
			`user`.username
			FROM
			`user`
			Inner Join faculty ON `user`.faculty_id = faculty.faculty_id
			WHERE `user`.faculty_id = '$user_id'";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC); 
$uname = $row['username'];
$fname = $row['faculty_fname'];
$mname = $row['faculty_mname'];
$lname = $row['faculty_lname'];
$dletter = $row['faculty_dletter'];
$dept = $row['faculty_dept'];
?>