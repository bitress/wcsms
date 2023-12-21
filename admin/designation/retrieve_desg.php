<?php 

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM designation";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['designation_id'].'" class= "edit_desg btn btn-default btn-xs" title="Edit Designation" ><i class="fa fa-edit"></i> Edit</a>
       			<a id="'.$row['designation_id'].'" class= "del_desg btn btn-danger btn-xs" title="Delete Designation" ><i class="fa fa-times"></i></a>
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['designation'],
		$row['designation_eql_point'],	
		$actionButton
	);
	$i++;
}

$conn->close();
echo json_encode($output);
?>