<?php
include_once 'connection.php';
session_start();

if (isset($_GET['id'], $_GET['rating'])) {
	$destid = (int)$_GET['id'];
	$rating = (int)$_GET['rating'];
	$sql = "INSERT INTO ratings (dest, rating) VALUES ('$destid', '$rating')";
	$result = mysqli_query($connection, $sql);
}
echo ("<script LANGUAGE='JavaScript'>
	window.alert('Your Rating has been added. ');
	window.location.href='../destdetails.php?id=".$destid."';
	</script>");
?>