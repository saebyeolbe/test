<?php
$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
if (!$con)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
?>

<?php
	session_start();
	$_SESSION["username"] = mysqli_real_escape_string($con, $_REQUEST['user']);
	$email = mysqli_real_escape_string($con, $_REQUEST['mailinfo']);
	
	$forgetpass = mysqli_query($con, "SELECT `username`,`email` from admin WHERE username='". $_SESSION["username"] ."'");
	while($row1 = mysqli_fetch_array($forgetpass))
	{
		$email1= $row1['email'];
	}
	
	if($email1 == $email)
	{
		$_SESSION["otp"] = rand(100000,999999); //generate OTP
		require_once("phpmailer.php"); //send OTP
		$mail_status = sendOTP($email1,$_SESSION["otp"]);
		header ("Location: resetpass.html");
	}
	else
	{
		die ("Wrong credentials");
	}
