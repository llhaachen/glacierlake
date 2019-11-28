<?php
	include('includes/header3.php');
	
	function authenticate($connection){
	if (isset($_SESSION['id'])) {
		$adid = $_SESSION['id'];
		$sql = "SELECT * FROM user WHERE id='$adid'";
		$result = mysqli_query($connection, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['level'] != 1) {
			header('Location: index.php');
		}
	} else{
		header('Location: index.php');
	}
}
authenticate($connection);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/rstyle.css">
	<title>Admin Panel</title>
</head>
<body>
	<div class="wrapper">
		<h2>Image Gallery</h2>
		<div class="boxg">
		<?php
			$sql = "SELECT * FROM gallery";
			$result = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$userid = $row['userid'];
				$sql2 = "SELECT * FROM user WHERE id='$userid'";
				$result2 = mysqli_query($connection, $sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$username = $row2['username'];
				$backimg = $row['imgfile'];
				echo "<div class='box'>
				<form method='POST' class='' action=''>
				<div>
				<img src='gallery/".$backimg."' height='100%;' width='100%;'>
				</div>
				<h3>".$row['imgtitle']."</h3>
				<p>Posted by:".$username."</p>
				<p>".$row['imgdesc']."</p>
				<input type='hidden' name='gid' value='".$row['gid']."'>
		        <button type='submit' class='btnx' name='del'>Delete</button>
		        </form>
				</div>
				";
			}
			if (isset($_POST['del'])) {
				$gid = $_POST['gid'];
				$sql3 = "DELETE FROM gallery WHERE gid='$gid'";
				$result3 = mysqli_query($connection, $sql3);
				header('Location: adgallery.php');
				exit();
			}
			?>
			</div>
	</div>
	<?php
		if (isset($_POST['logout'])) {
			session_unset();
			session_destroy();
			header('Location: index.php');
			exit();	
	}
	?>
</body>
<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</html>