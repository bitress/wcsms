<?php 
session_start();
$id = $_SESSION['current_user_id'];
require_once '../../conn.php';

$output = array('data' => array());
$query = "  SELECT
			`user`.user_id,
			faculty.faculty_fname,
			faculty.faculty_mname,
			faculty.faculty_lname,
			faculty.faculty_dletter,
			`user`.username,
			`user`.`password`,
			`user`.user_level,
			`user`.faculty_id
			FROM
			faculty
			Inner Join `user` ON faculty.faculty_id = `user`.faculty_id
			WHERE faculty.faculty_id > 1 AND `user`.faculty_id != '$id'";
$result = $conn->query($query);
$i = 0;
while ($row = $result->fetch_assoc())
{
	$actionButton = '
							
       			<center>
       			<a id="'.$row['user_id'].'" class= "edit_user btn btn-default btn-xs" title="Edit User Information" ><i class="fa fa-edit"></i> Edit</a>
       			<a id="'.$row['user_id'].'" class= "unset_user btn btn-danger btn-xs" title="Unset User Level" ><i class="fa fa-user-times"></i></a>
       			</center
  
		';

	$viewpw = '

			<input type="password" value="'.$row['password'].'" class = "pw" readonly>

			<a id="'.$i.'" class = "view" title="Show Password" onclick="show(this.id);"><i class="fa fa-eye"></i></a>
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
		$i+1,
		$row['faculty_fname'].' '.$mi.' '.$row['faculty_lname'].$dletter,
		$row['username'],
		$viewpw,
		$row['user_level'],
		$actionButton
	);
	$i++;
	
}

$conn->close();
echo json_encode($output);
?>