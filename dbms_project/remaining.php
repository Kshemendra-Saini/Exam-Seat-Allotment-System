<!DOCTYPE html>
<html>
<head>
	<title>Remaining students</title>
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
	<div class="w3-responsive" style="margin-left: 400px;width: 400px; border-style: solid;">
  <table class="w3-table w3-bordered w3-centered" >
   


<thead>
<tr class="w3-amber">
<th>USN</th>

</tr>
</thead>
<tbody>	
<?php
  
include 'config.php';


$qry="INSERT INTO remaining(USN) SELECT distinct USN FROM leftout WHERE USN not IN (select distinct USN from sallocate)";


$result = mysqli_query($con,$qry) or die(mysqli_error($con));



$i=0;
$left=array();
$stq="select USN from remaining";
$res = mysqli_query($con,$stq) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($res))
{
    $left[] = $row['USN'];
	}

for($i=0;$i<count($left);$i++){

echo "<tr><td>";
echo( $left[$i]);
echo "</td><tr>";


}

?>

</tbody>
</table>


</div>



</body>
</html>