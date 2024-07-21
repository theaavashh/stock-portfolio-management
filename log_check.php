<?php

session_start();
include("database.php");
$username = $passkey = "";
$usernameerror = $passworderror = "";
$warningmsg = $warningmessage = "";



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $passkey= $_POST['pass'];

    $sql = "Select * from `registration` where username='$username' ";
    $query = mysqli_query($conn, $sql);





    $usercheck = mysqli_num_rows($query);
    if ($usercheck > 0) {
        $userchk = mysqli_fetch_assoc($query);
        $d=$userchk['password'];

       
    
        $decode=password_verify($passkey,$d);
        
        if ($decode) 
        {
            header("location:http://localhost:8080/DInfoStock/project/dashboard.php");
        } 
        else {
            $warningmsg = "Username/Password Incorrect";
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
    <link href="logins.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div id="second-layout">
        <header>Stock<span> Portfolio Management</span></header>
  
        <a href="" class="register-form">Don't Have account? <text>Create Account</text></a>
        <h2>Let's sign you in</h2>
        <h1>Welcome Back</h1>
        <h3>You've been missed</h3>
        <form action="log_check.php" method="POST">
            <span class="warning"><?php echo $warningmsg ?></span>
            <span class="warnings"><?php echo $warningmessage ?></span>
            <br>
            <label>Username</label><br>
            <input type="text" name="username"><br>
            <span class="error"><?php echo $usernameerror ?></span><br>
            <label class="label1">Password</label><br>
            <input type="password" name="pass" class="input1"><br>
            <span class="error1"><?php echo $passworderror ?></span>
    
    
            <button name="login">Log In</button><br>
            <a href="" id="redirect-website" class="register-form">Mistakely Here?Return to website</a>
        </form>




    </div>
</body>

</html>