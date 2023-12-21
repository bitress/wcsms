<?php
session_start();
if (isset($_GET)) {
	$_SESSION['class_id'] = $_GET['class'];
	header('location:class_schedule.php');
}

?>
