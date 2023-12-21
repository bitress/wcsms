<?php

require_once '../../conn.php';
     if(isset($_POST))  
     {  
         
          $coursecode = mysqli_real_escape_string($conn, strtoupper($_POST['coursecode'])); 
          $coursename = mysqli_real_escape_string($conn, $_POST['coursename']);
          $coursedept = mysqli_real_escape_string($conn, $_POST['coursedept']);
          $hid_course = $_POST['hid_course'];    
          $msg = "";

            if (empty($hid_course)) {
                 $select_query = "SELECT course_code FROM course where course_code = '$coursecode'";  
                 $result = $conn->query($select_query);
                 $rows = $result->num_rows; 
                 if($rows == 0){
                   $query = "INSERT INTO course VALUES(NULL, '$coursecode', '$coursename', '$coursedept')";
                   $conn->query($query);
                   $msg = "Course successfully added!";
                 }
                 else
                 {
                    $msg = 'Course already exists!';
                 }  
            } 
            else {

              $query = "UPDATE course SET course_code = '$coursecode', course_name = '$coursename', course_dept = '$coursedept' WHERE course_id = '$hid_course'";
              $conn->query($query);
               $msg = "Course successfully updated!";

            }
            echo $msg;
                      

          
    }

?>

