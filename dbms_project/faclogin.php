<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body>
  
    <div class="wrapper">
        <div class="container">
          
          <div class="signup">Sign Up</div>
          <div class="login">Log In</div>
          
           <div class="signup-form">
            <form action="" onsubmit="return validation()" method="post">
               <p>Email address</p>
              <input type="text" placeholder="Your Email Address" class="input"id="email" name="email" autocomplete="off"><br/>
              <span id="emailerror"> </span>
              <p>Username</p>
              <input type="text" placeholder="Choose a Username" class="input" name="user" id="user"><br/>
              <span id="usererror"> </span>
              <p>Password</p>
              <input type="password" placeholder="Choose a Password" class="input" name="pass" id="password"><br />
              <span id="passerror"> </span>
              <p> Confirm Password</p>
              <input type="password" placeholder="confirm your Password" class="input"id="cpassword"><br />
              <span id="cpasserror"> </span>
              <input type="submit" name="submit" value="Create an account" onclick="myFunction()">
            </form>
           </div>
          
          <div class="login-form">
            <form action="#" onsubmit="return validations()" method="post">
            <p>Username</p>
              <input type="text" placeholder="Email or Username" class="input" id="users" name="loguser"><br/>
              <span id="usererrors"> </span>
              <p>Password</p>
              <input type="password" placeholder="Password" class="input" id="passwords" name="logpass"><br/>
              <span id="passerrors"> </span></br>
              <input type="submit" name="login" value="Login"></br>
            </form>
              <span><a href="#">I forgot my username or password.</a></span>
             
           </div>
          
        </div>
      </div>
            <?php
include 'config.php';

if(isset($_POST['submit'])){
 $username = $_POST['user'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $reg="insert into logintable(user,pass,email) values('$username','$password','$email')";
      mysqli_query($con,$reg);
      

}


if(isset($_POST['login'])){
 $loguname = $_POST['loguser'];
    $logpassword = $_POST['logpass'];
$sql="select * from logintable where user ='".$loguname."' and pass='".$logpassword."'";
echo $sql;
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

      <script src="login.js"></script> 
      <script type="text/javascript">
      /*function myFunction() {
  alert("Hello! I am an alert box!");
}*/
      function validation(){
        var email = document.getElementById('email').value;
        var user = document.getElementById('user').value;
        var password = document.getElementById('password').value;
        var cpassword = document.getElementById('cpassword').value;

        var usercheck = /^[0-9A-Za-z!@#$%^&*. ]{3,30}$/;
        var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
        var emailcheck = /^[0-9A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;

        if(email == ""){
				document.getElementById('emailerror').innerHTML =" ** Please fill the email id field";
				return false;
			}
       if(emailcheck.test(email)){
        document.getElementById('emailerror').innerHTML =" ";
       }else{
        document.getElementById('emailerror').innerHTML =" ** invalid email";
          return false;
       }

       if(user == ""){
				document.getElementById('usererror').innerHTML =" ** Please fill the username field";
				return false;
			}
       if(usercheck.test(user)){
         document.getElementById('usererror').innerHTML =" ";
       }else{
        document.getElementById('usererror').innerHTML ="** username should be atleast 3 letters ";
        return false;
       }
      
       if(password == ""){
				document.getElementById('passerror').innerHTML =" ** Please fill the password field";
				return false;
			}
      if(passwordcheck.test(password)){
         document.getElementById('passerror').innerHTML =" ";
       }else{
        document.getElementById('passerror').innerHTML ="** password should be atleast 8 letters and must contain atleast 1 special character and 1 number ";
        return false;
       }

       if(cpassword.match(password)){
        document.getElementById('cpasserror').innerHTML =" ";
       }else{
        document.getElementById('cpasserror').innerHTML ="** password does not match ";
        return false;
       }
       if((usercheck.test(user))&&(passwordcheck.test(password))){
        alert('Your form has been submitted Thank you!');
        return false;
      }
      }
       function validations(){
    
        var users = document.getElementById('users').value;
        var passwords = document.getElementById('passwords').value;

        var usercheck = /^[0-9A-Za-z!@#$%^&*. ]{3,30}$/;
        var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
     
        if(users == ""){
				document.getElementById('usererrors').innerHTML =" ** Please fill the username field";
				return false;
			}
       if(usercheck.test(users)){
         document.getElementById('usererrors').innerHTML =" ";
       }else{
        document.getElementById('usererrors').innerHTML ="** username should be atleast 3 letters ";
        return false;
       }
      
       if(passwords == ""){
				document.getElementById('passerrors').innerHTML =" ** Please fill the password field";
				return false;
			}
      if(passwordcheck.test(passwords)){
         document.getElementById('passerrors').innerHTML =" ";
       }else{
        document.getElementById('passerrors').innerHTML ="** password should be atleast 8 letters and must contain atleast 1 special character and 1 number ";
        return false;
       }
      
       }
      </script>
</body>

</html>