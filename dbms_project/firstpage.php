<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
   
    html {
   min-height: 100%;
   background-image: url('https://www.friendsofch.org/wp-content/uploads/2015/04/Blue-WaterColor-Background.gif');

   background-repeat: no-repeat;
   background-position: center center;
}
.container {
  margin-top: 100px;
  position: relative;
  width: 50%;
  max-width: 300px;
}

.image {
  display:ease;
  width: 80%;
  height: auto;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  
  background: rgba(0, 0, 0, .6); 
  color: #1111;
  width: 75%;
  padding: 20px 0px;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;

  text-align: center;
}

.container:hover .overlay {
  opacity: 1;
}
td{
  width: 300px;
  height: 500px;
}
table{
  margin-left: 300px;
  width: 80%;
}

 </style>
</head>
<body>
    <table>
  <tr><td> <div class="container">
 <a href="adminlogin.php"> <img src="https://i.ya-webdesign.com/images/suit-icon-png-4.png" class="image" style="opacity: .9 ;width: 200px;">
  <div class="overlay"> Admin?</div></a>
</div></td><td>
<div class="container" >
 <a href="registration.php"><img src="https://i.ya-webdesign.com/images/suit-icon-png-4.png" class="image" style="opacity: .9; width: 200px;">
  <div class="overlay"> Faculty?</div></a>
</div></td>
</table>


</body>
</html>
