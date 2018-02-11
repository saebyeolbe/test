<html>
<body>
<h1>Welcome</h1>
<table>
<tr>
	<td><a href="updateinfopage.php"><button type="submit" value="Submit" class="button"><span>Edit Account</span></button></td>	
	<td><a href="showprod.php"><button type="submit" value="Submit" class="button"><span>View Products</span></button></td>
	<td><a href="logout.php"><button type="submit" value="Submit" class="button"><span>Log out</span></button></td>
</tr>
</table>
<?php
	session_start();
	if(time()- $_SESSION["time"] > 600)
	{
		header("Location:logout.php");
	}
	else
	{
		$_SESSION["time"] = time();
	}
?>
	
</body>
</html>
