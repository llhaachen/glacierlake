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
	<title>Guides</title>
</head>
<body>
		<div class="wrapper">
			<section class="box">
				<h2> Guides/ Tips</h2>
				<div class="boxx">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/b5OmOZ8IaVY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				<div class="boxx">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/k9-T-dOFdFE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				<div class="boxx">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/oXGNjPhZuWE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
				<div class="boxx">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/IXx7ozc9ZwM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					
				</div>
			</section>
			
		</div>
	<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</body>

</html>