<?php
include_once('connection.php');
session_start();

if (isset($_POST['cancelbook'])) {
	$bookid = $_POST['bookid'];
	$sql = "DELETE FROM bookings WHERE id='$bookid'";
		$result = mysqli_query($connection, $sql);
		header("Location:../admin.php");
		exit();
	}
if (isset($_POST['acceptbook'])) {
	$bookid = $_POST['bookid'];
	$sql = "UPDATE bookings SET payment = 1 WHERE id='$bookid'";
		$result = mysqli_query($connection, $sql);
		header("Location:../admin.php");
		exit();
	}