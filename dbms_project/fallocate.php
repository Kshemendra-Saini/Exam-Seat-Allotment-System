<!DOCTYPE html>
<html>
<head>
	<title>Faculty allocation</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<?php
     include 'config.php';
	 $query = mysqli_query($con,"SELECT date,time from exam limit1") or die("Error: ". mysqli_error(). " with query ");
     
     if(mysqli_num_rows($query) > 0 ){
	 while ($row = mysqli_fetch_array ($query)) {
  $date=$row['date'];
  $time=$row['time'];
}

}


	?>

	<table>
		<th> Exam Date : <?php echo "        $date   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " ?></th>
		<th> Exam Time : <?php echo "        $time   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " ?></th>
	</table>

	<br><br>
	<div class="w3-responsive" style="margin: 50px 150px;border-style: solid;">
  <table class="w3-table w3-bordered w3-centered">
   


<thead>
<tr class="w3-green">
<th>Room number</th>
<th>Faculty Name</th>
<th>Faculty mail id</th>
</tr>
</thead>
<tbody>	
<?php
  
include 'config.php';
$query = "SELECT Classno FROM classroom1";
$result = mysqli_query($con,$query) or die(mysqli_error($con));


$class_array = array();
while($row = mysqli_fetch_assoc($result))
{
    $class_array[] = $row['Classno'];
}
$query1 = "SELECT Email FROM faculty1 where No_of_duties!=0";
$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));


$fac_array = array();

while($row = mysqli_fetch_assoc($result1))
{
    $fac_array[] = $row['Email'];
}


shuffle($fac_array);
shuffle($class_array);
$i=0;
$r=mysqli_query($con,"TRUNCATE facallocate") or die(mysqli_error($con));
for($i=0;$i<count($class_array);$i++){
$findname="select F_fname,F_lname from faculty1 where Email='$fac_array[$i]'";
 $ex=mysqli_query($con,$findname) or die(mysqli_error($con));
   
	 if(mysqli_num_rows($ex) > 0 ){
	 while ($row = mysqli_fetch_array ($ex)) {
   $fname=$row['F_fname'];
  $lname=$row['F_lname'];
}

}

   
$insert="insert into facallocate(classno,fname,lname,email) values($class_array[$i],'$fname','$lname','$fac_array[$i]')";
$run=mysqli_query($con,$insert) or die(mysqli_error($con));
/*$subject="Room Allocation";
$body="Hi $fname $lname, the room allocated for you on date : $date and time : $time is Room number = $class_array[$i]";
            $headers="From:Anonymous Sender";
            mail($fac_array[$i],$subject,$body,$headers);
*/
echo "<tr><td>";
echo( $class_array[$i]);
echo "</td><td>";
echo ( $fname." ".$lname );
echo "</td><td>";

echo($fac_array[$i]);
echo "</td></tr>";
$dec="update faculty1 set No_of_duties=No_of_duties-1 where Email='$fac_array[$i]'";
$rundec=mysqli_query($con,$dec) or die(mysqli_error($con));
$dec1="update faculty set No_of_duties=No_of_duties-1 where Email='$fac_array[$i]'";
$rundec1=mysqli_query($con,$dec1) or die(mysqli_error($con));
}
?>

</tbody>
</table>


</div>


</body>
</html>