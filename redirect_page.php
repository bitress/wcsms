<?php 
session_start(); 
if (isset($_SESSION['current_user_level'])) {
    header('location:'.$_SESSION['current_user_level'].'/');
}
else
{
	 header('location:index.php'); 
}