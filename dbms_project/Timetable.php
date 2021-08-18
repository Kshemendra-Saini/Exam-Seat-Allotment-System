<!DOCTYPE html>
<html>
<head>
  <title>Time-table</title>
  
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    html{
      background-color: #f5f5f0; 

    }
    *{
      font-family: cursive;
      font-size: 17px;
      
    }
    
    .box{
      margin-top: 60px;
      border: 1px solid white;
      
      margin-left: 400px;
    
      width: 600px;
      box-sizing: content-box;
      background-color: white;
      box-shadow: 3px 3px 3px 3px #ebebe0;
  
          
    }


    form{
      padding: 20px 20px 20px 100px;

 
    }
  
     input[type="number"],input[type="text"],input[type="date"],input[type="time"] {
        width: 330px;
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
        background-color: #0099ff;
        border: 1px solid #0099ff;
        border-radius: 20px;
        padding: 3px;
        width: 200px;
        margin-right: 10px;
        color: white;


      }
      input:focus {
        border: 3px solid #555;
}
       button:hover{
       background-color:#33adff;
      color: black;
      border-color: #33adff;
    }
    hr{
      margin:5px;
    }
  </style>
</head>
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
    
  <h3 style="padding: 10px;height: 40px;background-color:#0099ff;color: white;text-align: center;margin: 0px;">TIME-TABLE</h3>
    <hr>
  
    <form action="" method="POST" enctype="multipart/form-data">
    
   
        <label>Semester</label><br>
        <input type="number" class="inputFields"  name="sem" placeholder="Sem" value="" oninput="return userNameValidation(this.value)" autocomplete="off" required/>
        <br><br>      
        <label>Subject Code</label><br>
        <input type="text" class="inputFields" name="subjectcode" placeholder="Subject Code" value="" oninput="return passwordValidation(this.value)" required
        autocomplete="off" /><br><br>
      
        <label>Subject</label><br>
        <input type="text" class="inputFields" name="subject" placeholder="Subject" value="" required autocomplete="off" /><br><br>
     
        <label>Date</label><br>
        <input type="date" class="inputFields" name="date" placeholder="Date" value="" required autocomplete="off" /><br><br>
      
        <label>Timing</label><br>
        <input type="time" class="inputFields"  name="time" placeholder="Time" value="" required autocomplete="off" /><br><br>
     
           
      <button type="submit" value="submit" name="submit">Submit</button>
      <button type="reset" >Reset</button>
    </form>

  
</div>
<?php
 if(isset($_POST['submit']))
{    
  $servername='localhost';
  $username='root';
  $password='';
  $dbname = "demo";
  $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }


     $sem = $_POST['sem'];
     $scode = $_POST['subjectcode'];
     $subject = $_POST['subject'];
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

     $query = "INSERT INTO timetable VALUES (".$sem.",'".$scode."','".$subject."','".$date."','".$time."')";
     //echo $query;
     $run=mysqli_query($conn,$query);
     if($run)
      {
         ?>
         <script>alert('New record added successfully!!');</script>
         <?php

        }
    else {
      ?>

      <div class="w3-panel w3-pale-red w3-card" align="center">
  <h3><?php echo "Error: " .$query . ":-" . mysqli_error($conn);
  ?></h3>
  
</div>
      <?php
    }
     mysqli_close($conn);
}
?>

  
</body>
</html>