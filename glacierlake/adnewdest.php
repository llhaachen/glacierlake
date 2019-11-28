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
	<div class="wrapperx">
		
		<div class="boxx">
			<h2>Add a New Destination</h2><br>
			<?php
			echo "<form method='POST' class='sbox' action='includes/destupload.php' enctype='multipart/form-data'>
			<p>Destination name: <input type='text' name='destname'></p>
			<p>Overview: <textarea name='overview'></textarea></p>
			<p>Full Package Cost: <input type='number' name='cost'></p>
			<p>Full package Days: <input type='number' name='days'></p>
			<p>Basic Package Cost: <input type='number' name='bcost'></p>
			<p>Basic package Days: <input type='number' name='bdays'></p>
			<p>Description: <textarea name='descrip'></textarea></p>
			<input type='file' name='file'>
			<button type='submit'class='btn' name='destsubmit'>Submit</button>
			</form>
			";
			?>		
		</div>
	
	</div>
	<?php
		if (isset($_POST['logout'])) {
			session_unset();
			session_destroy();
			header("Location: index.php");
			exit();	
	}
	?>
</body>
</html>