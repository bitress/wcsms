<?php

require_once '../../conn.php';
     if(!empty($_POST))  
     {  
         
          $deptcode = mysqli_real_escape_string($conn, $_POST['deptcode']); 
          $deptname = mysqli_real_escape_string($conn, $_POST['deptname']);
          $hid_dept = $_POST['hid_dept'];    
          $msg = "";

          if (empty($hid_dept)) {
             $select_query = "SELECT dept_code FROM department where dept_code = '$deptcode'";  
             $result = $conn->query($select_query);
             $rows = $result->num_rows; 
             if($rows == 0){  
               $query = "INSERT INTO department VALUES(NULL, '$deptcode', '$deptname')";
                $conn->query($query);
               $msg = "Department successfully added!";
              }
              else
              {
                    $msg = 'Department already exists!';
              }  
          } 
          else {

            $query = "UPDATE department SET dept_code = '$deptcode', dept_name = '$deptname' WHERE dept_id = '$hid_dept'";
             $conn->query($query);
             $msg = "Department successfully updated!";

          }

          echo $msg;
      }

?>

