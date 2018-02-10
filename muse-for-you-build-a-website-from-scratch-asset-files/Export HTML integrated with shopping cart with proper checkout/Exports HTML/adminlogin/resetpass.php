<?php
$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
if (!$con)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
?>

<?php
session_start();
$otpverify = $_POST['otp'];
if($_SESSION["otp"] == $otpverify)
{
	$pass=mysqli_real_escape_string($con, $_REQUEST['pass']);
	$password_hash = password_hash($pass, PASSWORD_BCRYPT);
	$updateuser=mysqli_query($con, "UPDATE admin SET password = '$password_hash' WHERE username ='". $_SESSION["username"] ."'");
	?><a href="loginpage.php"><button type="button" value="button" class="button"><span>Back</span></button></a><?php
	die ("Update Complete");
}
else
{
	header ("Location: loginpage.php");
}

session_unset();
session_destroy();
?>
