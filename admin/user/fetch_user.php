<?php
require_once '../../conn.php';
if(isset($_POST["sid"]))  
 {  
 	  $id = $_POST["sid"];
      $query = "SELECT
      			`user`.`user_id`,
				faculty.faculty_fname,
				faculty.faculty_mname,
				faculty.faculty_lname,
				faculty.faculty_dletter,
				`user`.username,
				`user`.user_level,
				`user`.`password`
				FROM
				faculty
				Inner Join `user` ON `user`.faculty_id = faculty.faculty_id
				WHERE `user`.user_id = '$id'
			 ";  
      $result = $conn->query($query);  
      $row = $result->fetch_array(MYSQLI_ASSOC);

      $mi = '';	
	  if (!empty($row['faculty_mname'])) {
		$mi = substr($row['faculty_mname'], 0, 1).'.';
	  }
		
	  $dletter = '';
	  if (!empty($row['faculty_dletter'])) {
		$dletter = ', '.$row['faculty_dletter'];
	  }
	  $user = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
	  
      $user_arr = array('name' => $user ,'user_level' => $row['user_level'], 'username' => $row['username'], 'password' => $row['password'], 'user_id' => $row['user_id']);  
      echo json_encode($user_arr);  
 }  
 ?>