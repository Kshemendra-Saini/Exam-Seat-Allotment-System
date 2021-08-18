<!DOCTYPE html>
<html>
<head>
	<title>Student allocation</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<?php
     include 'config.php';
	 $query = mysqli_query($con,"SELECT distinct sem,subjectcode,date,time from exam") or die("Error: ". mysqli_error(). " with query ");
     $subjectcode = array();
     $sem = array();
     if(mysqli_num_rows($query) > 0 ){
	 while ($row = mysqli_fetch_array ($query)) {
  $date=$row['date'];
  $time=$row['time'];
 
$subjectcode[] = $row['subjectcode'];
$sem[]=$row['sem'];

}
}
$j=0;
for($j=0;$j<count($subjectcode);$j++){
$del=mysqli_query($con,"DROP TABLE IF EXISTS demo.$subjectcode[$j];") or die(mysqli_error($con));
$create="create table $subjectcode[$j] as (select USN,S_email,Sem from ".$subjectcode[$j]."_".$sem[$j]."a where eligibility='E')";
$s=mysqli_query($con,$create) or die(mysqli_error($con));
/*union select * from ".$subjectcode[$j]."_".$sem[$j]."b)";
;*/
$in="insert into $subjectcode[$j](USN,S_email,Sem) select USN,S_email,Sem from ".$subjectcode[$j]."_".$sem[$j]."b where eligibility='E' union all select USN,S_email,Sem from ".$subjectcode[$j]."_".$sem[$j]."c where eligibility='E'"; 
//echo $in;
  $r=mysqli_query($con,$in) or die(mysqli_error($con));
}



	?>

	<table>
		<th> Exam Date : <?php echo "        $date   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " ?></th>
		<th> Exam Time : <?php echo "        $time   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " ?></th>
	</table>

	<!-- <a href="remaining.php"><button class="w3-button w3-black w3-right " name="leftout">Unallocated Students</button></a>

<br> --><br>
	<?php 
    include 'config.php';
    $n=0;
for($n=0;$n<count($subjectcode);$n++){
$create="insert into leftout(USN) select USN from ".$subjectcode[$n];
//echo $create;
$s=mysqli_query($con,$create) or die(mysqli_error($con));
}
$query = "SELECT Classno,NofSeats FROM classroom1";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$nost=array();
$noseats="select NofSeats from classroom1";
$runos = mysqli_query($con,$noseats) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($runos))
{
    $nost[] = $row['NofSeats'];
	}
$sum=array_sum($nost);
$class_array = array();
$seats =array();
/*$rows = array();
$clmns= array();*/
while($row = mysqli_fetch_assoc($result))
{
    $class[] = $row['Classno'];
    $seats[] =$row['NofSeats'];
/*$rows[]= $row['Nofrows'];
$clmns[]=$row['Nofcolumns'];*/
}
$class1 = array();
$class2 = array();
$class3 = array();


$stq="select USN from $subjectcode[0]";
$r = mysqli_query($con,$stq) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($r))
{
    $class1[] = $row['USN'];
	}
$stq="select USN from $subjectcode[1]";
$r = mysqli_query($con,$stq) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($r))
{
    $class2[] = $row['USN'];
	}
$stq="select USN from $subjectcode[2]";
$r = mysqli_query($con,$stq) or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($r))
{
    $class3[] = $row['USN'];
	}
shuffle($class1);
shuffle($class2);
shuffle($class3);


	$k=0;
	$y=0;
	$stusum=0;
	for($k=0;$k<count($class);$k++){

		?>
		
<h3 align="center" style="font-weight: bold;">
		<?php

		echo "Room number:".$class[$k];
		?>
	</h3>


		<div class="w3-responsive" style="margin: 50px 150px;border-style: solid;">
  <table class="w3-table w3-bordered w3-centered">
   
<thead>
<tr class="w3-pink">
<th>Seat number</th>
<th>Sem</th>
<th>Usn</th>
<th>Email</th>
</tr>
</thead>
<tbody>	

	<?php
  
include 'config.php';
$nos=$seats[$k];
//$run=mysqli_query($con,"TRUNCATE sallocate") or die(mysqli_error($con));

$x=1;

while($x<=$nos){
	if($y<count($class1)){
$find="select Sem,S_email from $subjectcode[0] where USN='$class1[$y]'";
 $ex=mysqli_query($con,$find) or die(mysqli_error($con));
   
	 if(mysqli_num_rows($ex) > 0 ){
	 while ($row = mysqli_fetch_array ($ex)) {
   $sem=$row['Sem'];
   $smail=$row['S_email'];
}

}

$insert="insert into sallocate(Classno,Seat_no,Sem,USN,Email) values($class[$k],$x,'$sem','$class1[$y]','$smail')";

$runin=mysqli_query($con,$insert) or die(mysqli_error($con));
echo "<tr><td>";
echo ($x);
echo "</td><td>";
echo ($sem);
echo "</td><td>";

echo ($class1[$y]);
echo "</td><td>";
echo ($smail);
echo "</td></tr>";


}
else{
echo "<tr><td>";
echo ($x);
echo "</td><td>";
echo "-";
echo "</td><td>";

echo "-";
echo "</td><td>";
echo "-";
echo "</td></tr>";

}
$stusum+=1;
$x++;
if($stusum==$sum){
	break;
}
if($y<count($class2)){
$find1="select Sem,S_email from $subjectcode[1] where USN='$class2[$y]'";
 $ex1=mysqli_query($con,$find1) or die(mysqli_error($con));
   
	 if(mysqli_num_rows($ex1) > 0 ){
	 while ($row = mysqli_fetch_array ($ex1)) {
   $sem=$row['Sem'];
   $smail=$row['S_email'];
}

}
$insert1="insert into sallocate(Classno,Seat_no,Sem,USN,Email) values($class[$k],$x,'$sem','$class2[$y]','$smail')";


$runin1=mysqli_query($con,$insert1) or die(mysqli_error($con));
echo "<tr><td>";
echo ($x);
echo "</td><td>";
echo ($sem);
echo "</td><td>";

echo ($class2[$y]);
echo "</td><td>";
echo ($smail);
echo "</td></tr>";
}
else{
echo "<tr><td>";
echo ($x);
echo "</td><td>";
echo "-";
echo "</td><td>";

echo "-";
echo "</td><td>";
echo "-";
echo "</td></tr>";

}
$stusum+=1;
$x++;

if($stusum==$sum){
	break;
}
if($y<count($class3)){

$find2="select Sem,S_email from $subjectcode[2] where USN='$class3[$y]'";
 $ex2=mysqli_query($con,$find2) or die(mysqli_error($con));
   
	 if(mysqli_num_rows($ex2) > 0 ){
	 while ($row = mysqli_fetch_array ($ex2)) {
   $sem=$row['Sem'];
   $smail=$row['S_email'];
}

}
$insert2="insert into sallocate(Classno,Seat_no,Sem,USN,Email) values($class[$k],$x,'$sem','$class3[$y]','$smail')";

$runin2=mysqli_query($con,$insert2) or die(mysqli_error($con));
echo "<tr><td>";
echo ($x);
echo "</td><td>";
echo ($sem);
echo "</td><td>";

echo ($class3[$y]);
echo "</td><td>";
echo ($smail);
echo "</td></tr>";
}
else{
echo "<tr><td>";
echo ($x);
echo "</td><td>";
echo "-";
echo "</td><td>";

echo "-";
echo "</td><td>";
echo "-";
echo "</td></tr>";

}
$stusum+=1;
$x++;
$y++;
if($stusum==$sum){
	break;
}
}

?>

</tbody>
</table>




</div>
<?php
	}
?>


</body>
</html>

