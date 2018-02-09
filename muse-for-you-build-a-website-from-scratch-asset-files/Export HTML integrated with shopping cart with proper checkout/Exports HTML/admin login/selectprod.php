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
$showprod= mysqli_query($con,"select * from products WHERE productID='". $id ."'");
while($row = mysqli_fetch_array($showprod))
{
	$id=$row['productID'];
	$name=$row['productName'];
	$price1=$row['price'];
	$code1=$row['code'];
	$size1=$row['size'];
	
}
if (!empty($name))
{
		echo "<table align='center' border='1'>";
		echo "<tr>";
		echo "<th>Product ID</th>";
		echo "<th>Product Name</th>";
		echo "<th>Price</th>";
		echo "<th>Code</th>";
		echo "<th>Size</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$price1."</td>";
		echo "<td>".$code1."</td>";
		echo "<td>".$size1."</td>";
		echo "</tr>";
	echo "</table>";		
}	
else
{
	die ("Item dont exist, Please re-enter");
}
?>

<br>
<table align='center'>
<tr>
<td> <a href="showprod.php"><button class="button" style="vertical-align:middle"><span>View All Products</span></button></td>
</tr> </table>

</body>
</html>