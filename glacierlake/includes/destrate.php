<?php
include_once('connection.php');
session_start();
if (isset($_SESSION['id'])) {
	include('header2.php');
} else {
	include('header1.php');
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
			<h2>How much did you enjoy this Trip?</h2>
			<?php
			if (isset($_GET['id'])) {
				$destid = (int)$_GET['id'];
			}
			foreach (range(1,5) as $rates){
				echo "<a href='rate.php?id=".$destid."&rating=".$rates."'>".$rates."</a> <br>";
			}
			$sql = "SELECT rid, AVG(rating) 'ratex' FROM ratings WHERE dest='$destid'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_assoc($result);
			echo "<div class='article-rating'>
			Rating:".round($row['ratex'])."/5</div>";
			echo"<a href='destdetails.php?id=".$destid."'>
			Go Back</a>";
			?>
		</div>
	</section>
</body>
</html>