<?php
include("database.php");
include("main.php");

$symbolerror=$ltperror=$changeerror="";
$symbol=$ltp=$changeerror="";

if(isset($_POST['submit'])){
      if(empty($_POST['symbol'])){
            $symbolerror="This field is empty";
      }
      else if(!preg_match('/[a-zA-Z]*$/',$symbol)){
            $symbolerror="This field must be alphabet only";

      }
      else{
            $symbol=$_POST['symbol']; 
      }

      if(empty($_POST['total_turnover'])){
            $ltperror="This field is empty";
      }
    
      else{
            $ltp=$_POST['total_turnover'];
      }

      if(empty($_POST['ltp'])){
            $changeerror="This field is empty";
      }
     
      else{
            $change=$_POST['ltp'];
      }

      if($symbolerror=="" && $ltperror=="" && $changeerror==""){

            $sqlPriority="Select * from top_turnover";
            $resultPriority=mysqli_query($conn,$sqlPriority);
           
             $checknum=mysqli_num_rows($resultPriority);
             if($checknum<5){

      $sql="INSERT INTO `top_turnover`(`symbol`, `total_turnover`, `ltp`) VALUES ('$symbol','$ltp','$change')";
     $result=mysqli_query($conn,$sql);

     if($result){
           ?>
           <script>
                 alert("Your data has been inserted");
            </script>
      <?php
                 
     }
}

else{
      ?>
      <script>
            alert("Sorry admin.You exceed the transaction limit");
      </script>
<?php
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
      <title>Top Gainer</title>
      <link href="css/toplisted.css" rel="stylesheet">
      <link href="css/topgaineradd.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/toplisted.js"></script>
      <!-- <script src="js/topgainer.js"></script> -->
</head>
<body>
<div id="main-head">
       <div class="part-two">
            <a class="subparttwo" href="topgainer.php">  Top Gainer</a>
            </div>
            <div class="part-two">
            <a class="subparttwo" href="toplooser.php">  Top Losser</a>
            </div>
            <div class="part-two">
            <a class="subparttwo" href="topturnover.php">Top Turnover</a>
            </div>
           
        <div id="headers">Add Top Turnover</div>
        <a id="nextpage" href="topturnover.php">Click  Here To View Details</a>


        <form  action="topturnoveradd.php" method="POST" id="forms">
       <div id="label1">
             <label>Symbol</label><br>
             <input type="text" id="symbol" name="symbol">
             <span id="symbolerror"><?php echo $symbolerror?></span>
       </div>
       <div id="label2">
             <label>Total Turnover</label><br>
             <input type="text" id="ltp" name="total_turnover">
             <span id="ltperror"><?php echo $ltperror?></span>
       </div>
       <div id="label3">
             <label>LTP</label><br>
             <input type="text" id="change" name="ltp">
             <span id="changeerror"><?php echo $changeerror?></span>
       </div>
      

             <button name="submit" id="btn11">Add Please</button>
       </div>
      



        </form>





      </div>

</body>
</html>