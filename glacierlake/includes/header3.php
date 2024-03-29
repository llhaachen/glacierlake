<?php
	include_once('includes/connection.php');
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
	<title>Admin Panel</title>
</head>
<body>
	<nav>
		<div class="logo">
			<h4>Admin Panel</h4>
		</div>
		<ul class="nav-links">
			<li>
				<a href="admin.php">Bookings</a>
			</li>
			<li>
				<a href="addestination.php">Destinations</a>
			</li>
			<li>
				<a href="adratings.php">Ratings</a>
			</li>
			<li>
				<a href="adcomments.php">Comments</a>
			</li>
			<li>
				<a href="adgallery.php">Gallery</a>
			</li>
			<li>
				<form method="POST" class="" action="">
					<button type="submit" class="lgout" name="logout" ><i class="fas fa-sign-out-alt fa-2x"></i></button>
				</form>
			</li>
		</ul>
		<div class="burger">
			<div class="line1"></div>
			<div class="line2"></div>
			<div class="line3"></div>
		</div>
	</nav>
	<script type="text/javascript">
		const burger = document.querySelector('.burger');
		const nav = document.querySelector('.nav-links');

		burger.addEventListener('click', () => {
			nav.classList.toggle('nav-active');
		});
	</script>

</body>
