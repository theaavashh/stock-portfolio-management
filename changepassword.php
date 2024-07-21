<?php
include("database.php");
include("main.php");
$username=$_SESSION['username'];

$messagewarn=$conerror=$newerror=$errormessage="";

if(isset($_POST['submit'])){
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if(empty($password)){
        $newerror="Please field new password";
    }
    else if(strlen($password)<6){
        $newerror="Password must be greater than 6 char";

    }

    if(empty($cpassword)){
        $conerror="Please field confirm password";
    }
    else if($password!=$cpassword){
        $errormessage="Password and Confirm Password Doesnot Match";
    }

    $pass=md5($password);
    $cpass=md5($cpassword);

    if($newerror=="" && $conerror=="" && $errormessage==""){
          $updatequery="UPDATE `registration` SET `password`='{$pass}',`cpassword`='{$cpass}' WHERE username='{$username}'";
          $result=mysqli_query($conn,$updatequery);

          if($result){
               $messagewarn="Password Change Successfully";
          }

    
    else{
          $messagewarn="Password and Confirm Password Doesnot Match";
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
    <link href="css/change.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>
<body>
<form action="changepassword.php" method="POST">
<span><?php echo $messagewarn;?></span>
<h2>Change Password</h2>
      <div id="changeid">@ <?php echo $username; ?></div>
      <div id="errormessage"><?php echo $errormessage; ?></div>
     
      
      <!-- <label>New Password</label> -->
      <input type="password" name="password" id="pword" placeholder="New Password"><br>
     <div id="newerror"><?php echo $newerror; ?></div> 
      <!-- <label>Confirm Password</label> -->
      <input type="password" name="cpassword" id="cpword" placeholder="Confirm Password"><br>
      <div id="conerror"><?php echo $conerror; ?></div>
      <button class="btn55" name="submit">Change</button>
</form>
     




      </form>

<script>

$(function(){

    $("#pword").keyup(function(){
        checkpassword();
    });

    $("#cpword").keyup(function(){
     
        checkconfirmpassword();

    });

    function checkpassword(){
        let pword=$("#pword").val().length;
       

        if(pword<6){
            $("#newerror").html("Password must be greater than 6 char");
            $("#newerror").show();
        }
        else{
            $("#newerror").hide();
        }
    }

    function checkconfirmpassword(){
    
        let cword=$("#cpword").val();
        let checkword=$("#pword").val();

        if(checkword!=cword){
            $("#errormessage").html("Password and Confirm Password Doesnot Match");
            $("#errormessage").show();
        }
        else{
            $("#errormessage").hide();
        }
    }
});


</script>
    
</body>
</html>