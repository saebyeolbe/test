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
$prodid=mysqli_real_escape_string($con, $_REQUEST['id']);
$prodname=mysqli_real_escape_string($con, $_REQUEST['name']);
$prodprice=mysqli_real_escape_string($con, $_REQUEST['price']);
$prodcode=mysqli_real_escape_string($con, $_REQUEST['code']);
$prodsize=mysqli_real_escape_string($con, $_REQUEST['size']);

$updateprod=mysqli_query($con, "UPDATE products SET productName = '$prodname', price = '$prodprice', code = '$prodcode', size = '$prodsize' WHERE productID='". $prodid ."'");

if ($updateprod)
{  										//execute query
  echo "<table align='center'>";
  echo "<tr>";
  echo "<th>Product successfully updated.</th>";
  echo "</tr>";
}


echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>Product ID</th>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Code</th>";
echo "<th>Size</th>";
echo "</tr>";

echo "<tr>";
echo "<td>".$prodid."</td>";
echo "<td>".$prodname."</td>";
echo "<td>".$prodprice."</td>";
echo "<td>".$prodcode."</td>";
echo "<td>".$prodsize."</td>";
echo "</tr>";	
echo "</table>";

?>

<table align='center'>
<tr><br>
<td> <a href="showprod.php"><button class="button" style="vertical-align:middle"><span>Back to home</span></button></td>
</tr></table>

</body>
</html>