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
		<div class="box">
			<div style="font-size: 20px;">
			<h3>RATINGS</h3>
			<?php
				$sql2 = "SELECT * FROM destination ORDER BY destid ASC";
				$result2 = mysqli_query($connection, $sql2);
				echo "<table class='tabl'>
					<tr><th>Destination</th>
					<th>Rating</th>
					<th>Rating Count</th>
					</tr>";
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$destid = $row2['destid'];
					$destname = $row2['destname'];
					$sql3 = "SELECT rid, COUNT(dest) 'countex' FROM ratings WHERE dest='$destid'";
					$result3 = mysqli_query($connection, $sql3);
					$row3 = mysqli_fetch_assoc($result3);
					$sql4 = "SELECT rid, AVG(rating) 'ratex' FROM ratings WHERE dest='$destid'";
					$result4 = mysqli_query($connection, $sql4);
					$row4 = mysqli_fetch_assoc($result4);
					
					echo "<tr>
					<td>".$destname."</td>
					<td>".round($row4['ratex'])."/5</td>
					<td>".$row3['countex']."</td>
					</tr>";

				}
				echo "</table>";
				?>
			</div>
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