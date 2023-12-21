<?php 
session_start();
require_once '../../conn.php';
$dept = $_SESSION['current_dept'];
$output = array('data' => array());

$query = "	SELECT
			class.class_id,
			class.class_course,
			class.class_year,
			class.class_section,
			class.class_major
			FROM
			class
			Inner Join course ON course.course_code = class.class_course
			WHERE course_dept = '$dept'";
$result = $conn->query($query);
$i = 1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['class_id'].'" class= "edit_class btn btn-default btn-xs" title="Edit Class Information" ><i class="fa fa-edit"></i> Edit</a>
       			<a id="'.$row['class_id'].'" class= "del_class btn btn-danger btn-xs" title="Delete Class Information" ><i class="fa fa-times"></i></a>
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['class_course'],
		$row['class_year'],
		$row['class_section'],
		$row['class_major'],
		$actionButton
	);
	$i++;
}

$conn->close();
echo json_encode($output);
?>