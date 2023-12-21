<?php
session_start();
require_once '../../conn.php';
     if(!empty($_POST))  
     {  
          $currentsettings = $_SESSION['current_settings'];
          $facultyfname = mysqli_real_escape_string($conn, $_POST['facultyfname']);
          $facultymname = mysqli_real_escape_string($conn, $_POST['facultymname']); 
          $facultylname = mysqli_real_escape_string($conn, $_POST['facultylname']);
          // $facultydletter = mysqli_real_escape_string($conn, $_POST['facultydletter']); 
          $facultydept = mysqli_real_escape_string($conn, $_POST['facultydept']);
          $hid_faculty = $_POST['hid_faculty'];    
          $query = "";
          $msg = "";

          if (empty($hid_faculty)) {
             $query = "INSERT INTO faculty VALUES(NULL, '$facultyfname', '$facultymname', '$facultylname', NULL, '$facultydept', NULL)";
             $conn->query($query);
             $msg = "Faculty successfully added!";
             $facultyid = $conn->insert_id;
             $_SESSION['temp_id'] = $facultyid;
             $conn->query("INSERT INTO faculty_load(load_id, faculty_id) VALUES(NULL, '$facultyid')");
             for ($i=1; $i <=4  ; $i++) { 
                $conn->query("INSERT INTO research(research_id, rcnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
                $conn->query("INSERT INTO extension(ext_id, ecnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
             }
             for ($i=1; $i <=2  ; $i++) { 
                $conn->query("INSERT INTO administration(admin_id, adcnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
                $conn->query("INSERT INTO assignment(assign_id, ascnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
             }
          } 
          else {

            $query = "UPDATE faculty SET  faculty_fname = '$facultyfname', faculty_mname = '$facultymname', faculty_lname = '$facultylname',  faculty_dept = '$facultydept' WHERE faculty_id = '$hid_faculty'";
             $msg = "Faculty successfully updated!";
            $conn->query($query);
          }

          echo $msg;
      }
?>

