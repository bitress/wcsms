<?php
session_start();
require_once '../../conn.php';
          $currentsettings = $_SESSION['current_settings'];
          $loadid = mysqli_real_escape_string($conn, $_POST['loadid']);
          $facultyfname = mysqli_real_escape_string($conn, $_POST['facultyfname']);
          $facultymname = mysqli_real_escape_string($conn, $_POST['facultymname']); 
          $facultylname = mysqli_real_escape_string($conn, $_POST['facultylname']); 
          $civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
          $bdate  = strtotime($_POST['facultybdate']);
          $birthdate = date("Y-m-d", $bdate);
          $statusappointment  = mysqli_real_escape_string($conn, $_POST['statusappointment']);
          $monthlysalary = mysqli_real_escape_string($conn, $_POST['monthlysalary']); 
          $facultyidno = mysqli_real_escape_string($conn, $_POST['facultyidno']);
          $facultyposition = mysqli_real_escape_string($conn, $_POST['facultyposition']); 
          $facultyrank = mysqli_real_escape_string($conn, $_POST['facultyrank']);
          $undergrad = mysqli_real_escape_string($conn, $_POST['undergrad']);
          $umajor = mysqli_real_escape_string($conn, $_POST['umajor']); 
          $uminor = mysqli_real_escape_string($conn, $_POST['uminor']);
          $voctech = mysqli_real_escape_string($conn, $_POST['voctech']); 
          $masteraldegree = mysqli_real_escape_string($conn, $_POST['masteraldegree']);
          $facultydletterM = mysqli_real_escape_string($conn, $_POST['facultydletterM']);
          $mmajor = mysqli_real_escape_string($conn, $_POST['mmajor']);
          $doctoraldegree = mysqli_real_escape_string($conn, $_POST['doctoraldegree']);
          $facultydletterD = mysqli_real_escape_string($conn, $_POST['facultydletterD']); 
          $dmajor = mysqli_real_escape_string($conn, $_POST['dmajor']);
          $facultydept = mysqli_real_escape_string($conn, $_POST['facultydept']); 
          $facultydesg = mysqli_real_escape_string($conn, $_POST['facultydesg']);
          $CSE = mysqli_real_escape_string($conn, $_POST['CSE']);
          $expublic = mysqli_real_escape_string($conn, $_POST['expublic']); 
          $exprivate = mysqli_real_escape_string($conn, $_POST['exprivate']);
          $facultydletter = "";

          if (!empty($facultydletterD)) {
            $facultydletter = $facultydletterD;
          }
          else
          {
            $facultydletter = $facultydletterM;
          }

          if (empty($loadid)) {

            $query = "INSERT INTO faculty VALUES(NULL, '$facultyfname', '$facultymname', '$facultylname', '$facultydletter', '$facultydept', NULL)";
            $conn->query($query);
            $facultyid = $conn->insert_id;
            $_SESSION['temp_id'] = $facultyid;
            for ($i=1; $i <=4  ; $i++) { 
                $conn->query("INSERT INTO research(research_id, rcnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
                $conn->query("INSERT INTO extension(ext_id, ecnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
             }
             for ($i=1; $i <=2  ; $i++) { 
                $conn->query("INSERT INTO administration(admin_id, adcnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
                $conn->query("INSERT INTO assignment(assign_id, ascnt, faculty_id, setting_id) VALUES(NULL, '$i', '$facultyid', '$currentsettings')");
             }

            $query2 = "INSERT INTO faculty_load 
                       VALUES(NULL,
                              '$facultyid',
                              '$civilstatus',
                              '$birthdate',
                              '$statusappointment',
                              '$monthlysalary',
                              '$facultyidno',
                              '$facultyposition',
                              '$facultyrank',
                              '$undergrad',
                              '$umajor',
                              '$uminor',
                              '$voctech',
                              '$masteraldegree',
                              '$facultydletterM',
                              '$mmajor',
                              '$doctoraldegree',
                              '$facultydletterD',
                              '$dmajor',
                              '$facultydept',
                              '$facultydesg',
                              '$CSE',
                              '$expublic',
                              '$exprivate')";

            $conn->query($query2);

            echo "Faculty Added!";
         }
         else
         {  
             
             $query = "UPDATE faculty SET faculty_fname = '$facultyfname', faculty_mname = '$facultymname', faculty_lname = '$facultylname', faculty_dletter = '$facultydletter', faculty_dept = '$facultydept' WHERE faculty_id = '$loadid'";
             $conn->query($query);


             $query2 = "UPDATE faculty_load  
                        SET
                        civil_status = '$civilstatus',
                        birthdate = '$birthdate',
                        appointment_status = '$statusappointment',
                        salary = '$monthlysalary',
                        idno = '$facultyidno',
                        position = '$facultyposition',
                        rank = '$facultyrank',
                        bachelor_deg = '$undergrad',
                        bachelor_ma = '$umajor',
                        bachelor_mi = '$uminor',
                        voc_tech = '$voctech',
                        masteral_deg = '$masteraldegree',
                        masteral_dletter = '$facultydletterM',
                        masteral_ma = '$mmajor',
                        doctoral_deg = '$doctoraldegree',
                        doctoral_dletter = '$facultydletterD',
                        doctoral_ma = '$dmajor',
                        faculty_dept = '$facultydept',
                        faculty_desg = '$facultydesg',
                        cse = '$CSE',
                        expyrs_public = '$expublic',
                        expyrs_private = '$exprivate'
                        WHERE faculty_id = '$loadid'";

              $conn->query($query2);
              echo "Faculty Updated!";
         } 

          

?>

