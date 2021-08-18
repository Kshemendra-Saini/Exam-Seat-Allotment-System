<!DOCTYPE html>
<html>
<head>
	<title>Faculty signup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
    *{
      font-family: cursive;

    }
    html {
   min-height: 100%;
   background-image: url('https://www.wailana.com/sites/default/files/images/bgs/af_bg_0.jpg');

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
input[type=text],input[type=password],input[type=email]{
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
    <h3 align="center">Sign-up</h3>
      <hr>
  		<label> Username: </label><br>
  		<input type="text" name="username" id="uname" placeholder=" enter the username" autocomplete="off" required><br><br>
      <label> Email id: </label><br>
      <input type="email" name="mailid" id="mailid" placeholder=" enter your mail id" onclick="message()" required><br><br>
      <label id="lbl" style="color: yellow;"></label>
      <br>
      <br>

  		
      <button name="submit" class="btn" type="submit">Click me</button>
      <p align="center">Have account? <a href="log_in.php">Login here</a></p>
  	</form>
</div>
    <?php 


    include 'config.php';



    if(isset($_POST['submit'])){


      $username=mysqli_real_escape_string($con,$_POST['username']);
      $email=mysqli_real_escape_string($con,$_POST['mailid']);
      
       $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, 8);

     
      $sql="select * from faculty where Email ='".$email."'";
      $result=mysqli_query($con,$sql) or die(mysqli_error($con));

      if(mysqli_num_rows($result)>0){


          $chk="select * from registration where email='$email'";
          $res=mysqli_query($con,$chk) or die(mysqli_error($con));

           if(mysqli_num_rows($res)==0){
          

          $insert="insert into registration(username,email,password) values('$username','$email','$password')";
          $iqry=mysqli_query($con,$insert);
          if($iqry){
            $subject="Password";
            $body="Hi $username, your Password is - $password";
            $headers="From:Anonymous Sender";
            if(mail($email,$subject,$body,$headers)){

              
              header('location:log_in.php');
            }

            else {
              echo "Email sending failed";
            }
          }


            }
            else{

              echo "Mail id is already registered. Login to continue!";
            }
        }
        else{
          echo "Faculty not registered!! Contact Admin";
        }



      }

?>

<script type="text/javascript">
  function message() {
    // body...
  document.getElementById('lbl').innerHTML="Password will be sent to the entered mail id";

  }
</script>
</body>
</html>