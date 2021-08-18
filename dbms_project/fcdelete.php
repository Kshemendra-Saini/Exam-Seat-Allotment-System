<?php
include "config.php";
$id = $_GET['id'];

$deletequery = "delete from faculty1 where F_id=$id";
$query = mysqli_query($con,$deletequery);
header('location:selectfac.php');

//echo $deletequery;


?>