<?php
require'../../conn.php';

function time_start()
{
	global $conn;
	$query = "SELECT time_start FROM `time`";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		$timein = date("h:i A", strtotime($row['time_start']));
		echo "<option value = '$timein'>";
	}

}

function time_end()
{
	global $conn;
	$query = "SELECT time_end FROM `time`";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		$timeout = date("h:i A", strtotime($row['time_end']));
		echo "<option value = '$timeout'>";
	}

}

function subject()
{
	global $conn;
	$query = "SELECT * FROM subject";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value = '$row[CourseNo]'>$row[DescTitle]</option>";
	}
}

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
			  WHERE faculty_id > 1";
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

function clasz()
{
	global $conn;
	$query = "SELECT concat(class_course, ' ', class_year, ' ', class_section, ' ', class_major) as class FROM class";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value = '$row[class]'>";
	}
}

function room()
{
	global $conn;
	$query = "SELECT * FROM room";
	$result = $conn->query($query);

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		echo "<option value = '$row[room_no]'>";
	}
}

?>