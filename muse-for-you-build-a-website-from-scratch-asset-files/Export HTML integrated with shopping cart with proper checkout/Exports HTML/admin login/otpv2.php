<?php
	session_start();
	$otpverify = $_POST['otp'];
	if($_SESSION["otp"] == $otpverify)
	{
		header ("Location: homepage.html");
	}
	else
	{
		header ("Location: loginpage.html");
	}
?>