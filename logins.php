<?php

session_start();
include("database.php");
$username = $passkey = "";
$usernameerror = $passworderror = "";
$warningmsg = $warningmessage = "";
$captcha_warn="";


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $passkey= $_POST['pass'];

    if (empty($username)) {
        $usernameerror = "Username must be fill out";
    }
    if (empty($passkey)) {
        $passworderror = "Password must be fill out";
    }

    if (isset($_POST['g-recaptcha-response'])){
        $secretkey = "6LeiGzEbAAAAAMtIOHmoMkPkmOjDs5R3m3iQ7Vxj";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remote=$ip";
        $jsoncontent = file_get_contents($url);
        $data = json_decode($jsoncontent);

        if ($data->success == true) {


            if ($usernameerror == "" && $passworderror == "") {
                $sql = "Select * from `registration` where username='$username' ";
                $query = mysqli_query($conn, $sql);





                $usercheck = mysqli_num_rows($query);
                if ($usercheck > 0) {
                    $userchk = mysqli_fetch_assoc($query);
                    $passfield=$userchk['password'];

                   

                  


                    $_SESSION['username'] = $userchk['username'];
                    $_SESSION['firstname'] = $userchk['first_name'];
                    $_SESSION['lastname'] = $userchk['last_name'];
                
                    $decode=md5($passkey);
                    
                    if ($decode===$passfield) 
                    {
                        header("location:dashboard.php");
                    } 
                    else {
                        $warningmsg = "Username/Password Incorrect";
                    }
                } 
                else {
                    $warningmessage = "Invalid username!Register if you don't have account ";
                }
            }
        }
        else{
            $captcha_warn="**Please field the captcha";
        }
    }
   
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    <link href="css/logins.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>
    <div id="second-layout">
        <header>Stock<span> Portfolio Management</span></header>
  
        <a href="registration.php" class="register-form">Don't Have account? <text>Create Account</text></a>
        <h2>Let's sign you in</h2>
        <h1>Welcome Back</h1>
        <h3>You've been missed</h3>
        <form action="logins.php" method="POST">
            <span class="warning"><?php echo $warningmsg ?></span>
            <span class="warnings"><?php echo $warningmessage ?></span>
            <br>
            <label>Username</label><br>
            <input type="text" name="username" id="username"><br>
            <span class="error" id="error_username"><?php echo $usernameerror ?></span><br>
            <label class="label1">Password</label><br>
            <input type="password" name="pass" class="input1" id="password"><br>
            <span class="error1" id="error_password"><?php echo $passworderror ?></span>
            <div id="captcha" class="g-recaptcha" data-sitekey="6LeiGzEbAAAAAKqlyGq0ogbMNlUQaC7C24ekSLLS"></div><br>
            <span class="error2"><?php echo $captcha_warn;  ?></span><br>
            <button name="login">Log In</button><br>
            <a href="index.php" id="redirect-website" class="register-form">Mistakely Here?Return to website</a>
        </form>




    </div>


<script>


$(function(){
    var usernameError=false;
    var passwordError=false;


    $("#username").keyup(function(){
       
        checkusername();
    });

    $("#password").keyup(function(){
       
       checkpassword();
   });
   


    function checkusername(){
         let checkuser=$("#username").val().length;

         if(checkuser<1){
             $("#error_username").html("Should be filled out");
             $("#error_username").show();
             usernameError=true;
             
         }
         else{
            $("#error_username").hide();
         }
          
    }

    function checkpassword(){
         let checkpass=$("#password").val().length;

         if(checkpass<1){
             $("#error_password").html("Should be filled out");
             $("#error_password").show();
             passwordError=true;
             
         }
         else{
            $("#error_password").hide();
         }
          
    }

});






</script>

</body>

</html>