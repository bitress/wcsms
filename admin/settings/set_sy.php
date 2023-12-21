<?php
session_start();
require_once '../../conn.php';

if (isset($_POST)) {
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];


	   $query = "SELECT * FROM settings WHERE settings_sy = '$sy' AND settings_sem = '$sem'";
	   $result = $conn->query($query);
	   $rows = $result->num_rows;

	   if ($rows == 0) {
	   		$inactive = "UPDATE settings SET settings_status = 'inactive' WHERE settings_status = 'active'";
			$conn->query($inactive);
	   		$query = "INSERT INTO settings VALUES(NULL, '$sy', '$sem', 'active')";
	  		$conn->query($query);
	   }
	   else
	   {
	   		$inactive = "UPDATE settings SET settings_status = 'inactive' WHERE settings_status = 'active'";
			$conn->query($inactive);
	   		$query = "UPDATE settings SET settings_sy = '$sy', settings_sem = '$sem', settings_status = 'active' WHERE settings_sy = '$sy' AND settings_sem = '$sem'";
	  		$conn->query($query);
	   }	
	   
	   
	}			
	

  $query = "SELECT * FROM settings WHERE settings_status = 'active'";
  $result = $conn->query($query);
  $active = $result->fetch_array(MYSQLI_ASSOC);
  $_SESSION['current_settings'] = $active['settings_id'];
  $_SESSION['current_sy'] = $active['settings_sy'];
  $_SESSION['current_sem'] = $active['settings_sem'];	
  $conn->close(); 


?>