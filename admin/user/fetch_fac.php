<?php
	require_once '../../conn.php';
	if (isset($_POST['name'])) {
		$name = $_POST['name'];

		$queryt = "SELECT 
			   faculty.faculty_fname,
			   faculty.faculty_mname,
			   faculty.faculty_lname,
			   faculty.faculty_dletter, 
			   faculty.faculty_id 
			   FROM faculty";
		$resultt = $conn->query($queryt);
		while($row = $resultt->fetch_array(MYSQLI_ASSOC))
		{
			$mi = '';	
			if (!empty($row['faculty_mname'])) {
				$mi = substr($row['faculty_mname'], 0, 1).'.';
			}

			$dletter = '';
			if (!empty($row['faculty_dletter'])) {
				$dletter = ', '.$row['faculty_dletter'];
			}
			$faculty = $row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter;
			if ($faculty == $name) {
				$facultyid = $row['faculty_id'];
				break;
			}
		}

		$query = "  SELECT faculty_id,
					LOWER(CONCAT(faculty.faculty_fname,'@', faculty.faculty_dept)) AS uname,
					LOWER(faculty.faculty_lname) AS faculty_lname
					FROM
					faculty
					WHERE faculty_id = '$facultyid'";
		$result = $conn->query($query);  
	    $row = $result->fetch_array(MYSQLI_ASSOC);  
	    echo json_encode($row);
	}
	

?>