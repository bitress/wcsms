<?php
require_once '../../conn.php';

$query = "SELECT course_code, course_name FROM course";
$result = $conn->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	echo "<option value = '$row[course_code]'>$row[course_name]</option>";
}

?>