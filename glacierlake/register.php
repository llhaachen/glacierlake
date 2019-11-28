<?php
	include('includes/header1.php');
	include('includes/rfunc.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/rstyle.css">
	<title>Glacier Lake - Sign Up</title>
</head>
<body>
	<div class="wrapperx">
	<div class="box">
		<h2>SIGN UP</h2>
		<form method="POST" class="sbox" action="">
			<p>New here? Quickly signup for an account now.</p><br>
			<p>All new usernames must contain at least 6 characters. </p>
			<input type="text" placeholder="UserName" name="username">
			<input type="email" placeholder="Email Address" name="email">
			<p>All new passwords must contain at least 8 characters. </p>
			<input type="password" placeholder="Password" name="password">
			<input type="password" placeholder="Confirm Password" name="confirmpassword"><br>
			<p>Signing up for an account means you agree<br>
			 to the <u>Privacy Policy</u> and <u>Terms of Service</u>.</p>
			<button type="submit" class="btn" name="register">Sign Up</button><br><br>
			<a class='norml' href="index.php">Have an account?</a>			
		</form>
		<?php
		if (isset($_POST['register'])){
			registry($connection);
		}
		?>
	</div>
</div>
</body>
<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</html>