<?php
session_start();
include_once 'connection.php';

if (isset($_POST['destedt'])) {
	$destid = $_POST['destid'];
	$destname = $_POST['destname'];
	$cost = $_POST['cost'];
	$overview = $_POST['overview'];
	$days = $_POST['days'];
	$bcost = $_POST['bcost'];
	$bdays = $_POST['bdays'];
	$descrip = $_POST['descrip'];

if (!empty($_FILES["file"]["name"])) {
	$file=$_FILES['file'];

	$filename=$file['name'];
	$filetmpname=$file['tmp_name'];
	$filesize=$file['size'];
	$fileerror=$file['error'];
	$filetype=$file['type'];

	$fileext = explode('.', $filename);
	$fileactualext= strtolower(end($fileext));

	$allowed = array('jpg', 'jpeg', 'png');
	if (in_array($fileactualext, $allowed)) {
		if ($fileError == 0) {
			if ($filesize < 90000) {
				$filenewname = "destination".mt_rand(10,99).mt_rand(1000,9999).".".$fileactualext;
				$filedestination = '../destinations/'.$filenewname;
				move_uploaded_file($filetmpname, $filedestination);
				$sql = "UPDATE destination SET destname='$destname', cost='$cost', overview='$overview', days='$days', descrip='$descrip', destimg='$filenewname', bcost='$bcost',  bdays='$bdays' WHERE destid='$destid'";
				$result = mysqli_query($connection, $sql);
				echo ("<script LANGUAGE='JavaScript'>
		        window.alert('Destination Edited successfully');
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
} else{
	$sql = "UPDATE destination SET destname='$destname', cost='$cost', overview='$overview', days='$days', descrip='$descrip' bcost='$bcost',  bdays='$bdays' WHERE destid='$destid'";
				$result = mysqli_query($connection, $sql);
				echo ("<script LANGUAGE='JavaScript'>
		        window.alert('Destination Edited successfully');
		        window.location.href='../addestination.php';
		        </script>");
		        exit();
}

}
	