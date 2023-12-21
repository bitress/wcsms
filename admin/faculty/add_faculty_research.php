<?php
session_start();
require_once '../../conn.php';
  if (isset($_POST) || isset($_SESSION['temp_id'])) {
      for ($i=1; $i <= 4; $i++) 
      {
          $currentsettings = $_SESSION['current_settings'];
          $research = mysqli_real_escape_string($conn, $_POST['r'.$i]);
          $ryfrom = mysqli_real_escape_string($conn, $_POST['r_yearfrom'.$i]); 
          $ryto = mysqli_real_escape_string($conn, $_POST['r_yearto'.$i]);
          $role = mysqli_real_escape_string($conn, $_POST['r_role'.$i]); 
          $reql = mysqli_real_escape_string($conn, $_POST['r_eql'.$i]);
          $rfid = $_POST['rfid'];
          $msg = "";
          $query = "";
          $id = "";

          if (empty($rfid)) {
            $msg = "Research Added!";
            $id = $_SESSION['temp_id'];
          }
          else
          {
            $msg = "Research Updated!";
            $id = $rfid;
          }

            if (empty($research) && empty($ryfrom) && empty($ryto) && empty($role) && empty($reql)) {
              $query = "UPDATE research
                        SET research_title = NULL, 
                            `from` = NULL, 
                            `to` = NULL, 
                            `role` = NULL, 
                            `eql` = NULL'
                        WHERE rcnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'"; 
            }
          else
          { 
          $query = "UPDATE research
                    SET research_title = '$research', 
                        `from` = '$ryfrom', 
                        `to` = '$ryto', 
                        `role` = '$role', 
                        `eql` = '$reql'
                    WHERE rcnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'";
          }          
            $conn->query($query);  

      }
      echo $msg;  
  }

    

?>

