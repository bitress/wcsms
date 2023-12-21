<?php
require_once '../../conn.php';

$query = "SELECT rank FROM rank ORDER BY rank";
$result = $conn->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	echo "<option value = '$row[rank]'>";
}

?>