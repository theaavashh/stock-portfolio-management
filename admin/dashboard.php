<?php
include("main.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <link href="css/dashboard.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
</head>

<body>
      <div id="dashboard">
      <h1>Dashboard</h1>
            

                  <div id="dash1">
                        <i id="flaticon1" class="fas fa-user-alt"></i>
                        <?php
                        include("database.php");

                        $sql = "Select * from registration";
                        $result = mysqli_query($conn, $sql);

                        $a = mysqli_num_rows($result);
                        echo "<div id='user_num'>"  . $a . "</div>";
                        ?>


                        <h2>Users</h2>
                        


                  </div>
                  <div id="dash2">
                        <i id="flaticon2" class="fas fa-shapes"></i>
                        <?php
                        $sql = "Select * from upcoming_issue";
                        $result = mysqli_query($conn, $sql);

                        $a = mysqli_num_rows($result);
                        echo "<div id='user_num'>"  . $a . "</div>";
                        ?>

                        <h2 id="textform">Upcoming <br> <span>Issue<span></h2>
                        

                  </div>

      </div>

</body>

</html>