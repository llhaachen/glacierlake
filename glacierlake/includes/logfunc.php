<?php
function logistry($connection){

$username=$_POST['username']; 
$password=$_POST['password']; 

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = $connection->query($sql);
	if (mysqli_num_rows($result) > 0) {
		if ($row = $result->fetch_assoc()) {
			$_SESSION['id'] = $row['id'];
			if ($row['level'] == 0) {
				header("Location: index.php");
				exit();
			} elseif ($row['level'] == 1) {
				header("Location: admin.php");
				exit();
			} else {
				session_unset();
				session_destroy();
				echo "<script>alert('Your account has been deactivated! ');
     			window.location='index.php';
      			</script>";
				exit();
			}
		}
	} else{
		echo "<script>alert(' Wrong Username or Password Access Denied !!! Try Again');
      window.location='index.php';
      </script>";
		exit();
	}

}