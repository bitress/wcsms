<?php
require'../../conn.php';


function instructor()
{
	global $conn;
	$query = "SELECT 
			  faculty.faculty_fname,
			  faculty.faculty_mname,
			  faculty.faculty_lname,
			  faculty.faculty_dletter, 
			  faculty.faculty_dept, 
			  faculty.faculty_id 
			  FROM faculty 
			  WHERE faculty_id > 1 AND faculty.status IS NULL";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		$mi = '';	
		if (!empty($row['faculty_mname'])) {
			$mi = substr($row['faculty_mname'], 0, 1).'.';
		}

		$dletter = '';
		if (!empty($row['faculty_dletter'])) {
			$dletter = ', '.$row['faculty_dletter'];
		}
		echo "<option value = '".$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter."'>$row[faculty_dept]</option>";
	}
}


?>