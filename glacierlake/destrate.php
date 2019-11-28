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
	<title>Rating</title>
</head>
<body>
	<section class="dest-rate">
		<div class="wrapper">
			<div class="box">
			<h2>How much did you enjoy this Trip?</h2>
			<?php
			if (isset($_GET['id'])) {
				$destid = (int)$_GET['id'];
			}
			echo "<div class='star'>";
			foreach (range(1,5) as $rates){
				echo "<a href='includes/rate.php?id=".$destid."&rating=".$rates."'><i class='fas fa-star fa-2x'></i>=".$rates."</a> <br>";
			}
			echo "</div>";
			$sql = "SELECT rid, AVG(rating) 'ratex' FROM ratings WHERE dest='$destid'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_assoc($result);
			echo "<br><div class='article-rating'>
			<p><strong>Rating: ".round($row['ratex'])."/5</p></strong></div><br>";
			echo"<a class='norml' href='destdetails.php?id=".$destid."'>
			&#8592;Go Back</a>";
			?>
			</div>

		</div>
	</section>
</body>
</html>