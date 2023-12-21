<?php

require_once '../../conn.php';
 // $cno = $_POST['cno'];
 // $select_query = "SELECT CourseNo FROM subject where CourseNo = '$cno'";  
 // $result = $conn->query($select_query);
 // $rows = $result->num_rows; 
 // if($rows == 0){
     if(!empty($_POST))  
     {  
         
          $classcourse = mysqli_real_escape_string($conn, $_POST['classcourse']); 
          $classyear = mysqli_real_escape_string($conn, $_POST['classyear']);
          $classsection = mysqli_real_escape_string($conn, $_POST['classsection']); 
          $classmajor = mysqli_real_escape_string($conn, $_POST['classmajor']);
          $hid_class = $_POST['hid_class'];    
          $query = "";
          $msg = "";

          if (empty($hid_class)) {
             $query = "INSERT INTO class VALUES(NULL, '$classcourse', '$classyear', '$classsection', '$classmajor')";
             $msg = "Class successfully added!";
          } 
          else {

            $query = "UPDATE class SET  class_course = '$classcourse', class_year = '$classyear', class_section = '$classsection', class_major = '$classmajor' WHERE class_id = '$hid_class'";
             $msg = "Class successfully updated!";

          }
                 

          $conn->query($query);

          echo $msg;
      }
  // } 
  // else
  // {
  //   echo "Duplicate Course No.!";
  //  }

?>

