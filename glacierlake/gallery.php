<?php
include_once('includes/connection.php');
include('includes/headfunc.php');
session_start();
if (isset($_SESSION['id'])) {
	head2($connection);
} else {
	head1($connection);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
</head>
<body>
	
		<div class="wrapper">
			<section class="boxg">
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
				<div>
				<img src='gallery/".$backimg."' height='100%;' width='100%;'>
				</div>
				<h3>".$row['imgtitle']."</h3>
				<p>Posted by: <strong>".$username."</strong></p>
				<p>".$row['imgdesc']."</p>
				</div>
				";
			}
			?>
			</section>
		
				<?php
				if (isset($_SESSION['id'])) {
					$id = $_SESSION['id'];
					echo "<div class='box'>
					<form action='includes/galleryupload.php' method='POST' enctype='multipart/form-data'>
					<input type='hidden' name='uid' value='".$id."'>
					<input type='text' name='imgtitle' placeholder='Image Title'>
					<input type='text' name='imgdesc' placeholder='Short Description'><br><br>
					<input type='file' name='file'>
					<button type='submit' class='btn' name='submit'>Upload</button>
					</form></div>";
				}
				?>
			
		</div>
	<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</body>

</html>