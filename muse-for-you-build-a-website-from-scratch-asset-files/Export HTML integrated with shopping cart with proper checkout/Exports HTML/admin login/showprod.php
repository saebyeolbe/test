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
$showprod= mysqli_query($con, "select * from products ");
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

?>
<br>
<table align='center'>
<tr>
<td> <a href="createprodpage.html"><button class="button" style="vertical-align:middle"><span>New Product</span></button></td>
<td> <a href="selectprodpage.html"><button class="button" style="vertical-align:middle"><span>Select Product</span></button></td>
<td> <a href="selectprodupdate.html"><button class="button" style="vertical-align:middle"><span>Update Product</span></button></td>
<td> <a href="deleteprodpage.html"><button class="button" style="vertical-align:middle"><span>Remove Product</span></button></td>
<td> <a href="homepage.html"><button class="button" style="vertical-align:middle"><span>Home</span></button></td>
</tr> </table>




