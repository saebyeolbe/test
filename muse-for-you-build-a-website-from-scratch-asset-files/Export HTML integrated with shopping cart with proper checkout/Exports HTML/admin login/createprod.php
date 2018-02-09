<html>
<body>  

<?php
$con = mysqli_connect("localhost","root","","swapdb"); //connect to database
if (!$con)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

$id = mysqli_real_escape_string($con, $_REQUEST['prodid']);
$name = mysqli_real_escape_string($con, $_REQUEST['prodname']);
$price = mysqli_real_escape_string($con, $_REQUEST['prodprice']);
$code = mysqli_real_escape_string($con, $_REQUEST['prodcode']);
$size = mysqli_real_escape_string($con, $_REQUEST['prodsize']);

$insertdata= mysqli_query($con, "INSERT INTO products (`productID`,`productName`,`price`,`code`,`size`) VALUES ('$id', '$name', '$price', '$code', '$size')") ;

if ($insertdata)
{
	{  										
		echo "<table align='center'>";
		echo "<tr>";
		echo "<th>Product successfully added.</th>";
		echo "</tr>";
	}

	$showprod=mysqli_query($con, "select productID,productName,price,code,size from products ");
	echo "<table align='center' border='1'>";
	echo "<tr>";
	echo "<th>Product ID</th>";
	echo "<th>Product Name</th>";
	echo "<th>Price</th>";
	echo "<th>Code</th>";
	echo "<th>Size</th>";
	echo "</tr>";
	
	while($row1 = mysqli_fetch_array($showprod))
	{
		echo "<tr>";
		echo "<td>".$row1['productID']."</td>";
		echo "<td>".$row1['productName']."</td>";
		echo "<td>".$row1['price']."</td>";
		echo "<td>".$row1['code']."</td>";
		echo "<td>".$row1['size']."</td>";
		echo "</tr>";	
	
	}
	echo "</table>";
}

else
{
	header ("Location: createprodpage.html");
}
?>

<table align='center'>
<br />
<tr>
<td> <a href="showprod.php"><button class="button" style="vertical-align:middle"><span>Back to home</span></button></td>
</tr>

</table>
</body>
</html>