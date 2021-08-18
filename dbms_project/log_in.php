<!DOCTYPE html>
<html>
<head>
	<title>Faculty login</title>
	<style type="text/css">
    *{
      font-family: cursive;

    }
    html {
   min-height: 100%;
   background-image: url('https://www.wailana.com/sites/default/files/images/bgs/af_bg_0.jpg');
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center center;
}

form{
	    font-family: cursive;
		margin-left: 450px;
		
		padding:20px 20px 20px 20px;
       
        background: rgba(0,0,0,0.5); 
        color: white;
        margin-top: 100px;
       border: 1px solid white;
       

     
      width: 450px;
      position: absolute;
      font-size: 18px;
		    
			
	}
  ::placeholder {
  color:darkgrey;
}
input[type=email],input[type=password]{
     		width: 75%;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}


.form{
	
	top: 40px;
	position: absolute;
	z-index: -1;

	
  

}
button{
 background: #1c8adb;
  color: #fff;
 border:1px solid #1c8adb;
   border-radius: 20px;
  
  padding: 10px 30px;
  cursor: pointer;
 
  font-size: 18px;
  margin-left: 160px;
    
}





	</style>

</head>
<body>

  <div class="form">

    
  <form method="POST">
    <h3 align="center">LOGIN</h3>
      <hr>
  		<label> Email: </label><br>
  		<input type="email" name="mailid" placeholder=" enter your registered mail id" autocomplete="off" required><br><br>
      <label> Password: </label><br>
      <input type="password" name="password" placeholder="enter your password" autocomplete="off" required><br><br>

      <a href="facultypassword.php">Forgot Password!</a><br><br>


  		
      <button name="submit" class="btn" type="submit">Login</button>
  	</form>
</div>
    <?php 
    if(isset($_POST['submit'])){
      include 'config.php';
     $email=$_POST['mailid'];
    $password=$_POST['password'];

    $sql="select * from registration where email='$email' AND password='$password'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));

    if(mysqli_num_rows($result)==1){
      header('Location: faculty_home.php');
      exit();

    }
    else{
      echo"you have enterd incorrect password";
      exit();
      

    }
    }

     ?>
  

</body>
</html>