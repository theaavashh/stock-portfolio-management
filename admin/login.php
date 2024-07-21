
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  
     
</head>
<body>







<?php

session_start();
include('database.php');

$mail=$pass="";
$mailerror=$passerror="";


if(isset($_POST['login'])){
    $mail=$_POST['email'];
    $pass=$_POST['password'];

    if(empty($mail)){
        $mailerror="Email field is empty";
    }
    else if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mailerror="Email is not a valid";
    }
   
    if(empty($pass)){
        $passerror="Password field is empty";
    }

    $password=md5($pass);
   
    if($mailerror=="" && $passerror==""){

    $sql= "Select * from admin_details where email='$mail' and password='$password'";
    $result=mysqli_query($conn,$sql);

  

    

    
    if(mysqli_num_rows($result)==1){
        $_SESSION['mail']="Admin";
         header("location:dashboard.php");
    }
    else{
        echo "<div id='wrong_pass'>Email or Password Incorrect</div>";


    }
}
}



?>





    <form action="login.php"  method="POST" id="form-validate">
        <h1>Hey Admin</h1>
        <embed src="images/man.svg">
        <input type="text" id="mail" name="email" placeholder="Admin" autocomplete="off">
        <span id="mail_error"><?php echo $mailerror?></span>
        <embed id="lock" src="images/lock.png">
        <input type="password" id="pass" name="password" placeholder="Password" autocomplete="off">
        <span id="pass_error"><?php echo $passerror?></span><br>
       

        <button class="btn_login" name="login">Let's Go Admin</button><br>




      

    </form>
    
<script>

$(function(){

    error_mail=false;
    error_password=false;

    // $("#mail_error").hide();
    // $("#pass_error").hide();


    $("#mail").keyup(function(){
        checkmail();
    });

    $("#pass").keyup(function(){
        checkpassword();
    })

    function checkmail(){
          var mailpattern=new RegExp(/^[+a-zA_Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/i);
          var mpattern=$("#mail").val();

          if(mailpattern.test(mpattern) && mpattern!==""){
              $("#mail_error").hide();

          }
         
          else{
            
              $("#mail_error").html("Invalid email address");
              $("#mail_error").show();
              error_mail=true;
          }

        }

        function checkpassword(){
            var passwordlen=$("#pass").val().length;
            if(passwordlen<6){
                $("#pass_error").html("Default password was greater than 6");
                $("#pass_error").show();
                error_password=true;
            }
            else{
                $("#pass_error").hide();
            }



        }


});
    

    

    




</script>

    
    
</body>
</html>