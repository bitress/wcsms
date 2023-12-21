<?php

require_once '../../conn.php';
     if(!empty($_POST))  
     {  
         
          $rank = mysqli_real_escape_string($conn, $_POST['rank']); 
          $hid_rank = $_POST['hid_rank'];    
          $msg = "";

          if (empty($hid_rank)) {
             $select_query = "SELECT * FROM rank WHERE rank = '$rank'";  
             $result = $conn->query($select_query);
             $rows = $result->num_rows; 
             if($rows == 0){  
               $query = "INSERT INTO rank VALUES(NULL, '$rank')";
               $conn->query($query);
               $msg = "Rank successfully added!";
             }
             else
             {
                $msg = 'Rank already exists!';
             }

          } 
          else {

            $query = "UPDATE rank SET rank = '$rank' WHERE rank_id = '$hid_rank'";
            $conn->query($query);
             $msg = "Rank successfully updated!";

          }
          
          echo $msg;
      }


?>

