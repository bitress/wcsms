<?php
session_start();
if (isset($_GET)) {
	$_SESSION['instructor'] = $_GET['instructor'];
	header('location:instructor_schedule.php');
}

?>
