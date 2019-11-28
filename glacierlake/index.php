
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

<body>
	
	<div class="wrapper">
		<!--TOP -->
		<section class="top-container">
			<header class="showcase">
				<h1>Explore Nepal</h1>
				<p>Experience the breathtakings scenes, rich culture and traditions first hand in a tour package customized to fit your needs and requirements.</p>
				<a href="destination.php" class="btn">Learn More</a>
			</header>
			<div class="top-box top-box-a">
				<h4>Treks for</h4>
				<p class="price">1-3 Days</p>
				<a href="destination.php" class="btn">View now</a>
			</div>
			<div class="top-box top-box-b">
				<h4>Treks for</h4>
				<p class="price">15-20 Days</p>
				<a href="destination.php" class="btn">View now</a>
			</div>			
		</section>

		<!--box-->
		<section class="boxes">
			<div class="box">
				<i class="fas fa-bed fa-4x"></i>
				<h3>Lodging</h3>
				<p>Lodging service as well as various homestay options</p>				
			</div>
			<div class="box">
				<i class="fas fa-bus-alt fa-4x"></i>
				<h3>Transport</h3>
				<p>Transport facilities are also managed by us.</p>				
			</div>
			<div class="box">
				<i class="fas fa-spa fa-4x"></i>
				<h3>Quality Service</h3>
				<p>Excellent service suited for your tastes.</p>				
			</div>
			<div class="box">
				<i class="fas fa-map-marked-alt fa-4x"></i>
				<h3>Destinations</h3>
				<p>Exotic destinations for beginners and experienced alike.</p>				
			</div>			
		</section>

		<section class="info">
			<img src="img/slide2.jpg" alt="">
			<div>
				<h2>Beautiful Photos</h2>
				<p>Save and showcase your amazing photos taken during the trip. Similarly, view the photos taken by other people during the trip</p>
				<a href="gallery.php" class="btn">Learn More</a>
			</div>			
		</section>

	</div>
	<footer>
			<p>Glacier Lake Tours &copy; 2019</p>
	</footer>
</body>
</html>