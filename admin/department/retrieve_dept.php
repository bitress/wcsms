<?php 

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM department";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['dept_id'].'" class= "edit_dept btn btn-default btn-xs" title="Edit Department"><i class="fa fa-edit"></i> Edit</a>
       			
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['dept_code'],
		$row['dept_name'],
		$actionButton
	);
	$i++;
}
// <a id="'.$row['dept_id'].'" class= "del_dept btn btn-default btn-xs" title="Delete Department" ><i class="fa fa-times"></i></a>
$conn->close();
echo json_encode($output);
?>