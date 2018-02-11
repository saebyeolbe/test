<?php
	session_start();
	$otpverify = $_POST['otp'];
	if($_SESSION["otp"] == $otpverify)
	{
		header ("Location: homepage.php");
	}
	else
	{
		header ("Location: loginpage.html");
	}
?>
