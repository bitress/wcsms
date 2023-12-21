<?php
session_start();
require_once '../../conn.php';

$sem = $_POST['settingssem'];
$query = "";
if (isset($_SESSION['SY'])) {

	$sessionsem = $_SESSION['SEM'];
	$sessionsy = $_SESSION['SY'];
	$activate = "";

	if (empty($sessionsem) || $sem == $sessionsem) 
	{
		$query = "UPDATE settings SET settings_sem = '$sem' WHERE settings_sy = '$sessionsy'";
	}
	elseif($sem != $sessionsem)
	{

	   $query = "SELECT * FROM settings";
	   $result = $conn->query($query);
	   
	   while($row = $result->fetch_array(MYSQLI_ASSOC))
	   {
	   		
	   		if (($row['settings_sy'] == $sessionsy && empty($sessionsem))||($row['settings_sem'] == $sem)) 
	   		{	
				$activate = "UPDATE settings SET settings_status = 'active' WHERE settings_sy = '$sessionsy' AND settings_sem = '$sem' ";
				$deactivate = "UPDATE settings SET settings_status = 'inactive' WHERE settings_sy = '$sessionsy'";
				$conn->query($deactivate);
			}		
			else
			{
				$activate = "UPDATE settings SET settings_status = 'inactive' WHERE settings_sy = '$sessionsy'";	
				$query = "INSERT INTO settings VALUES(NULL, '$sessionsy', '$sem', NULL, 'active')";
				break;
			}

		}
		
	}

}
else
{		
	   $query = "INSERT INTO settings VALUES(NULL, '$sy', NULL, NULL, 'active')";
}

  $conn->query($activate);
  $conn->query($query);

  $query = "SELECT settings_sem FROM settings WHERE settings_status = 'active'";
  $result = $conn->query($query);
  $active = $result->fetch_array(MYSQLI_ASSOC);
  $_SESSION['current_sem'] = $active['settings_sem'];	
  $conn->close(); 



?>