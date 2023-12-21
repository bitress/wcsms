<?php
session_start();
require_once '../../conn.php';

if (isset($_SESSION['current_user_id']) && !empty($_POST)) {
	$id = $_SESSION['current_user_id'];

	$facultyfname = mysqli_real_escape_string($conn, $_POST['facultyfname']);
	$facultymname = mysqli_real_escape_string($conn, $_POST['facultymname']);
	$facultylname = mysqli_real_escape_string($conn, $_POST['facultylname']);
	$facultydletter = mysqli_real_escape_string($conn, $_POST['facultydletter']);
	$facultydept = mysqli_real_escape_string($conn, $_POST['facultydept']);

	$query = "UPDATE faculty SET 
			    faculty_fname = '$facultyfname',
			    faculty_mname = '$facultymname', 
			    faculty_lname = '$facultylname', 
			    faculty_dletter = '$facultydletter',
			    faculty_dept = '$facultydept'
	 			WHERE faculty_id = '$id'";
	$conn->query($query);
	echo "Profile successfully updated!";
}	

?>