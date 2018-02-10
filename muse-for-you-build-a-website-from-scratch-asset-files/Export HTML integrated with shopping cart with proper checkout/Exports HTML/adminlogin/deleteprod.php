<html>
<body>
<b><center>PRODUCTS</center></b>
<?php
$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
if (!$con)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
?>

<?php
$id=mysqli_real_escape_string($con, $_REQUEST['idnum']);
$showprod= mysqli_query($con,"select productID from products WHERE productID='". $id ."'");
$deleteprod= mysqli_query($con, "DELETE FROM products WHERE productID='". $id ."'");
while($row = mysqli_fetch_array($showprod))
{
	$name=$row['productID'];
}

if (!empty($name))
{
	{  										//execute query
		echo "<table align='center'>";
		echo "<tr>";
		echo "<th>Product successfully removed.</th>";
		echo "</tr>";
	}
}
else
{
	die ("Item dont exist, Please re-enter");
}
?>

<br />
<table align='center'>
<tr>
<td> <a href="showprod.php"><button class="button" style="vertical-align:middle"><span>Back to home</span></button></td>
</tr></table>

</body>
</html>