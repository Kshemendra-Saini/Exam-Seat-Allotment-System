<!DOCTYPE html>
<html>
<head>
	<title>Students list</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="w3-responsive">
  <table class="w3-table w3-bordered w3-centered">
   


<thead>
<tr class="w3-blue">

	
	
<?php   

include 'config.php';
$tablename=$_GET['tablename'];

$query = "select * from ".$tablename;
$run = mysqli_query($con,$query) or die(mysqli_error($con));
$nums=mysqli_num_fields($run);


    while($mysql_query_fields = mysqli_fetch_field($run)){
        $mysql_fields[] = $mysql_query_fields->name;
        echo "<th>".ucfirst($mysql_query_fields->name)."</th>";
        
    }
?>
<th>Not Eligible</th>
</tr>
</thead>
<tbody>
<tr>
<?php
while($res = mysqli_fetch_array($run)){

echo "<tr>";
	for($i=0;$i<$nums;$i++){
	 echo "<td>".$res[$i]."</td>";
	}
	
?>
<td><a href="delete.php?id=<?php echo $res[0]; ?>&tablename=<?php echo $tablename?>"><i title="DELETE" class="fa fa-check-square"></i></a></td>
</tr>
<?php }
?>
</tbody>

</table>
</div>

</body>
</html>