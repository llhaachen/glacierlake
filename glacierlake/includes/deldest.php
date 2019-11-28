<?
session_start();
include_once 'connection.php';
if (isset($_POST['deld'])) {
				$did = $_POST['destid'];
				$sql3 = "DELETE FROM destination WHERE destid='$did'";
				$result3 = mysqli_query($connection, $sql3);
				header("Location: ../addestination.php");
				exit();
			}