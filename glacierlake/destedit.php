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
		<h2>Edit Destination</h2>
	<?php
	$destid = (int)$_GET['id'];
	$sql = "SELECT * FROM destination WHERE destid='$destid'";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	echo "<form method='POST' class='sbox' action='includes/editfunc.php' enctype='multipart/form-data'>
			<input type='hidden' name='destid' value='".$destid."'>
			<p>Destination: <input type='text' name='destname' value='".$row['destname']."'></p>
			<p>Cost: <input type='number' name='cost' value='".$row['cost']."'></p>
			<p>Overview: <textarea name='overview'>".$row['overview']."</textarea></p>
			<p>No of days: <input type='number' name='days' value='".$row['days']."'></p>
			<p>BasicCost: <input type='number' name='bcost' value='".$row['bcost']."'></p>
			<p>Basic days: <input type='number' name='bdays' value='".$row['bdays']."'></p>
			<p>Description: <textarea name='descrip'>".$row['descrip']."</textarea></p>
			<input type='file' name='file' value='".$row['destimg']."'>
			<button type='submit' class='btn' name='destedt'>Submit</button>
		</form>
	";
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

</html>