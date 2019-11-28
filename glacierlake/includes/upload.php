<?php
session_start();
include_once 'connection.php';
$id=$_SESSION['id'];

if (isset($_POST['submit'])) {
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
			if ($filesize < 900000) {
				$filenewname = "profile".$id.".".$fileactualext;
				$filedestination = '../uploads/'.$filenewname;
				move_uploaded_file($filetmpname, $filedestination);
				$sql = "UPDATE user SET profimg = '$filenewname' WHERE id='$id';";
				$result = mysqli_query($connection, $sql);
				header("Location: ../userprofile.php?");
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