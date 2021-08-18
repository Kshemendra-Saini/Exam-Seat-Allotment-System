<!DOCTYPE html>
<html>
<head>
	<title>Room Allocation</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
    html{
      background-color: #f5f5f0; 

    }
    *{
      font-family: cursive;
      font-size: 17px;
      
    }
    
    .box{
      margin-top: 50px;
      border: 1px solid white;
      
      margin-left: 400px;
    
      width: 550px;
      
      background-color: white;
      box-shadow: 3px 3px 3px 3px #ebebe0;
      box-sizing: content-box;
  
          
    }
input[type="date"],input[type="time"] {
        width: 200px;
        padding: 5px 5px;
          margin: 8px 30px;
        
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
        border-radius: 5px;
        cursor: pointer;

      
      }

      button{
        cursor: pointer;
        
        border-radius: 20px;
        padding: 3px;
        width: 200px;
       
        margin:30px;
        color: white;


      }
      input:focus {
        border: 3px solid #555;
}
       
    hr{
      margin:5px;
    }
  </style>
<body>
  <div class="w3-bar w3-black" >
  
     <a href="firstpage.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>
    <a href="alloc.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-check fa-fw"></i>  Room Allocation</a>
    <a href="Timetable.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-calendar-o fa-fw"></i>  Timetable</a>
    <a href="Classroom.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-table fa-fw"></i>  Classroom</a>
    <a href="faculty_details.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-users fa-fw"></i>  Faculty</a>
    <a href="Home.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-home fa-fw"></i>  Home</a>
    

</div>
  <div class="box">
    <div style="margin:10px 150px;">
      <h3 align="center">Allocation details</h3><hr><br>
   <form method="post">
     <button name="clear" class="w3-yellow">Clear previous entries</button>


   </form>
   <?php 

   if (isset($_POST['clear'])) {
    include 'config.php';
    $fac=mysqli_query($con,"DROP TABLE IF EXISTS demo.faculty1;") or die(mysqli_error($con));
    $clas=mysqli_query($con,"DROP TABLE IF EXISTS demo.Classroom1;") or die(mysqli_error($con));
    $run=mysqli_query($con,"TRUNCATE sallocate") or die(mysqli_error($con));
     $ru=mysqli_query($con,"TRUNCATE facallocate") or die(mysqli_error($con));
    $re=mysqli_query($con,"TRUNCATE leftout") or die(mysqli_error($con));
  $r=mysqli_query($con,"TRUNCATE remaining") or die(mysqli_error($con));
?>

<script type="text/javascript">alert('Previous data is cleared');</script>
<?php

   }

    ?>
   
  <label>Select Faculty</label><br>
<a href="selectfac.php" target="_blank"><button class="w3-yellow ">Select faculty</button></a><br><br>
<label>Select Classroom</label><br>
<a href="selectclass.php" target="_blank"><button class="w3-yellow ">Select Classroom</button></a><br><br>
<form method="post">
	
	

<label>Date</label><br>
  <input type="date" name="date" required><br><br>
  <label>Time</label><br>
  <input type="Time" name="time" required><br><br><br>
<button type="submit" name="faculty" class="w3-yellow">Allocate Faculty</button>
<button type="submit" name="student" class="w3-yellow">Allocate Student</button>
</form>

<?php
if(isset($_POST['faculty'])){
	include 'config.php';
	 $d = $_POST['date'];
     $t = $_POST['time'];


    $date=date("Y-m-d",strtotime($d));

    $timeType = explode(" ", $t);
    $timeItems = explode(":", $timeType[0]);
    if(isset($timeType[1])) { 
    
    if($timeType[1] == "PM"){
        $timeItems[0] += 12;
    }
  }
    $time = implode(":", $timeItems);
    $time .= ":00";
  
   $exa=mysqli_query($con,"DROP TABLE IF EXISTS demo.exam;");
   $query="create table exam as (select * from timetable where date='".$date."' and time='".$time."')";
   $result=mysqli_query($con,$query) or die(mysqli_error($con));
   if($result){
  
    header('location:fallocate.php');
}
}

if(isset($_POST['student'])){
  header('location:sallocate.php');
}

?>
</div>
</div>
</body>
</html>