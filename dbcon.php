<?php
session_start();
$server = "localhost";
$user = "root";
$pwd = "kaspa";
$db = "users";

$con = mysqli_connect($server, $user, $pwd, $db);

if (mysqli_errno($con)) {
	echo "Could not connect. Please verify";
	exit();

}





?>