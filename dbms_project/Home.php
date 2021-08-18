<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
<div style="width:100%;background-color:black;height:20px;">
</div>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>NMIT</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="faculty_details.php" class="w3-bar-item w3-button w3-padding w3-hover-black"><i class="fa fa-users fa-fw"></i>  Faculty</a>
    <a href="Classroom.php" class="w3-bar-item w3-button w3-padding w3-hover-black"><i class="fa fa-table fa-fw"></i>  Classroom</a>
    <a href="Timetable.php" class="w3-bar-item w3-button w3-padding w3-hover-black"><i class="fa fa-calendar-o fa-fw"></i>  Timetable</a>
    <a href="alloc.php" class="w3-bar-item w3-button w3-padding w3-hover-black"><i class="fa fa-check fa-fw"></i>  Room Allocation</a>
    <a href="firstpage.php" class="w3-bar-item w3-button w3-padding w3-hover-black"><i class="fa fa-sign-out fa-fw"></i>  Logout</a>
    <br><br>
  </div>
</nav>
  
<div class="w3-main" style="margin-left:300px;margin-top:100px;">


  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
  </header>
  
  <div class="w3-row-padding w3-margin-bottom">
    <a href="faculty_details.php">
    <div class="w3-quarter" style="width: 22%;" >
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        
        <div class="w3-clear"></div>
        <h4>Faculty</h4>
      </div>
    </div>
  </a>
  
  <a href="Classroom.php">
    <div class="w3-quarter" style="margin-left: 5px;width: 22%;">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-table w3-xxxlarge"></i></div>
        
        <div class="w3-clear"></div>
        <h4>Classroom</h4>
      </div>
    </div>
  </a>
  <a href="Timetable.php">
    <div class="w3-quarter" style="margin-left: 5px;width: 22%;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-calendar-o w3-xxxlarge"></i></div>
  
        <div class="w3-clear"></div>
        <h4>Timetable</h4>
      </div>
    </div>
  </a>
  <a href="alloc.php">
    <div class="w3-quarter" style="margin-left: 5px;width: 22%;">
      
        <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-check w3-xxxlarge"></i></div>
        
        <div class="w3-clear"></div>
        <h4>Allocation</h4>
      </div>
    </div>
  </a>
  </div>
</div>
</div>
</body>
</html>
 