<?php
include("database.php");
include("main.php");

$username=$_SESSION['username'];
$sql="Select * from registration where username='{$username}'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);




?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/aboutme.css" rel="stylesheet">
</head>
<body>
      <div id="mains">
      <text id="text-about">My Profile</text>
      <text id="text-subabout">View Your Profile</text>
      <div id="second-main">
      <button id="button_ho">Own Profile</button>
      <embed id="display_picture" src="icon/boy.png">
      <h3>Display Picture</h3>

      <label id="lbl-one">Username:&nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;     @ <?php echo $row['username']?></label>
   
      
      <br>
      <label id="lbl-two">First Name:&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;     <?php echo $row['first_name']?></label><br>
      <label id="lbl-three">Last Name:&nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;     <?php echo $row['last_name']?></label><br>
      <label id="lbl-four">Mailing Address:&nbsp;  &nbsp;       <?php echo $row['email']?></label>
      
      
      
      </div>




      </div>
      
</body>
</html>