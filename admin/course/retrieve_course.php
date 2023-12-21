<?php

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM course";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['course_id'].'" class= "edit_course btn btn-default btn-xs" title="Edit Course" ><i class="fa fa-edit"></i> Edit</a>
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['course_code'],
		$row['course_name'],
		$row['course_dept'],
		$actionButton
	);
	$i++;
}

$conn->close();
echo json_encode($output);
?>