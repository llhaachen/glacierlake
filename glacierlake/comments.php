<?php
date_default_timezone_set('Asia/Kathmandu');
include_once 'includes/connection.php';
include('includes/headfunc.php');
session_start();
if (isset($_SESSION['id'])) {
	head2($connection);
} else {
	head1($connection);
}
if (isset($_GET['id'])) {
	$destid = $_GET['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>asd</title>
</head>
<body>
	<div class="wrapper">
	<h2>Comments Section</h2>
	<?php
	echo "<a class='norml' href='destdetails.php?id=".$destid."'>
	&#8592;Go back</a>";
	?>
	<div class="boxg">
<?php	
	if (isset($_SESSION['id'])) {
		echo "<form method='POST' action='".setComments($connection)."'>
			<input type='hidden' name='destid' value='".$destid."'>
			<input type='hidden' name='uid' value='".$_SESSION['id']."'>
			<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
			<textarea name='message'></textarea><br>
			<button class='btn' type='submit' name='commit'>Comment</button>
		</form>";
		}
	$sql = "SELECT * FROM comments WHERE destid='$destid'";
	$result = mysqli_query($connection, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['uid'];
		$sql2 = "SELECT * FROM user WHERE id='$id'";
		$result2 = mysqli_query($connection, $sql2);
		if ($row2 = mysqli_fetch_assoc($result2)) {
			echo"<div class='box'><p>";
			echo "<h4>".$row2['username']."</h4><br>";
			echo "<i>".$row['date']."<br></i>";
			echo "<strong>".nl2br($row['message'])."</strong><br><br>";
			echo"</p>";
			if (isset($_SESSION['id'])) {
				if ($_SESSION['id'] == $row2['id']) {
					echo"
					<form class='deletec' method='POST' action=''>
					<input type='hidden' name='destid' value='".$destid."'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button name='delc' class='btnx' type='submit'>Delete</button>
					</form>";
				
				}
				}			
			echo"</div>";
		}
	}
	function setComments($connection) {
	if (isset($_POST['commit'])) {
		$destid = $_POST['destid'];
		$userid = $_SESSION['id'];
		$destid = $_POST['destid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$trial = "INSERT INTO comments (destid, uid, date, message) VALUES ('$destid', '$userid', '$date', '$message')";
		$result2 = mysqli_query($connection, $trial);
		header("Location: comments.php?id=".$destid."");
		exit();
	}
}
	if (isset($_POST['delc'])) {
		$cid = $_POST['cid'];
		$destid = $_POST['destid'];
		$sql3 = "DELETE FROM comments WHERE cid='$cid'";
		$result = mysqli_query($connection, $sql3);
		header("Location: comments.php?id=".$destid."");
		exit();
	}
	?>
	</div>
</div>

</body>

</html>