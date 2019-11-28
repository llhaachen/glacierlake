<?php

function isNameUnique($username){
    $querry="select * from user where username='$username'";
    global $connection;

    $result = $connection->query($querry);

    if($result->num_rows >=1){
      return false;
    }
    else{
      return true;
    }
}
function isEmailUnique($email){
    $querry="select * from user where email='$email'";
    global $connection;

    $result = $connection->query($querry);

    if($result->num_rows >=1){
      return false;
    }
    else{
      return true;
    }
  }
 function registry($connection){

    if(strlen($_POST['username'])<6){
      echo '<script type="text/javascript">alert("Username must be at least 6 characters");</script>';
       exit();
    }
    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $_POST['password'])){
      echo '<script type="text/javascript">alert("Username must be at least 6 characters");</script>';
      exit();
    }
    else if(($_POST['password'])!=($_POST['confirmpassword'])){
      echo '<script type="text/javascript">alert("Username must be at least 6 characters");</script>';
      exit();
    }
    else if(!isEmailUnique($_POST['email'])){
      echo '<script type="text/javascript">alert("Username must be at least 6 characters");</script>';
      exit();
    }
    else if(!isNameUnique($_POST['username'])){
      echo '<script type="text/javascript">alert("Username must be at least 6 characters");</script>';
      exit();
    }
    else{    
      $username=$_POST['username'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $sql="INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')";
      $qry = mysqli_query($connection, $sql);   
      
      /*
    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = '
 
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	 
	------------------------
	Username: '.$username.'
	Password: '.$password.'
	------------------------
	 

	 
	'; // Our message above including the link
	                     
	$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Send our email
  */
	      echo ("<script LANGUAGE='JavaScript'>
        window.alert('Registration Successful!');
        window.location.href='index.php';
        </script>");
        exit();      
	    
	  }
 }