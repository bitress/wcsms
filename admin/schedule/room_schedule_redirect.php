<?php
session_start();
if (isset($_GET)) {
	$_SESSION['room'] = $_GET['room'];
	header('location:room_schedule.php');
}

?>
