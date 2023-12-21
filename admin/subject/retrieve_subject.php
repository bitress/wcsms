<?php 

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM subject";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['subject_id'].'" class= "edit_subject btn btn-default btn-xs" title="Edit Subject" ><i class="fa fa-edit"></i> Edit</a>
       			
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['CourseNo'],
		$row['DescTitle'],
		$row['Units'],
		$actionButton
	);
	$i++;
}
// <a id="'.$row['subject_id'].'" class= "del_subject btn btn-default btn-xs" title="Delete Subject" ><i class="fa fa-times"></i></a>
$conn->close();
echo json_encode($output);
?>

