<?php
$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
if (!$con)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

$username= mysqli_real_escape_string($con, $_REQUEST['userinfo']);
$pwd = mysqli_real_escape_string($con, $_REQUEST['passinfo']);
$address= mysqli_real_escape_string($con, $_REQUEST['addinfo']);
$email= mysqli_real_escape_string($con, $_REQUEST['mailinfo']);
$contact= mysqli_real_escape_string($con, $_REQUEST['continfo']);


$password_hash = password_hash($pwd, PASSWORD_BCRYPT);
$admin = mysqli_query($con, "INSERT INTO admin (`username`,`userID`,`password`,`address`,`email`,`contactno`) VALUES ('$username',NULL,'$password_hash','$address','$email','$contact')");


if ($admin) 	//execute query
{
 echo "New admin account added";
}
else
{
  echo "Acccount already exists";
  ?><br/><td><a href="createaccpage.html"><button type="submit" value="Submit" class="button"><span>Back</span></button></td> <?php
}
?>

<html>
<body>  
</br>
	<table>
	<tr>
		<td><a href="loginpage.php"><button type="submit" value="Submit" class="button"><span>Login</span></button></td>
	</tr>
	</table>

</body>
</html>
