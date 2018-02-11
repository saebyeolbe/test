<html>
<body> 
<b><center>UPDATE YOUR ACCOUNT</center></b> 
<?php
$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
if (!$con){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
?>

<?php
session_start();
$user= mysqli_real_escape_string($con, $_REQUEST['iuser']);
$pwd= mysqli_real_escape_string($con, $_REQUEST['ipwd']);  
$add= mysqli_real_escape_string($con, $_REQUEST['iadd']);
$mail= mysqli_real_escape_string($con, $_REQUEST['imail']);
$cont= mysqli_real_escape_string($con, $_REQUEST['icont']);


$password_hash = password_hash($pwd, PASSWORD_BCRYPT);
$updateuser=mysqli_query($con, "UPDATE admin SET username = '$user' , password = '$password_hash' , address = '$add' , email = '$mail' , contactno = '$cont' WHERE userID ='". $_SESSION["id"] ."'");

if($updateuser)
{
	echo "Account Information Updated Successfully";
}
else
{
	echo "Error Performing Changes; Please Try Again";
	header ("Location: updateinfopage.php");
}

echo "<table align='middle' border='1'>";
echo "<tr>";
echo "<th>Username</th>";
echo "<th>Password</th>";
echo "<th>Address</th>";
echo "<th>Email</th>";
echo "<th>Contact </th>";
echo "</tr>";

echo "<tr>";
echo "<td>".$user."</td>";
echo "<td>".$pwd."</td>";
echo "<td>".$add."</td>";
echo "<td>".$mail."</td>";
echo "<td>".$cont."</td>";
echo "</tr>";

echo "</table>";
?>

<br/>
<table>
<tr>
	<td><a href="updateinfopage.php"><button type="submit" value="Submit" class="button"><span>Back</span></button></td>
	<td><a href="homepage.php"><button type="submit" value="Submit" class="button"><span>Confirm</span></button></td>
</tr>

</body>
</html>
