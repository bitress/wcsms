<?php
	require_once '../../conn.php';
	$settings = $_SESSION['current_settings'];
	$query =   "SELECT
				class_schedule.class_id,
				CONCAT(
				class.class_course, ' ',
				class.class_year, ' ',
				class.class_section, ' ',
				class.class_major) AS class
				FROM
				class
				Inner Join class_schedule ON class.class_id = class_schedule.class_id
				Inner Join course ON course.course_code = class.class_course 
				WHERE setting_id = '$settings' AND course_dept = 'GS'
				GROUP BY class_schedule.class_id ORDER BY class_schedule.class_id";
	$result	= $conn->query($query);		

?>