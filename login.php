<?php 
    session_start();
    include 'conn.php';
    if(isset($_POST['username'], $_POST['password'])){
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($query);
        $rows = $result->num_rows;  
                
                if ($username == "" || $password == "") 
                {
                   echo 'Please enter your username and password.';
                }
                else if ($rows > 0 ) 
                {

                       $row = $result->fetch_array(MYSQLI_ASSOC);
                       $userlevel = $row['user_level'];
                       $pw = $row['password'];
                       $fid = $row['faculty_id'];
                       if ($pw == $password) {
                          echo $userlevel;
                       }
                       else{
                        echo 'Incorrect password.';
                       }

                       $query1 = "SELECT faculty_id,
                                  faculty.faculty_fname,
                                  faculty.faculty_mname,
                                  faculty.faculty_lname, 
                                  faculty_dept, 
                                  status FROM faculty 
                                  WHERE faculty_id = '$fid'";
                       $result1 = $conn->query($query1);
                       $user = $result1->fetch_array(MYSQLI_ASSOC);

                       $mi = '';  
                       if (!empty($user['faculty_mname'])) {
                          $mi = substr($user['faculty_mname'], 0, 1).'.';
                       }

                       $_SESSION['current_user'] = $user['faculty_fname'].' '.$mi.' '.$user['faculty_lname'];
                       $_SESSION['current_user_id'] = $user['faculty_id'];
                       $_SESSION['current_dept'] = $user['faculty_dept'];
                       $_SESSION['current_user_level'] = $user['status'];

                       $query2 = "SELECT settings_id, settings_sy, settings_sem FROM settings WHERE settings_status = 'active'";
                       $result2 = $conn->query($query2);
                       $active = $result2->fetch_array(MYSQLI_ASSOC);
                       $_SESSION['current_settings'] = $active['settings_id'];
                       $_SESSION['current_sy'] = $active['settings_sy'];
                       $_SESSION['current_sem'] = $active['settings_sem'];
                       
                } 
                else
                {
                    echo 'Username does not exist.';
                }   

                $result->close();
                $conn->close(); 

    }
?>
