<?php
require_once '../../conn.php';

$user_id = $_SESSION['current_user_id'];
$query = "SELECT * FROM user WHERE faculty_id ='$user_id'";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC); 
$uname = $row['username'];
?>