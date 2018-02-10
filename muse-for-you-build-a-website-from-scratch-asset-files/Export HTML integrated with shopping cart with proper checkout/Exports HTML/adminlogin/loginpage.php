<?php
session_start();
include 'config.php';
if(isset($_POST['login']))
{
$username=$_POST['username']; // Get username
$password=$_POST['password']; // get password
//query for match the user inputs
$ret=mysqli_query($con,"SELECT * FROM login WHERE userName='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
// if user inputs match if condition will run
if($num>0)
{
$_SESSION['login']=$username; // hold the user name in session
$_SESSION['id']=$num['id']; // hold the user id in session
$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
// query for inser user log in to data base
mysqli_query($con,"insert into userLog(userId,username,userIp) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip')");
// code redirect the page after login
$extra="welcome.php";
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
// If the userinput no matched with database else condition will run
else
{
$_SESSION['msg']="Invalid username or password";
$extra="index.php";
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
 }
}
?>
<html>
<body>
	<h1>Admin Login</h1>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<form action="login.php" method="post">
	<table>
	<tr>
		<td>Username: <input type="text" name="user" maxlength="11" placeholder="Username" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Contain 5 or more characters that are of at least one number, and one uppercase and lowercase letter" /></td>
	</tr>
	<tr>
		<td>Password : <input type="password" name="pass" maxlength="50" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter " /></td>
	</tr>
	<tr>
		<br/><td>Please log in from 9am to 7pm ONLY. </td>
	</tr>
	</form>
	</table>
	<br />

	<div class="g-recaptcha" data-sitekey="6LcUgkMUAAAAAEnAC8VU1l2BvpHJMjpA4ySff3pc"></div>

	<table>
	<td><a href="login.php"><button type="submit" value="submit">Login</button></a></td>
	<td><a href="createaccpage.html"><button type="button" class="button"><span>Register</span></button></a></td>
	<td><a href="forgetpass.html"><button type="submit" value="submit">Forget Password</button></a></td>
	<br/>
	</table>
</body>
</html>
