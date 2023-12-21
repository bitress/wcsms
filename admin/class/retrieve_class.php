<?php 

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM class";
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