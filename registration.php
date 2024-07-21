<?php
include("database.php");




$username = $firstname = $lastname = $email = $password = $cpassword = "";
$usernameerror = $firstnameeerror = $lastnameerror = $emailerror = $passworderror = $cpassworderror = $checkpassworderror =$captchaerror= "";

if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $firstname = strtoupper($_POST['first_name']);
      $lastname =strtoupper($_POST['last_name']);
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      if (empty($username)) {
            $usernameerror = "Username is required";
      } else if (!preg_match("/^[a-zA-z0-9_]*$/", $username)) {
            $usernameerror = "Only letter and underscore allowed";
      } else if (strlen($username) < 5) {
            $usernameerror = "Username must be more than 5 character";
      } else {
            $usernameerror = "";
      }

      if (empty($firstname)) {
            $firstnameeerror = "First Name is required";
      }
      // } else if (!preg_match("/^[A-Z]*$/", $firstname)) {
      //       $firstnameeerror = "Only capital letter allowed";
      // } 
      else {
      
            $firstnameeerror = "";
      }
      if (empty($lastname)) {
            $lastnameerror = "Last Name is required";
      }
      //  else if (!preg_match("/^[A-Z]*$/", $lastname)) {
      //       $lastnameerror = "Only capital letter allowed";
      // }
       else {
            $lastnameerror = "";
      }

      if (empty($email)) {
            $emailerror = "Email is empty";
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "Email is not a valid";
      }

      if (empty($password)) {
            $passworderror = "Password is required";
      }
      else if(!preg_match("/[a-zA-Z0-9_]+$/",$password)){
            $passworderror="Must be alphanumeric and underscore";

      }
      else if(strlen($password)<7){
            $passworderror="Weak password..Must be greater than 7 character";
      }

      if (empty($cpassword)) {
            $cpassworderror = "Confirm Password is required";
      } else if ($password !== $cpassword) {
            $checkpassworderror = "Password and Confirm Password doesnot match!";
      } else {
            $cpassworderror = "";
      }

      $pass = md5($password);
      $cpass = md5($cpassword);

      if(isset($_POST['g-recaptcha-response'])) {
            $secretkey = "6LeiGzEbAAAAAMtIOHmoMkPkmOjDs5R3m3iQ7Vxj";
            $ip = $_SERVER['REMOTE_ADDR'];
            $response = $_POST['g-recaptcha-response'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remote=$ip";
            $jsoncontent = file_get_contents($url);
            $data = json_decode($jsoncontent);

            if ($data->success == true) {


              

                  $usernamequery = "Select * from registration where username='$username'";
                  $query = mysqli_query($conn, $usernamequery);
                  $emailnamequery = "Select * from registration where email='$email'";
                  $queryemail = mysqli_query($conn, $emailnamequery);
                  $usercount = mysqli_num_rows($query);
                  $emailcount = mysqli_num_rows($queryemail);
                  if ($usercount > 0) {
                        $checkpassworderror = "Sorry! Username already exit";
                  } else if ($emailcount > 0) {
                        $checkpassworderror = "Sorry! Email already exit";
                  } else {
                        if ($usernameerror == "" && $firstnameeerror == "" && $lastnameerror == "" && $emailerror == "" && $passworderror == "" && $cpassworderror == "") {
                              $sql = "INSERT INTO `registration`( `username`, `first_name`, `last_name`, `email`, `password`, `cpassword`) VALUES ('$username','$firstname','$lastname','$email','$pass','$cpass')";
                              $result = mysqli_query($conn, $sql);

                              if ($result) {
                                    $checkpassworderror = "Account created successfully";
                              } else {
                                    echo mysqli_error($conn);
                              }
                        }
                  }
            }
            else {
                  $captchaerror="Please field the captcha";
                 
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
      <link href="css/registration.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merienda&family=Pacifico&family=Satisfy&display=swap" rel="stylesheet">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>

<body>


      <div id="form-partone">
            <header>Stock Portfolio</header>
            <text>A few click away from <span> Creating your portfolio</span></text>
            <embed src="icon/undraw_Portfolio_update_re_jqnp.png">


            <div id="form-parttwo">
                  <form action="registration.php" method="POST">
                        <h1>Register</h1>
                        <h3>Manage all your stock efficiently</h3><br>
                        <span id="warning"><?php echo $checkpassworderror ?></span>
                        <div id="input-one">
                              <label>Username</label><br>
                              <input type="text" name="username" id="username" autocomplete="off">
                              <span class="warning" id="error_username"><?php echo $usernameerror ?></span>
                              <span id="error-users"></span>
                        </div>
                        <div id="input-two">
                              <label>First Name</label><br>
                              <input type="text" name="first_name" id="firstname" autocomplete="off">
                              <span class="warning" id="error_firstname"><?php echo $firstnameeerror ?></span>

                        </div>
                        <div id="input-three">
                              <label>Last Name</label><br>
                              <input type="text" name="last_name" id="lastname" autocomplete="off">
                              <span class="warning" id="error_lastname"><?php echo $lastnameerror ?></span>
                        </div>
                        <div id="input-four">
                              <label>Email</label><br>
                              <input type="text" name="email" id="email" autocomplete="off">
                              <span class="warning" id="error_email"><?php echo $emailerror ?></span>
                              <span id="error-emails"></span>
                        </div>
                        <div id="input-five">
                              <label>Password</label><br>
                              <input type="password" name="password" id="password" autocomplete="off">
                              <span class="warning" id="error_password"><?php echo $passworderror ?></span>
                        </div>
                        <div id="input-six">
                              <label>Confirm Password</label><br>
                              <input type="password" name="cpassword" id="cpassword" autocomplete="off">
                              <span class="warning" id="error_cpassword"><?php echo $cpassworderror ?></span>
                        </div>
                        <div id="captcha" class="g-recaptcha" data-sitekey="6LeiGzEbAAAAAKqlyGq0ogbMNlUQaC7C24ekSLLS"></div><br>
                        <span class="warning_captcha"><?php echo $captchaerror ?></span><br>

                        <button class="btn" name="submit">Sign Up</button>




                        <a href="logins.php" id="login">Already Created? Sign In</a>




                  </form>

            </div>



      </div>

<script>

$(function(){

   var username_error=false;
   var email_error=false;
   var firstname_error=false;
   var lastname_error=false;
   var password_error=false;
   var cpassword_error=false;


   $("#username").keyup(function(){
        checkusername();
   });

   $("#username").keyup(function(){
        checkusernameexist();
   });



   $('#email').keyup(function(){
        checkmail();
   });

   $('#email').keyup(function(){
        checkmails();
   });

   $('#firstname').keyup(function(){
         checkfirstname();
   });

   $('#lastname').keyup(function(){
          checklastname();
   });

   $('#password').keyup(function(){
         checkpassword();
   })

   $('#cpassword').keyup(function(){
         checkcpassword();
   })



   function checkusername(){
           let checkusernamepattern=/^[A-Za-z_]*$/;
           let fusername=$("#username").val();
           let length_check=$("#username").val().length;

           if(!checkusernamepattern.test(fusername)){
            $("#error_username").html("Should be alphabet & semicolon");
            $("#error_username").show();
            username_error=true;
           }

           else if(length_check<5 || length_check>10){
            $("#error_username").html("Should be between 5-10 character");
            $("#error_username").show();
            username_error=true;

           }
           else{
            $("#error_username").hide();
           }
      }

      function checkusernameexist(){
            let fusernamecheck=$("#username").val();
            
            $.ajax({
                type:"POST",
                url:"checkuserexist.php",
                data:{
                      "check_submit":1,
                      "email_id":fusernamecheck,
                },
                success:function(response){
                      $("#error-users").text(response);
                }
          });


      }

      function checkmail(){
          var mailpattern=new RegExp(/^[+a-zA_Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/i);
          var mailinput=$("#email").val();

          if(mailpattern.test(mailinput)){
                $("#error_email").hide();
          }
          
          else{
                $("#error_email").html("Invalid email address");
                $("#error_email").show();
                email_error=true;
          }
      }


      function checkmails(){
            var mailinputs=$("#email").val();
            $.ajax({
                type:"POST",
                url:"checkemailexist.php",
                data:{
                      "check_submit":1,
                      "email_id":mailinputs,
                },
                success:function(response){
                      $("#error-emails").text(response);
                }
          });


      }
      

         
    

      

      function checkfirstname(){
            let firstnamepattern=/^[A-Za-z]*$/
            let firstnamefield=$("#firstname").val();
            let lengthfname=$("#firstname").val().length;

            if(!firstnamepattern.test(firstnamefield)){
                  $("#error_firstname").html("Should be alphabet");
                  $("#error_firstname").show();
                  firstname_error=true;
            }
            else if(lengthfname<3){
                  $("#error_firstname").html("Should be more than 2 character");
                  $("#error_firstname").show();
                  firstname_error=true;

            }
            else{
                  $("#error_firstname").hide();
            }
      }


      function checklastname(){
            let lastnamepattern=/^[A-Za-z]*$/
            let lastnamefield=$("#lastname").val();
            let lengthlname=$("#lastname").val().length;

            if(!lastnamepattern.test(lastnamefield)){
                  $("#error_lastname").html("Should be alphabet");
                  $("#error_lastname").show();
                  lastname_error=true;
            }
            else if(lengthlname<3){
                  $("#error_lastname").html("Should be more than 2 character");
                  $("#error_lastname").show();
                  lastname_error=true;

            }
            else{
                  $("#error_lastname").hide();
            }
      }

      function checkpassword(){
           let lengthpassword=$("#password").val().length;

           if(lengthpassword<=6){
                 $("#error_password").html("Must be more than 6 character");
                 $("#error_password").show();
                 password_error=true;
           }
           else{
            $("#error_password").hide();

           }



      }

      function checkcpassword(){
            let cpasswordcheck=$("#cpassword").val();
            let passwordcheck=$("#password").val();

            if(cpasswordcheck!==passwordcheck){
                  $("#error_cpassword").html("Password and Confirm Password not match");
                  $("#error_cpassword").show();
                  cpassword_error=true;
            }
            else{
                  $("#error_cpassword").hide();
            }
      }





});





</script>
</body>

</html>

