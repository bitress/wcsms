<?php
session_start();
require_once '../../conn.php';
  if (isset($_POST) || isset($_SESSION['temp_id'])) {
      for ($i=1; $i <= 2; $i++) 
      {
          $currentsettings = $_SESSION['current_settings'];
          $adproject= mysqli_real_escape_string($conn, $_POST['admin'.$i]);
          $ad_eql = mysqli_real_escape_string($conn, $_POST['ad_eql'.$i]);
          $adfid = $_POST['adfid'];
          $msg = "";
          $query = "";
          $id = "";

          if (empty($adfid)) {
            $msg = "Administration Project Added!";
            $id = $_SESSION['temp_id'];
          }
          else
          {
            $msg = "Administration Project Updated!";
             $id = $adfid;
          }

          if (empty($adproject) && empty($ad_eql)) {
            $query = "UPDATE administration
                    SET admin_project = NULL, 
                        `eql_point` = NULL
                    WHERE adcnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'"; 
          }
          else
          { 
          $query = "UPDATE administration
                    SET admin_project = '$adproject', 
                        `eql_point` = '$ad_eql'
                    WHERE adcnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'";
          }          
          $conn->query($query);  

      }
      echo $msg;  
  }

    

?>

