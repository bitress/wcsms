<?php
session_start();
require_once '../../conn.php';
  if (isset($_POST) || isset($_SESSION['temp_id'])) {
      for ($i=1; $i <= 2; $i++) 
      {
          $currentsettings = $_SESSION['current_settings'];
          $assign= mysqli_real_escape_string($conn, $_POST['assign'.$i]);
          $as_eql = mysqli_real_escape_string($conn, $_POST['as_eql'.$i]);
          $asfid = $_POST['asfid'];
          $msg = "";
          $query = "";
          $id = "";

          if (empty($asfid)) {
            $msg = "Assignment Added!";
            $id = $_SESSION['temp_id'];
          }
          else
          {
            $msg = "Assignment Updated!";
            $id = $asfid;
          }

          if (empty($assign) && empty($as_eql)) {
            $query = "UPDATE assignment
                    SET assignment = NULL, 
                        `eql_point` = NULL
                    WHERE ascnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'"; 
          }
          else
          { 
          $query = "UPDATE assignment
                    SET assignment = '$assign', 
                        `eql_point` = '$as_eql'
                    WHERE ascnt = '$i' AND faculty_id = '$id'  AND setting_id = '$currentsettings'";
          }          
          $conn->query($query);  

      }
      echo $msg;  
  }

    

?>

