<?php
require_once '../../conn.php';

if (isset($_GET['subject'], $_GET['class'])) {
	$subject = $_GET['subject'];
	$class = $_GET['class'];

	$query = "SELECT * FROM class_schedule WHERE $class = '$class' AND course_no = '$course'";
	$result = $conn->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);


	foreach ($row as $sched ) {
				
	}

}


?>