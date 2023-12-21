<?php
require_once '../../conn.php';

$query = "SELECT designation FROM designation ORDER BY designation";
$result = $conn->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	echo "<option value = '$row[designation]'>";
}

?>