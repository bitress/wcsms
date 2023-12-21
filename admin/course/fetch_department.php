<?php
require_once '../../conn.php';

$query = "SELECT dept_code, dept_name FROM department";
$result = $conn->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	echo "<option value = '$row[dept_code]'>$row[dept_name]</option>";
}

?>