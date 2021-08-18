<!DOCTYPE html>
<html>
<head>
	<title>Select Classroom</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="w3-responsive" style="margin: 10px;border-style: solid;">
  <table class="w3-table w3-bordered w3-centered">
   


<thead>
<tr class="w3-indigo">

  
<?php
  
include 'config.php';
 //$xyz="DROP TABLE IF EXISTS demo.faculty1;";
   //$a=mysqli_query($con,$xyz);
$val=mysqli_query($con,"select 1 from classroom1 limit 1");
if(!$val){
 $copy="create table classroom1 as (select * from classroom)";
 $r=mysqli_query($con,$copy) or die(mysqli_error($con));
}

$query = "select * from classroom1";
$run = mysqli_query($con,$query);
$nums=mysqli_num_fields($run);


    while($mysql_query_fields = mysqli_fetch_field($run)){
        $mysql_fields[] = $mysql_query_fields->name;
        echo "<th>".ucfirst($mysql_query_fields->name)."</th>";
        
    }
?>
<th>Not Available</th>
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
<td><a href="classdelete.php?id=<?php echo $res[0]; ?>"><i title="DELETE" class="fa fa-check-square"></i></a></td>
</tr>


<?php

}



?>
</tbody>

</table>
</div>
</body>
</html>