<?php
require_once '../../conn.php';
$dept = $_SESSION['current_dept'];
$query = "SELECT course_code, course_name FROM course WHERE course_dept = '$dept'";
$result = $conn->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	echo "<option value = '$row[course_code]'>$row[course_name]</option>";
}

?>