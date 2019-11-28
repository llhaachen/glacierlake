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
		<h2>User Comments</h2>
		<div class="boxg">
		<?php
			$sql = "SELECT * FROM comments ORDER BY destid";
			$result = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['uid'];
				$destid = $row['destid'];
				$sql2 = "SELECT * FROM user WHERE id='$id'";
				$result2 = mysqli_query($connection, $sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$sql3 = "SELECT * FROM destination WHERE destid='$destid'";
				$result3 = mysqli_query($connection, $sql3);
				$row3 = mysqli_fetch_assoc($result3);
				echo "<div class='box'>
				<form class='cmt' method='POST' action=''>
				<p>Destination:".$row3['destname']."</p>
				<p>By user: <strong>".$row2['username']."</strong></p>
				<p>Date: <i>".$row['date']."</i></p>
				<p>Comment: <strong>".$row['message']."</strong></p>
				<input type='hidden' name='cid' value='".$row['cid']."'>
				<button class='btnx' type='submit' name='delcmt'>Delete</button>
				</form>
				</div>";
				}
				if (isset($_POST['delcmt'])) {
					$cid = $_POST['cid'];
					$sql4 = "DELETE FROM comments WHERE cid='$cid'";
					$result4 = mysqli_query($connection, $sql4);
					header("Location: adcomments.php");
					exit();
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
	<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</body>
</html>