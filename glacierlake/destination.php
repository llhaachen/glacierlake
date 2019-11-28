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
	<title>destination</title>
</head>
<body>
	
		<div class="wrapper">
			<section class="boxd">
			<?php
			$sql = "SELECT * FROM destination";
			$result = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$destid = $row['destid'];
				echo "<div class='box'>
				<div>
				<img src='destinations/".$row['destimg']."' height='100%;' width='100%;'>
				</div>
				<h3>".$row['destname']."</h3>
				<p>Expected Cost: ".$row['cost']."</p>
				<p>No of days: ".$row['days']."</p>
				<a class='btn' href='destdetails.php?id=".$destid."'>
			Details</a>
				</div>";
			}
			?>
			</section>
		</div>
	
</body>
<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</html>