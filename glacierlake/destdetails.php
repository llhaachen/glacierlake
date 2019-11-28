<?php
date_default_timezone_set('Asia/Kathmandu');
include_once('includes/connection.php');
include('includes/headfunc.php');
include('includes/commentfunc.php');
session_start();
if (isset($_SESSION['id'])) {
	head2($connection);
} else {
	head1($connection);
}
if (isset($_GET['id'])) {
				$destid = (int)$_GET['id'];
			}
			$sql = "SELECT * FROM destination WHERE destid='$destid'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_assoc($result);
				$destid = $row['destid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Destination Details</title>
</head>
<body>
	<section class="dest-det">
		<div class="wrapper">
			<?php
			
				echo "<div class='boxx'>
				<div>
				<img src='destinations/".$row['destimg']."' height='100%;' width='100%;'>
				<h3>".$row['destname']."</h3>
				</div>
				<p>".$row['overview']."</p>
				<p><strong>Expected Cost: ".$row['cost']."</p>
				<p>No of days: ".$row['days']."</strong></p>
				<p syle='text-align:left;'>".nl2br($row['descrip'])."</p><br>
					<form method='POST' action='includes/bookfunc.php' class='wrapper'>
					<input type='hidden' name='destid' value='".$destid."'>
					<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
					<input type='hidden' name='days' value='".$row['days']."'>
					<input type='hidden' name='cost' value='".$row['cost']."'>
					<input type='hidden' name='bcost' value='".$row['bcost']."'>
					<input type='hidden' name='bdays' value='".$row['bdays']."'>
					<div class='boxd'>
					<div class='box'>
					<input type='radio' name='package' value='full' checked><h3>Full Package</h3>
					<p>A full tour with all additional benefits and services.</p>
					<p>Total Days:<strong> ".$row['days']."</strong></p>
					<p>Cost: <h3>".$row['cost']."</h3></p>
					</div>
					<div class='box'>
					<input type='radio' name='package' value='basic'><h3>Basic Package</h3>
					<p>A Basic package with standard benefits and services.</p>
					<p>Total Days: <strong>".$row['bdays']."</strong></p>
					<p>Cost: <h3>".$row['bcost']."</h3></p><br><br>
					</div>
					</div>
					<br><br><button class='btn' type='submit' name='book'>Book Now</button>
					</form><br><br>
				</div>";
				
			$sql2 = "SELECT rid, AVG(rating) 'ratex' FROM ratings WHERE dest='$destid'";
			$result2 = mysqli_query($connection, $sql2);
			$row2 = mysqli_fetch_assoc($result2);
			echo "<div class='box'>
			<p><strong>Rating: ".round($row2['ratex'])."/5</strong></p>";
			if (isset($_SESSION['id'])) {
				echo "<a class='btnx' href='destrate.php?id=".$destid."'>
				Rate Now </a><br><br>";
			}
			echo "<br><a class='btn' href='comments.php?id=".$destid."'>Comments Section</a><br><br><br>";
			?>
		<a class='norml' href="destination.php">&#8592;View other destinations.</a>

	</div>
		</div>
	</section>
</body>
<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</html>