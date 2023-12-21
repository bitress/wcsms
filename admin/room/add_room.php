<?php

require_once '../../conn.php';
     if(!empty($_POST))  
     {  
         
          $roomno = mysqli_real_escape_string($conn, $_POST['roomno']); 
          $rtype = mysqli_real_escape_string($conn, $_POST['rtype']);
          $rdept = mysqli_real_escape_string($conn, $_POST['roomdept']);
          $hid_room = $_POST['hid_room'];    
          $msg = "";

          if (empty($hid_room)) {
             $select_query = "SELECT room_no FROM room where room_no = '$roomno'";  
             $result = $conn->query($select_query);
             $rows = $result->num_rows; 
             if($rows == 0){  
             $query = "INSERT INTO room VALUES(NULL, '$roomno', '$rtype', '$rdept')";
             $conn->query($query);
             $msg = "Room successfully added!";
             }
             else
            {
                $msg = 'Room already exists!';
            }

          } 
          else {

            $query = "UPDATE room SET room_no = '$roomno', room_type = '$rtype', room_dept = '$rdept' WHERE room_id = '$hid_room'";
            $conn->query($query);
             $msg = "Room successfully updated!";

          }
          
          echo $msg;
      }


?>

