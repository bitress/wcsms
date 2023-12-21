<?php
require_once '../../conn.php';

$user_id = $_SESSION['current_user_id'];
$query =   "SELECT
			CONCAT(
			faculty.faculty_fname,' ',
			faculty.faculty_lname, ', ',
			faculty.faculty_dletter) AS `user`,
			`user`.username
			FROM
			`user`
			Inner Join faculty ON `user`.faculty_id = faculty.faculty_id
			WHERE `user`.faculty_id = '$user_id'";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC); 
$uname = $row['username'];
$user = $row['user'];
?>