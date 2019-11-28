<?php
include_once('connection.php');
session_start();
if (isset($_POST['deld'])) {
				$did = $_POST['destid'];
				$sql3 = "DELETE FROM destination WHERE destid='$did'";
				$result3 = mysqli_query($connection, $sql3);
				header("Location: ../addestination.php");
				exit();
			}