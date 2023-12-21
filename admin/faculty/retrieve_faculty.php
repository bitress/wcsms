<?php 
session_start();
require_once '../../conn.php';
$currentid = $_SESSION['current_user_id'];

$output = array('data' => array());

$query = "SELECT * FROM faculty WHERE faculty_id > 1 AND faculty_id != '$currentid'";
$result = $conn->query($query);
$i=1;
while ($row = $result->fetch_assoc())
{
	$actionButton = '
							
       			<center>
       			<a href="faculty_load_view.php?faculty='.$row['faculty_id'].'" class= "load_faculty btn btn-danger btn-xs" title=" Edit Faculty Load" ><i class="fa fa-clipboard"></i> More Details</a>
       			<a id="'.$row['faculty_id'].'" class= "edit_faculty btn btn-default btn-xs" title="Edit Faculty Information" ><i class="fa fa-edit"></i> Edit</a>
       			</center>
		';
	
	$mi = '';	
	if (!empty($row['faculty_mname'])) {
		$mi = substr($row['faculty_mname'], 0, 1).'.';
	}

	$dletter = '';
	if (!empty($row['faculty_dletter'])) {
		$dletter = ', '.$row['faculty_dletter'];
	}	

	$output['data'][] = array(
		$i,
		$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter,
		$row['faculty_dept'],
		$row['status'],
		$actionButton
	);
	$i++;
}

$conn->close();
echo json_encode($output);
?>