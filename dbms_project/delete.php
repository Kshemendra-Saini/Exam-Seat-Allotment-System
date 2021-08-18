<?php
include "config.php";
$id = $_GET['id'];
$tablename=$_GET['tablename'];

$deletequery = "delete from ".$tablename." where USN='".$id."'";
echo $deletequery;
$query = mysqli_query($con,$deletequery);
header('location:display.php?tablename='.urlencode($tablename));

?>