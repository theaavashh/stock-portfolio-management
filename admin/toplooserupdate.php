<?php
include("main.php");
include("database.php");

 $sno=$_GET['id'];
 $sql="Select * from top_looser where id={$sno}";
 $result=mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){



?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Top Gainer</title>
      <link href="css/toplisted.css" rel="stylesheet">
      <link href="css/topgaineradd.css" rel="stylesheet">
      <link href="css/topupdate.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/toplisted.js"></script>
      <script src="js/topgainer.js"></script>
</head>
<body>
<div id="main-head">
       

        <div id="headers">Update Top Looser</div>
    


        <form onsubmit="return validation()" action="toplooserupdating.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
       <div id="label1">
             <label>Symbol</label><br>
             <input type="text" id="symbol" name="symbol" value="<?php echo $row['symbol']?>">
             <span id="symbolerror"></span>
       </div>
       <div id="label2">
             <label>Last Transaction Price</label><br>
             <input type="text" id="ltp" name="ltp" value="<?php echo $row['ltp'];?>">
             <span id="ltperror"></span>
       </div>
       <div id="label3">
             <label>Share Traded</label><br>
             <input type="text" id="change" name="change" value="<?php echo $row['change'];?>">
             <span id="changeerror"></span>
       </div>
      

             <button name="submit" id="btn11">Update Here</button>
       </div>
      



        </form>





      </div>
      <?php
    }
}
    ?>

</body>
</html>