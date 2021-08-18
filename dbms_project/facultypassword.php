<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style type="text/css">
    *{
      font-family: cursive;

    }
    html {
   min-height: 100%;
   background-image: url('https://yycgirlgang.com/wp-content/uploads/2016/05/sploosh2.png');
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center center;
}

form{
      font-family: cursive;
    margin-left: 450px;
    
    padding:20px 20px 20px 20px;
       
        background: rgba(0,0,0,0.6); 
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
input[type=email]{
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
  margin-left: 120px;
    
}





  </style>

</head>
<body>

  <div class="form">

  <form method="POST">
    <h3 align="center">Forgot Password??</h3>
      <hr>
     
       <label> E-mail:</label><br>

          <input type="email" name="email" placeholder="Please enter your e-mail id" required>
          <br><br>
          <button class="btn" name="submit" type="submit" >Send my Password</button><br><br>
           <!--onclick="alert('Your Password has been sent to the mentioned e-mail id')"-->
      
    </form>

</div>
	
</body>
</html>
<?php

      include 'config.php';
	   if(isset($_POST['submit']))
	   {

      $email=$_POST['email'];
      
       $sql="select * from faculty where Email ='$email'";
      $result=mysqli_query($con,$sql) or die(mysqli_error($con));

      if(mysqli_num_rows($result)>0){
      $query = mysqli_query($con,"SELECT password from registration where email='$email'") or die("Error: ". mysqli_error(). " with query ");
      //echo mysqli_num_rows($query) ;

if(mysqli_num_rows($query) > 0 ){
 while ($row = mysqli_fetch_array ($query)) {
  $password=$row['password'];
   $subject="Resending Password";
            $body="Your Password is -  $password";
            $headers="From:Anonymous Sender";
            if(mail($email,$subject,$body,$headers)){

              ?>
              <script type="text/javascript">
                alert('Password has been sent to the entered mail id');
              </script>


              <?php
              header('location:log_in.php');


            }
}

     

 }
 else{
  echo "Mail id not registered!! Sign up to continue";
 }
}
}

?>