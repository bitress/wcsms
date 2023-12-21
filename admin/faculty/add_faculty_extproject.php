<?php
session_start();
require_once '../../conn.php';
  if (isset($_POST) || isset($_SESSION['temp_id'])) {
      for ($i=1; $i <= 4; $i++) 
      {
          $currentsettings = $_SESSION['current_settings'];
          $ext = mysqli_real_escape_string($conn, $_POST['e'.$i]);
          $eyfrom = mysqli_real_escape_string($conn, $_POST['e_yearfrom'.$i]); 
          $eyto = mysqli_real_escape_string($conn, $_POST['e_yearto'.$i]);
          $erole = mysqli_real_escape_string($conn, $_POST['e_role'.$i]); 
          $eeql = mysqli_real_escape_string($conn, $_POST['e_eql'.$i]);
          $efid = $_POST['efid'];
          $msg = "";
          $query = "";
          $id = "";

          if (empty($efid)) {
            $msg = "Extension Project Added!";
            $id = $_SESSION['temp_id'];
          }
          else
          {
             $msg = "Extension Project Updated!";
             $id = $efid;
          }

          if (empty($ext) && empty($eyfrom) && empty($eyto) && empty($erole) && empty($eeql)) {
            $query = "UPDATE extension
                      SET ext_project = NULL, 
                          `from` = NULL, 
                          `to` = NULL, 
                          `role` = NULL, 
                          `eql_point` = NULL'
                      WHERE ecnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'"; 
          }
          else
          { 
          $query = "UPDATE extension
                    SET ext_project = '$ext', 
                        `from` = '$eyfrom', 
                        `to` = '$eyto', 
                        `role` = '$erole', 
                        `eql_point` = '$eeql'
                    WHERE ecnt = '$i' AND faculty_id = '$id' AND setting_id = '$currentsettings'";
          }          
            $conn->query($query);  
            
      }
       echo $msg; 
  }

    

?>

