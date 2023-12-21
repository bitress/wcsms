<?php

$hn = 'localhost';
$un = 'root';
$pw = '';
$db = 'wcsms';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die("Connection Failed : " . $conn->connect_error);
?>