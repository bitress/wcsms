<?php

require_once '../../conn.php';
     if(!empty($_POST))  
     {  
          $name = mysqli_real_escape_string($conn, $_POST['facultyname']);
          $username = mysqli_real_escape_string($conn, $_POST['username']); 
          $userlevel = mysqli_real_escape_string($conn, $_POST['userlevel']);
          $password = mysqli_real_escape_string($conn, $_POST['password']); 
          $hid_user = $_POST['hid_user'];
          $hid_fac = $_POST['hid_fac'];    
          $query = "";
          $status = "";
          $msg = "";
          $facultyid = "";

          $queryt = "SELECT 
                     faculty.faculty_fname,
                     faculty.faculty_mname,
                     faculty.faculty_lname,
                     faculty.faculty_dletter, 
                     faculty.faculty_id 
                     FROM faculty";
                $resultt = $conn->query($queryt);
                while($row = $resultt->fetch_array(MYSQLI_ASSOC))
                {
                  $mi = ''; 
                  if (!empty($row['faculty_mname'])) {
                    $mi = substr($row['faculty_mname'], 0, 1).'.';
                  }

                  $dletter = '';
                  if (!empty($row['faculty_dletter'])) {
                    $dletter = ', '.$row['faculty_dletter'];
                  }
                  $faculty = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
                  if ($faculty == $name) {
                    $facultyid = $row['faculty_id'];
                    break;
                  }
                }

          $query = "SELECT * FROM faculty WHERE faculty_id = '$facultyid'";
          $result = $conn->query($query);
          // $row = $result->fetch_array(MYSQLI_ASSOC);
          $count = $result->num_rows;
          if ($count > 0) {
              if (empty($hid_user) && isset($hid_fac)) {
                 $query = "INSERT INTO user VALUES(NULL, '$username', '$userlevel', '$password', '$hid_fac')";
                 $status = "UPDATE faculty SET status = '$userlevel' WHERE faculty_id = '$hid_fac'";
                 $msg = "Faculty successfully set as ".$userlevel."!";
              } 
              else {

                 $query = "UPDATE user SET  username = '$username', password = '$password', user_level = '$userlevel' WHERE user_id = '$hid_user'";
                 $status = "UPDATE faculty SET status = '$userlevel' WHERE faculty_id IN(SELECT faculty_id FROM user WHERE user_id = '$hid_user')";
                 $msg = ucfirst($userlevel)." account successfully updated!";
     
              }

               $conn->query($query);
               $conn->query($status);
          }
          else
          {
                 $msg = "Please choose from the dropdown list."; 
          }
            

          echo $msg;
          }
  

?>

