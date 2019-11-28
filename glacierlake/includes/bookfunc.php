<?php
include_once('connection.php');
session_start();

if (isset($_POST['book'])){
	if (isset($_SESSION['id'])){
		$destid = $_POST['destid'];
		$uid = $_SESSION['id'];
		$date = $_POST['date'];
		$radio = $_POST['package'];
		$days = $_POST['days'];
		$cost = $_POST['cost'];
		$bdays = $_POST['bdays'];
		$bcost = $_POST['bcost'];

		if ($radio == 'full'){
			$sql = "INSERT INTO bookings (destid, uid, date, days, cost) VALUES ('$destid', '$uid', '$date', '$days', '$cost')";
			$result = mysqli_query($connection, $sql);
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Booking Successful! Check your Profile for details.');
                window.location.href='../destination.php';
                </script>");
                exit();
		}

		if ($radio == 'basic'){
			$sql = "INSERT INTO bookings (destid, uid, date, days, cost) VALUES ('$destid', '$uid', '$date', '$bdays', '$bcost')";
			$result = mysqli_query($connection, $sql);
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Booking Successful! Check your Profile for details.');
                window.location.href='../destination.php';
                </script>");
                exit();
		}
	}else {
    echo ("<script LANGUAGE='JavaScript'>
                window.alert('Please Login First');
                window.location.href='../index.php';
                </script>");
                exit();
	}
}