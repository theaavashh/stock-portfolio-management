<?php
include("main.php");
include("database.php");

$sno=$_GET['id'];
$sql="Select * from market_summary where id={$sno}";
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
      <title>Market Summary</title>
      <link href="css/marketsummaryadd.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/marketsummarycheck.js"></script>
      <script src="js/marketsummary.js"></script>
</head>
<body>
      <div id="mainline">
            <h2>Update Market Summary</h2>
      <form onsubmit="return validation()" action="marketsummaryupdating.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div >
            <label>Date</label>
            <input id="labela1" name="date" type="date" value="<?php echo $row['date']?>">
            <span id="errordate"></span>
      </div><br>
      <div >
            <label>Total TurnOver</label>
            <input id="label1" name="total_turnover" type="text" value="<?php echo $row['total_turnover']?>">
            <span id="errorturnover"></span>
      </div><br>
      <div >
            <label>Total Traded Share</label>
            <input id="label2" type="text" name="total_traded" value="<?php echo $row['total_traded']?>">
            <span id="errortradeshare"></span>

      </div><br>
      <div >
            <label>Total Transaction</label>
            <input id="label3" type="text" name="total_transaction" value="<?php echo $row['total_transaction']?>">
            <span id="errortransaction"></span>
      </div><br>
      <div >
            <label>Total Scrips Traded</label>
            <input id="label4" type="text" name="total_scrips_traded" value="<?php echo $row['total_scrips_traded']?>">
            <span id="errorscrips"></span>
      </div><br>
      <div >
            <label>Total Market Capitalized</label>
            <input id="label5" type="text" name="total_market_capitalized" value="<?php echo $row['total_market_capitalized']?>">
            <span id="errormarket"></span>
      </div><br>
      
      <button id="btn1" name="submit">Update Market Summary</button>










      </form>
      <?php
    }
}
    ?>







      </div>
</body>
</html>