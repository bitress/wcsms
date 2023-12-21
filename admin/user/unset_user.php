<?php
require_once '../../conn.php';
if(isset($_POST['sid'])) 
 {  
 	  $hid = $_POST['sid'];
      $unset = "UPDATE faculty SET status = NULL WHERE faculty_id IN(SELECT faculty_id FROM user WHERE user_id ='$hid')";
      $remove = "DELETE FROM user WHERE user_id = '$hid'"; 
      
      $conn->query($unset);
      $conn->query($remove);

      echo "User level unset!"; 
 }  
 ?>