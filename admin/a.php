<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="a.php " method="post">
       <label>Username:</label><input type="text" name="txtuname"><br><br>
       <label>Password:</label><input type="password" name="txtpass"><br><br>
      <input type="submit" value="submit">
    </form>
</body>
</html>


<?php
  $username=$_POST['txtuname'];
  $password=$_POST['txtpass'];

  session_start();
  $_SESSION["username"]=$username;
  $_SESSION["password"]=$password;


  echo "<br>";
 

echo "You saved session as:<br/>";
  if(isset($_SESSION['username'])){
      echo $_SESSION['username']."<br/>";
      echo $_SESSION['password'];
  }else{
      echo "your session is not set";
  }

?>


