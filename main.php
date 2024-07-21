<?php
session_start();

if(!isset($_SESSION['username'])){
      header("location:logins.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <link href="css/main.css" rel="stylesheet">
      <link href="font/css/all.min.css" rel="stylesheet">

</head>
<body>
      <header>
            <div id="head1">
                  <text>DInfo-Stock</text>
                   <embed src="icon/man-user.png" id='logo'><article><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></span></article>
                 
                  <a id="profile" href="logout.php"><button class="btn1"><i class="fas fa-sign-out-alt" id="logout"></i>LOG OUT</button></a>
            </div>
          

      </header>
      <aside>
           <a href="aboutme.php"> <embed src="icon/boy.png">
                  <figcaption>Hey <?php echo $_SESSION['username']; ?></figcaption></a>

                  <div id="naviagtion">
                        <ul>
                           
                              <a href="dashboard.php"><i class="fas fa-history" ></i> <li id="dash">Dashboard</li></a>
                              <a href="portfolio.php"><i class="fas fa-binoculars" id='binocular'></i><li id="port">Portfolio</li></a>
                              <a href="upcomingissue.php"><i class="fab fa-google-wallet" id='wallet'></i><li id='upcoming'>Upcoming Stock</li></a>
                              <a href="toplisted.php"><i class="fas fa-chess-rook"></i> <li id='top'>Top Listed</li></a>
                              <a href="marketsummary.php"><i class="fas fa-hands-helping"></i> <li id='helpdesk'>Market Summary</li></a>
                              <a href="aboutme.php"><i class="far fa-user"></i><li id='aboutme'>About Me</li></a>
                             
                              
                              <a href="changepassword.php"><button class="btn"><i class="fas fa-key" id='password'></i>Change Password</button></a>
                              
                              
     
              
                             
                        </ul>
                  </div>


      </aside>
</body>
</html>