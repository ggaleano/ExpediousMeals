<?php
	include("db.php");

	$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
	or die ("Could not connect to mysql because ".mysqli_error());

	mysqli_select_db($con,$db_name)  //select the database
	or die ("Could not select to mysql because ".mysqli_error());

//prevent sql injection
$username=mysqli_real_escape_string($con,$_POST["username"]);
$email=mysqli_real_escape_string($con,$_POST["email"]);
$fname=mysqli_real_escape_string($con,$_POST["fname"]);
$lname=mysqli_real_escape_string($con,$_POST["lname"]);
$gender=mysqli_real_escape_string($con,$_POST["gender"]);
$phone=mysqli_real_escape_string($con,$_POST["phone"]);
$address=mysqli_real_escape_string($con,$_POST["address"]);


	
//check if user exist already
$query="select * from ".$table_name." where username='$username'";
$result=mysqli_query($con,$query) or die('error');
if (mysqli_num_rows($result))
  {
 die($msg_reg_user);
  }
  //check if user exist already
$query="select * from ".$table_name." where email='$email'";
$result=mysqli_query($con,$query) or die('error');
if (mysqli_num_rows($result))
  {
die($msg_reg_email);

  }

 
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $password=substr(str_shuffle($chars),0,8);


	
	$activ_key = sha1(mt_rand(10000,99999).time().$email);
	$hashed_password = crypt($password); 
	$query="insert into ".$table_name."(email,fname,lname,activ_key,gender,phone,address) values ('$email','$fname','$lname','$activ_key','$gender','$phone','$address')";
	
	if (!mysqli_query($con,$query))
  {
die('Error: ' . mysqli_error());

  }
 
  //send email for the user with password
	
	$to=$email;
	$subject="New Registration";
	$body="Hi ".$username.
	"<br /> Thanks for your registration.<br />".
	"Your password is ".$password."<br />".
	"Click the below link to activate your account<br />".
	"<a href=\"$url/activate.php?k=$activ_key\"> Activate Account </a>";
	
	
	$headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .="From:".$from_address . "\r\n";;
	
	
	
	mail($to,$subject,$body,$headers);
	echo $msg_reg_activ;
	 
?>