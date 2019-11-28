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
		<h2>GLACIER LAKE</h2>
		<div class="box">
			<h3>BOOKINGS</h3>
			<?php
				$sql2 = "SELECT * FROM bookings ORDER BY destid DESC";
				$result2 = mysqli_query($connection, $sql2);
				echo "<table class='tabl'>
					<tr><th>Destination</th>
					<th>User</th>
					<th>Date</th>
					<th>Days</th>
					<th>Cost</th>
					<th>Payment</th>
					<th></th><th></th></tr>";
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$destid = $row2['destid'];
					$bookid = $row2['id'];
					$uid = $row2['uid'];
					$sql3 = "SELECT * FROM destination WHERE destid='$destid'";
					$result3 = mysqli_query($connection, $sql3);
					$sql4 = "SELECT * FROM user WHERE id='$uid'";
					$result4 = mysqli_query($connection, $sql4);
					$row4 = mysqli_fetch_assoc($result4);
					$row3 = mysqli_fetch_assoc($result3);
					$destid = $row3['destid'];
					$destname = $row3['destname'];
					echo "<tr>
					<td>".$destname."</td>
					<td>".$row4['username']."</td>
					<td>".$row2['date']."</td>
					<td>".$row2['days']."</td>
					<td>".$row2['cost']."</td>
					<td>";
					if ($row2['payment']==1) {
						echo "<i class='fas fa-check-circle fa-2x'></i>";
					}else{
						echo "<i class='fas fa-times-circle fa-2x'></i>";
					}
					echo "</td>
					<td><form method='POST' action='includes/adbookfunc.php'>
					<input type='hidden' name='bookid' value='".$bookid."'>";
					if ($row2['payment']==0) {
						echo "<button type='submit' name='acceptbook' class='btn'>Accept Payment</button>";
					}
					echo"
					</td><td>
					<button type='submit' name='cancelbook' class='btnx'>Cancel</button></form>
					</td>
					</tr>";

				}
				echo "</table>";
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