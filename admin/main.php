<?php
session_start();

if(!isset($_SESSION['mail'])){
   header("location:login.php");
}  
?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="css/main.css">
      <link href="../font/css/all.min.css" rel="stylesheet">
 
</head>
<body>
      <div id="header">
            <div id="sub-head"> Stock Portfolio</div>
            <header>Welcome, <?php echo $_SESSION['mail'];?></header>
             <div id="sub-head2">
                   <a href="logout.php"><button>Log Out</button></a>
             </div>

      </div>
      <div id="sidebar">
            <aside>
                  <ul>
                        <li><a href="dashboard.php"><i class="fas fa-history"></i>Dashboard</a></li>
                        <li><a href="user.php"> <i class="fas fa-users" id="btn"></i>Users</a></li>
                        <li><a href="upcomingstock.php"><i class="fas fa-shapes"></i>Upcoming Issue</a></li>
                        <li><a href="toplisted.php"><i class="fab fa-autoprefixer"></i>Top Listed</a></li>
                        <li><a href="marketsummary.php"><i class="fas fa-search-dollar"></i>Market Summary</a></li>
                     
                    
                  </ul>
                 <a id="chgpassword" href="changepassword.php"> <button id="changepassword">Change Password</button></a>

            </aside>
      </div>

</body>
</html>

