<?php
include("main.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/profitanalyzer.css" rel="stylesheet">
      <script src="css/profitanalyzer.css"></script>
</head>
<body>
      <div id="calculation">
      <h1>Profit Analysis</h1>
      <form onsubmit="return validation()">
       <label>Buying Price</label><br>
       <input type="text" id="bprice"><br>
       <label>Current Price</label><br>
       <input type="text" id="cprice"><br>
       <label>Units</label><br>
       <input type="text" id="units"><br>
       <input type="text" id="profitearn">
       <button>send</button>



      </form>
      
      
      
      </div>
</body>
</html>