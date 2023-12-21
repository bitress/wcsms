<?php
session_start();
require_once '../../conn.php';

if (isset($_SESSION['current_user_id']) && !empty($_POST)) {
	$id = $_SESSION['current_user_id'];

	$uname = mysqli_real_escape_string($conn, $_POST['accountuname']);
	$pword = mysqli_real_escape_string($conn, $_POST['accountpword']);
	
	$query = "UPDATE user SET username = '$uname', password = '$pword' WHERE faculty_id = '$id'";
	$conn->query($query);

	echo "Account successfully updated!";
}	

?>