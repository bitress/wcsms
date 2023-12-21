<?php

require_once '../../conn.php';
     if(!empty($_POST))  
     {  
         
          $cno = mysqli_real_escape_string($conn, strtoupper($_POST['cno'])); 
          $dtitle = mysqli_real_escape_string($conn, $_POST['dtitle']);    
          $units = $_POST['units'];    
          $hid_subject = $_POST['hid_subject'];
          $query = "";
          $msg = "";

          if (empty($hid_subject)) {
             $select_query = "SELECT CourseNo FROM subject where CourseNo = '$cno'";  
             $result = $conn->query($select_query);
             $rows = $result->num_rows; 
             if($rows == 0){   
               $query = "INSERT INTO subject VALUES(NULL, '$cno', '$dtitle', '$units')";
               $conn->query($query);
               $msg = "Subject successfully added!";
              } 
             else
              {
                    $msg = 'Subject already exists!';
              }    
          } 
          else {

            $query = "UPDATE subject SET CourseNo = '$cno', DescTitle = '$dtitle', Units = '$units' WHERE subject_id = '$hid_subject'";
            $conn->query($query);
             $msg = "Subject successfully updated!";

          }
          echo $msg;
      }


?>

