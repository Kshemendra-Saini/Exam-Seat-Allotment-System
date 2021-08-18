<!DOCTYPE html>
<html>
<head>
  <title>File upload</title>
  
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
      margin-top: 50px;
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
  
    input[type="file"],input[type="text"],input[type="number"] {
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
      border-color:#33adff;
    }
    hr{
      margin:5px;
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
    
  
    <form action ="" method="post" enctype="multipart/form-data">
      <label>Semester</label><br>
      <input type="number" name="sem" required><br><br>
       <label>Section</label><br>
      <input type="text" name="sec" required><br><br>
      <label>Course Id</label><br>
      <input type="text" name="courseid" required><br><br>
      <label>Upload file</label><br>
      <input type="file" id="file" name="excel" required><br><br>
      <button type="submit" value="submit" name="submit" >Upload file</button>
      <button type="reset">Reset</button>
    </form>

  
</div>
<?php
if(isset($_FILES['excel']['name'])){
  $con=mysqli_connect("localhost","root","","demo");
  include "xlsx.php";
  $courseid = $_POST['courseid'];
  $sem = $_POST['sem'];
   $sec = $_POST['sec'];
  $tablename=$courseid."_".$sem.$sec;

  if($con){
  
    $excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
    //echo "<pre>"; 
    // print_r($excel->rows(1));
    //print_r($excel->dimension(2));
    //print_r($excel->sheetNames());
        $sheet=0;
          $xyz="DROP TABLE IF EXISTS demo.".$tablename.";";
          $r=mysqli_query($con,$xyz);
        $rowcol=$excel->dimension($sheet);
        $i=0;
        if($rowcol[0]!=1 &&$rowcol[1]!=1){
    foreach ($excel->rows($sheet) as $key => $row) {
      //print_r($row);
      $q="";
      foreach ($row as $key => $cell) {
        //print_r($cell);echo "<br>";
        if($i==0){
          $q.=$cell. " varchar(50),";
        }else{
          $q.="'".$cell. "',";
        }
      }
      if($i==0){
        $query="CREATE table ".$tablename." (".rtrim($q,",").",eligibility char(3));";
      }else{
        $query="INSERT INTO ".$tablename." values (".rtrim($q,",").",'E');";
      }
      //echo $query;
      $run=mysqli_query($con,$query);
      
      $i++;
    }
  }
    
    if($run)
      {
         ?>
         <script>alert('File uploaded successfully!!');</script>
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
    
  }
}

?>
  
</body>
</html>