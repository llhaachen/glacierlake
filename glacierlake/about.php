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
	<title>About</title>
</head>
<body>
	<div class="contain">
		<img src="img/about2.jpg" width="100%" height="100%">
		<div class="bottom-left"><span>Glacier Lake Tours</span></div>
	</div>
		<div class="wrapper">
			<section class="box">
				<h2> About Us</h2>
				<p class="abtus">Namaste! and Welcome to Glacier Lake Tours Pvt. Ltd.<br><br> We are a Nepal based tour company focused on providing visitors with a complete tour experience.<br>
				We feature a number of packages that are carefully planned and customized to you needs and wishes.
				</p>
			</section>
			
		</div>
	<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</body>

</html>