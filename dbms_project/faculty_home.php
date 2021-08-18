<!DOCTYPE html>
<html>
<head>
	<title>Faculty details</title>
	
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
      margin-top: 120px;
      border: 1px solid white;
      
      margin-left: 400px;
    
      width: 550px;
      
      background-color: white;
      box-shadow: 3px 3px 3px 3px #ebebe0;
      box-sizing: content-box;
  
          
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
       button:hover{
       background-color:#009999;
      color: black;
      border-color:#009999;
    }
    hr{
      margin:5px;
    }
  </style>
</head>
<body>
  <br>
	<a href="firstpage.php" class="w3-button w3-black " style="margin-left: 10px;">Logout</a>

	<div class="box">
		<h3 style="padding: 10px;height: 40px ;color: white;text-align: center;margin: 0px;" class="w3-teal ">STUDENT DETAILS</h3>
	<hr>
		
      <a href="facultyhome.php"><button class="w3-teal ">Upload file</button></a>
      <a href="facultydata.php"><button class="w3-teal ">Show list</button></a>
     
</div>
	
</body>
</html>