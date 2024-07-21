
<?php
include("database.php");
if(isset($_POST['check_submit'])){
      $emails=$_POST['email_id'];

      $emailname = "Select * from registration where email='$emails'";
      $querymail = mysqli_query($conn, $emailname);
      if(mysqli_num_rows($querymail)>0){
            echo "Email already existed";

      }
      
};
?>