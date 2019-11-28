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
		<h2>Destinations</h2>
		<a class="btn" href="adnewdest.php" style="text-align:center;"><strong>+  Add New Destination</strong></a>
		<div class="boxd">
			<?php
			$sql2 = "SELECT * FROM destination";
			$result2 = mysqli_query($connection, $sql2);
			while ($row = mysqli_fetch_assoc($result2)) {
				$destid = $row['destid'];
				echo "<div class='box'>
				<form method='POST' action='includes/deld.php'>
				<div>
				<img src='destinations/".$row['destimg']."' height='100%;' width='100%;'>
				</div>
				<h3>".$row['destname']."</h3>
				<p>Expected Cost: ".$row['cost']."</p>
				<p>No of days: ".$row['days']."</p>
				<a class='btn' href='destedit.php?id=".$destid."'>
			<span>Edit</span></a>
			<input type='hidden' name='destid' value='".$destid."'>
			<button type='submit' class='btnx' name='deld'>Delete</button>
			</form><br>
				</div>";
			}
			
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
<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</html>