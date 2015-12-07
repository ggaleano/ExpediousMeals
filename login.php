<?php
session_start();
	include("db.php");
	$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
	or die ("Could not connect to mysql because ".mysqli_error());

	mysqli_select_db($con,$db_name)  //select the database
	or die ("Could not select to mysql because ".mysqli_error());

	//prevent sql injection
	$username=mysqli_real_escape_string($con,$_POST["username"]);
	$password=mysqli_real_escape_string($con,$_POST["password"]);
	
		//decrypt password

	
	//check if user exist already
	$query="select * from ".$table_name." where username='$username'";
	$result=mysqli_query($con,$query) or die('error');
	if (mysqli_num_rows($result)) //if exist then check for password
	    {
		
		//Pickup password to compare with encrypted password
		$query="select password from ".$table_name." where username='$username'";
	    $result=mysqli_query($con,$query) or die('error');
		$db_field = mysqli_fetch_assoc($result);
		$hashed_password=crypt($password,$db_field['password']);
		
 		 $query="select * from ".$table_name." where username='$username' and password='$hashed_password'";
		 $result=mysqli_query($con,$query) or die('error');
		 if (mysqli_num_rows($result))  //if passwords match then check actvation status
		 {
			 $query="select * from ".$table_name." where username='$username' and password='$hashed_password' and activ_status in(1)";
		     $result=mysqli_query($con,$query) or die('error');
			 if(mysqli_num_rows($result))
			 {  
				 $_SESSION['login'] = true;
				 $_SESSION['username']=$username;
				 echo json_encode( array('result'=>1));
			 }
			 else
			 {
			 echo json_encode( array('result'=>"$msg_email_1 <br /><a href=\"".$url."\\resend_key.php?user=".$username."\">$msg_email_2</a>."));
				// echo "User Account not yet activated.Check your mail for activation details.";
			 }
			 
		 }
		 else
		 {
		 echo json_encode( array('result'=>$msg_pwd_error));
		//	 echo trim("password incorrect");
		 }
 	    }	
	else
	{
	echo json_encode( array('result'=>$msg_un_error));
	//	die("Username Doesn't exist");
	die();
	}

?>