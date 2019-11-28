<?php
session_start();
include_once 'connection.php';

if (isset($_POST['destsubmit'])) {
	$destname = $_POST['destname'];
	$cost = $_POST['cost'];
	$overview = $_POST['overview'];
	$days = $_POST['days'];
	$bcost = $_POST['bcost'];
	$bdays = $_POST['bdays'];
	$descrip = $_POST['descrip'];
	$file=$_FILES['file'];
	$filename=$file['name'];
	$filetmpname=$file['tmp_name'];
	$filesize=$file['size'];
	$fileError=$file['error'];
	$filetype=$file['type'];

	$fileext = explode('.', $filename);
	$fileactualext= strtolower(end($fileext));

	$allowed = array('jpg', 'jpeg', 'png');
	if (in_array($fileactualext, $allowed)) {
		if ($fileError == 0) {
			if ($filesize < 9000000) {
				$filenewname = "destination".mt_rand(10,99).mt_rand(1000,9999).".".$fileactualext;
				$filedestination = '../destinations/'.$filenewname;
				move_uploaded_file($filetmpname, $filedestination);
				$sql = "INSERT INTO destination (destname, cost, overview, days, descrip, destimg, bdays, bcost) VALUES ('$destname', '$cost', '$overview', '$days', '$descrip', '$filenewname', '$bdays', '$bcost')";
				$result = mysqli_query($connection, $sql);
				echo ("<script LANGUAGE='JavaScript'>
		        window.alert('Destination Added successfully');
		        window.location.href='../addestination.php';
		        </script>");
		        exit();
			} else{
				echo "Filesize too large.";
			}
		} else {
			echo "Error while uploading.";
		}
		
	} else {
		echo "File type not supported";
	}
}