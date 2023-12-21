<?php
session_start();
if (isset($_GET)) {
	$_SESSION['class_id'] = $_GET['class'];
	$_SESSION['subject'] = $_GET['subject'];
	header('location:class_edit_schedule.php');
}

?>
