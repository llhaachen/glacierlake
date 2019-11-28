<?php
	include_once('includes/connection.php');
	include('includes/logfunc.php');
		if (isset($_POST['login'])){
			logistry($connection);
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
	<title>Glacier Lake Tours</title>
</head>
<body>
	<nav>
		<div class="logo">
			<h4>Glacier Lake</h4>
		</div>
		<ul class="nav-links">
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="destination.php">Destinations</a>
			</li>
			<li>
				<a href="about.php">About</a>
			</li>
			<li>
				<a href="guides.php">Guides</a>
			</li>
			<li>
				<a href="gallery.php">Gallery</a>
			</li>
			<li>
				<a class="lg" href="#" id="login" style="font-size:17px;text-shadow: 0 0 3px #FF0000;">Login</a>
			</li>
			<li>
				<a href="register.php" style="font-size:17px;text-shadow: 0 0 3px #FF0000;">Signup</a>
			</li>
		</ul>
		<div class="burger">
			<div class="line1"></div>
			<div class="line2"></div>
			<div class="line3"></div>
		</div>
	</nav>
	<div class="bg-modal">
		<div class="modal-content">
			<div class="close">+</div>
			<img src="img/userlog.png">
			<h3>Member Login</h3>
			<form method="POST" class="login" action="">
				<input type="text" placeholder="Username" name="username">
				<input type="password" placeholder="Password" name="password">
				<button type="submit" class="btn" name="login">login</button>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		const burger = document.querySelector('.burger');
		const nav = document.querySelector('.nav-links');

		burger.addEventListener('click', () => {
			nav.classList.toggle('nav-active');
		});
		document.getElementById('login').addEventListener('click', () => {
		document.querySelector('.bg-modal').style.display = 'flex'; 
		})
		document.querySelector('.close').addEventListener('click', () => {
		document.querySelector('.bg-modal').style.display = 'none'; 
		});
	</script>


</body>
