<?php
$con = mysqli_connect("localhost","root","","swapdb");
if (mysqli_connect())
{
  echo "Failed to connect to MySQL: ". mysqli_connect_error();
}
?>
