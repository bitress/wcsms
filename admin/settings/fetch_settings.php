<?php

require_once '../../conn.php';

$query = "SELECT * FROM settings WHERE settings_status = 'active'";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$sy = $row['settings_sy'];
$sem = $row['settings_sem'];
 
?>