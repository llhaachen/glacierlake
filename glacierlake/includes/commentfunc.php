<?php
function setComments($connection) {
	if (isset($_POST['comsubmit'])) {
		$destid = $_POST['destid'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql4 = "INSERT INTO comments VALUES ('$destid', $uid', '$date', '$message')";
		$result4 = mysqli_query($connection, $sql4);
		header("Location: destdetails.php?id=".$destid."?".mt_rand()."");
		exit();
	}
}

function getComments($connection, $destid) {
	$sql = "SELECT * FROM comments WHERE destid='$destid'";
	$result = mysqli_query($connection, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['uid'];
		$sql2 = "SELECT * FROM user WHERE id='$id'";
		$result2 = mysqli_query($connection, $sql2);
		if ($row2 = mysqli_fetch_assoc($result2)) {
			echo"<div class='commbox'><p>";
			echo $row2['username']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message'])."<br><br>";
			echo"</p>";
			if (isset($_SESSION['id'])) {
				if ($_SESSION['id'] == $row2['id']) {
					echo"
					<form class='deletec' method='POST' action='".deleteComments($connection, $destid)."'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button name = 'delc' type = 'submit'>Delete</button>
					</form>";				
				}
			}			
			echo"</div>";
		}
	}
}

function deleteComments($connection, $destid){
	if (isset($_POST['delc'])) {
		$cid = $_POST['cid'];

		$sql = "DELETE FROM comments WHERE cid='$cid'";
		$result = mysqli_query($connection, $sql);
		header("Location: destdetails.php?id=".$destid."");
		exit();
	}

}