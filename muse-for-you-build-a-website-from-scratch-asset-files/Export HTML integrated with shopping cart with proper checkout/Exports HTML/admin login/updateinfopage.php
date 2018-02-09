 <?php
	session_start();
	$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
	if (!$con)
	{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
	}
	$getuid=mysqli_query($con, "SELECT `userID` from admin WHERE username='". $_SESSION["username"] ."'");

	while($row = mysqli_fetch_array($getuid))
	{
		$_SESSION["id"] = $row['userID'];
	}

	$updateinfo=mysqli_query($con, "SELECT * from admin WHERE userID ='". $_SESSION["id"] ."'");
	
	while($row1 = mysqli_fetch_array($updateinfo))
	{
		$uname = $row1['username'];
		$password = $row1['password'];
		$add = $row1['address'];
		$mail = $row1['email'];
		$cont = $row1['contactno'];  
	}

?>

<html>
<body>
	<form action="update.php" method="post">
	<h1>Update Information</h1>
	<form>
	<table>
	<input type="hidden" name="uid" value="<?php echo $uid ?>"/> 
	<tr>
		<td>Username:</td><td><input type="text" name="iuser"  maxlength="11" value="<?php echo $uname ?>" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Contain 5 or more characters that are of at least one number, and one uppercase and lowercase letter" /> </td>
	</tr>
	<tr>
		<td>Password:</td><td><input type="password" name="ipwd" placeholder="Password" maxlength="50"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter" /> </td>
	</tr>
	<tr>
		<td>Email:</td><td><input type="text" name="imail" maxlength="100" value="<?php echo $mail ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$" title="example: domain@domain.com" /> </td>
	</tr>
	<tr>
		<td>Address:</td><td><input type="text" name="iadd" maxlength="50" value="<?php echo $add ?>" required pattern="(?=.*\d).{10,}" /> </td>
	</tr>
	<tr>
		<td>Contact:</td><td><input type="value"  maxlength="8" name="icont" value="<?php echo $cont ?>" required pattern="(?=.*\d).{8}" /> </td>
	</tr>
		<td><button type="submit" value="Submit" class="button" style="vertical-align:middle"><span>Confirm</span></button></td>
	</form>
	<br/><br/><br/>
	<tr>
		<td><a href="homepage.html"><button type="button" value="button" class="button"><span>Back</span></button></a></td> 
		<td><a href="deletepage.html"><button type="button" value="button" class="button"><span>Delete Account</span></button></td>
	</tr>
	</table>
</body>
</html>


