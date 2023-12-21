<?php
require_once '../../conn.php';
if(isset($_POST["sid"]))  
 {  
      $query = "SELECT * FROM designation WHERE designation_id = '".$_POST["sid"]."'";  
      $result = $conn->query($query);  
      $row = $result->fetch_array(MYSQLI_ASSOC);  
      echo json_encode($row);  
 }  
 ?>