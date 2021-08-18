<?php

 include 'config.php';
 
       
      $query = mysqli_query($con,"SELECT email,password from adminlogin") or die("Error: ". mysqli_error(). " with query ");
      //echo mysqli_num_rows($query) ;

if(mysqli_num_rows($query) > 0 ){
 while ($row = mysqli_fetch_array ($query)) {
  $email=$row['email'];
  $password=$row['password'];
   $subject="Resending Password";
            $body="Hello Admin, Your Password is -  $password";
            $headers="From:Anonymous Sender";
            if(mail($email,$subject,$body,$headers)){
              header('location:adminlogin.php');


            }
}

     

 }
 



?>