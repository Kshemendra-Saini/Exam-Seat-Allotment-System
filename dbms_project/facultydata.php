<!DOCTYPE html>
<html>
<head>
  <title>Students list</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
      margin-top: 100px;
      border: 1px solid white;
      
      margin-left: 400px;
    
      width: 550px;
      
      background-color: white;
      box-shadow: 3px 3px 3px 3px #ebebe0;
      box-sizing: content-box;
  
          
    }


    form{
      padding: 20px 20px 20px 80px;

 
    }
    input[type="text"],input[type="number"] {
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
      input:focus {
        border: 3px solid #555;
}
      
</style>
</head>
<body>

 <div class="w3-bar w3-black" >
  
     <a href="firstpage.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>
    
    <a href="facultydata.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-table fa-fw"></i>  Showlist</a>
    <a href="facultyhome.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-file-o fa-fw"></i>  Upload file</a>
    <a href="faculty_home.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-home fa-fw"></i>  Home</a>
    

</div>
<div class="box">
    
  
    <form  method="post" >
      <label>Semester</label><br>
      <input type="number" name="sem" id="sem" required><br><br>
       <label>Section</label><br>
      <input type="text" name="sec" id="sec"  autocomplete="off" required><br><br>
      <label>Course Id</label><br>
      <input type="text" name="courseid" id="cid"  autocomplete="off" required><br><br>
      <button name="show" class="w3-btn w3-blue" style="margin-left: 150px;">Show list</button>
    </form>
<?php   

      
if(isset($_POST['show'])) { 
           
$courseid = $_POST['courseid'];
  $sem = $_POST['sem'];
   $sec = $_POST['sec'];
  $tablename=$courseid."_".$sem.$sec;
  
  header('location:displaydemo.php?tablename='.urlencode($tablename));

  }

  ?>

  
</div>



</body>
</html>