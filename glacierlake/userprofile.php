<?php
include_once('includes/connection.php');
session_start();
include("includes/header2.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title>User profile</title>
</head>
<body>
	<div class="wrapper">
	<?php
	?>
	<div class="uprofile">
		<div class="box">
			<?php
			$id = $_SESSION['id'];
			$sql = "SELECT * FROM user WHERE id='$id'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_assoc($result);
			$profimg = $row['profimg'];
			$username = $row['username'];
			$email = $row['email'];
			echo "<div class='profpic'>
			<img src='uploads/".$profimg."?'".mt_rand()." width='20%' height='20%'>
			</div>";
			echo "<h3>".$username."</h3>";
			echo "<p>".$email."</p>";
			?>
			<div class="profupload">
				<br><br>
			<p>Change Profile Image</p>	
			<form action="includes/upload.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="file">
				<button class="btn" type="submit" name="submit"> Upload </button>
			</form><br>
			<a class="norml" href="gallery.php">View Image Gallery &#8594;</a>
			</div><br><br><br>
			<div class="wrapper">
				<div class='box'>
					<h2>BOOKINGS</h2>
				<?php
				$sql2 = "SELECT * FROM bookings WHERE uid='$id'";
				$result2 = mysqli_query($connection, $sql2);
				echo "<table class='tabl'>
					<tr><th>Destination</th>
					<th>Date</th>
					<th>Days</th>
					<th>Cost</th>
					<th>Payment</th>
					<th></th></tr>";
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$destid = $row2['destid'];
					$bookid = $row2['id'];
					$sql3 = "SELECT * FROM destination WHERE destid='$destid'";
					$result3 = mysqli_query($connection, $sql3);
					$row3 = mysqli_fetch_assoc($result3);
					$destid = $row3['destid'];
					$destname = $row3['destname'];
					echo "<tr>
					<td><a href='destdetails.php?id=".$destid."' class='norml'>".$destname."</a></td>
					<td>".$row2['date']."</td>
					<td>".$row2['days']."</td>
					<td>".$row2['cost']."</td>
					<td>";
					if ($row2['payment']==0) {
						echo "<i class='fas fa-times-circle fa-2x'></i>";
					}else{
						echo "<i class='fas fa-check-circle fa-2x'></i>";
					}
					echo "</td>
					<td><form method='POST' action='includes/cancelfunc.php'>
					<input type='hidden' name='bookid' value='".$bookid."'>
					<button type='submit' name='cancelbook' class='btnx'>Cancel</button></form>
					</td>
					</tr>";

				}
				echo "</table>";
				?><br><br>
				<form class='paypal' action='payments.php' method='post' id='paypal_form'>
			        <input type='hidden' name='cmd' value='_xclick' />
			        <input type='hidden' name='no_note' value='1' />
			        <input type='hidden' name='lc' value='UK' />
			        <input type='hidden' name='bn' value='PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest' />
			        <input type='hidden' name='first_name' value='Customer's First Name' />
			        <input type='hidden' name='last_name' value='Customer's Last Name' />
			        <input type='hidden' name='payer_email' value='customer@example.com' />
			        <input type='hidden' name='item_number' value='123456' / >
			        <input type='submit' class='btn' name='submit' value='Checkout'/>
			    </form>
			</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>