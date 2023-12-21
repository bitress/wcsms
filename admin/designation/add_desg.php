<?php

require_once '../../conn.php';
     if(!empty($_POST))  
     {  
         
          $desg = mysqli_real_escape_string($conn, $_POST['desg']); 
          $eqldesg = mysqli_real_escape_string($conn, $_POST['eql_desg']);
          $hid_desg = $_POST['hid_desg'];    
          $msg = "";

          if (empty($hid_desg)) {
             $select_query = "SELECT * FROM designation WHERE designation = '$desg'";  
             $result = $conn->query($select_query);
             $rows = $result->num_rows; 
             if($rows == 0){  
               $query = "INSERT INTO designation VALUES(NULL, '$desg', '$eqldesg')";
               $conn->query($query);
               $msg = "Designation successfully added!";
             }
             else
             {
                $msg = 'Designation already exists!';
             }

          } 
          else {

            $query = "UPDATE designation SET designation = '$desg', designation_eql_point = '$eqldesg' WHERE designation_id = '$hid_desg'";
            $conn->query($query);
             $msg = "Designation successfully updated!";

          }
          
          echo $msg;
      }


?>

