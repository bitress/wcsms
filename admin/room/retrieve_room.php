<?php 

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM room";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['room_id'].'" class= "edit_room btn btn-default btn-xs" title="Edit Room" ><i class="fa fa-edit"></i> Edit</a>
       			<a id="'.$row['room_id'].'" class= "del_room btn btn-danger btn-xs" title="Delete Room" ><i class="fa fa-times"></i></a>
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['room_no'],
		$row['room_type'],
		$row['room_dept'],		
		$actionButton
	);
	$i++;
}

$conn->close();
echo json_encode($output);
?>