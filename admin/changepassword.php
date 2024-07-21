<?php
include("database.php");
include("main.php");


$error=$messpri="";
if(isset($_POST['submit'])){
      $pass=$_POST['password'];

      if(empty($pass)){
            $error="Please enter the new password";
      }

      else if(strlen($pass)<6){
            $error="Password must be more than 6 char";

      }

    $password=md5($pass);
  
      if($error==""){
            $updatequery="UPDATE `admin_details` SET `password`='{$password}' WHERE email='aavashh@admin.com'";
            $result=mysqli_query($conn,$updatequery);


       if($result){
             $messpri="Password Successfully Update";
            
             
      }
}

   
       
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/changepassword.css" rel="stylesheet">
</head>
<body>
      <form action="changepassword.php" method="POST">
      <img src="images/logo.png">
       <div class="primessage"><?php echo $messpri?></div>
 
      <h2>Change Password</h2>
   <input type="password" name="password" placeholder="New Password">
   <div class="errormessage"><?php echo $error?></div>
   
   <br>
 

      <button class="btn55" name="submit">Change Password</button>




      </form>
</body>
</html>