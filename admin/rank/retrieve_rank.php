<?php 

require_once '../../conn.php';

$output = array('data' => array());

$query = "SELECT * FROM rank";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{

	$actionButton = '
							
       			<center>
       			<a id="'.$row['rank_id'].'" class= "edit_rank btn btn-default btn-xs" title="Edit Rank" ><i class="fa fa-edit"></i> Edit</a>
       			<a id="'.$row['rank_id'].'" class= "del_rank btn btn-danger btn-xs" title="Delete Rank" ><i class="fa fa-times"></i></a>
       			</center>
		';

	$output['data'][] = array(
		$i,
		$row['rank'],
		$actionButton
	);
	$i++;
}

$conn->close();
echo json_encode($output);
?>