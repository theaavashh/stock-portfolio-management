<?php

include("database.php");

if(isset($_POST['check_submit'])){
      $user=$_POST['email_id'];

      $usersql= "Select * from registration where username='$user'";
      $queryuser = mysqli_query($conn, $usersql);
      if(mysqli_num_rows($queryuser)>0){
            echo "Username already existed";

      }
      
};
?>