<?php
session_start();
include_once 'connection.php';
$id=$_SESSION['id'];

if (isset($_POST['submit'])) {
	$uid=$_POST['uid'];
	$title=$_POST['imgtitle'];
	$desc=$_POST['imgdesc'];
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
				$filenewname = "profile".mt_rand(10,99).$id.mt_rand(1000,9999).".".$fileactualext;
				$filedestination = '../gallery/'.$filenewname;
				move_uploaded_file($filetmpname, $filedestination);
				$sql = "INSERT INTO gallery (imgtitle, imgdesc, userid, imgfile) VALUES ('$title', '$desc', '$uid', '$filenewname')";
				$result = mysqli_query($connection, $sql);
				echo ("<script LANGUAGE='JavaScript'>
		        window.alert('Image uploaded successfully');
		        window.location.href='../gallery.php';
		        </script>");
		        exit();
			} else{
				echo ("<script LANGUAGE='JavaScript'>
		        window.alert('File too large');
		        window.location.href='../gallery.php';
		        </script>");
		        exit();
			}
		} else {
			echo ("<script LANGUAGE='JavaScript'>
		        window.alert('Error while uploading');
		        window.location.href='../gallery.php';
		        </script>");
		        exit();
		}
		
	} else {
		echo ("<script LANGUAGE='JavaScript'>
		        window.alert('Filetype not supported.');
		        window.location.href='../gallery.php';
		        </script>");
		        exit();
	}
}