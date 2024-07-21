<?php
include("main.php");
include("database.php");

$dateerror=$turonovererror=$tradedshareerror=$transactionerror=$scripstradederror=$marketcapitalizederror="";
$date=$turonover=$tradedshare=$transaction=$scripstraded=$marketcapitalized="";

if($_SERVER['REQUEST_METHOD']=='POST'){
      if(empty($_POST['date'])){
            $dateerror="Should be filled out";
      }
      else{
            $date=$_POST['date']; 
      }


      if(empty($_POST['total_turnover'])){
            $turonovererror="Should be filled out";
      }
      else{
            $turonover=$_POST['total_turnover']; 
      }

      if(empty($_POST['total_traded'])){
            $tradedshareerror="Should be filled out";
      }
      else{
            $tradedshare=$_POST['total_traded'];
      }


      if(empty($_POST['total_transaction'])){
            $transactionerror="Should be filled out";
      }
      else{
            $transaction=$_POST['total_transaction'];
      }

      if(empty($_POST['total_scrips_traded'])){
            $scripstradederror="Should be filled out";
      }
      else{
            $scripstraded=$_POST['total_scrips_traded'];
      }
      if(empty($_POST['total_market_capitalized'])){
            $marketcapitalizederror="Should be filled out";
      }
      else{
            $marketcapitalized=$_POST['total_market_capitalized'];
      }
      

      $sql="Select * from market_summary";
      $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)>0){
            ?>
            <script>
                   alert("Sorry! Market Summary already exist");
            </script>
            <?php
           
      }

      else if($dateerror=="" && $turonovererror=="" &&  $tradedshareerror=="" && $transactionerror=="" && $scripstradederror=="" && $marketcapitalizederror=="" ){

      $sql="INSERT INTO `market_summary`(`date`,`total_turnover`, `total_traded`, `total_transaction`, `total_scrips_traded`, `total_market_capitalized`)VALUES ('$date','$turonover','$tradedshare','$transaction','$scripstraded','$marketcapitalized')";
     $result=mysqli_query($conn,$sql);

     if($result){
           ?>
           <script>
                 alert("Your data has been inserted");
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
      <title>Market Summary</title>
      <link href="css/marketsummaryadd.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/marketsummarycheck.js"></script>
      <!-- <script src="js/marketsummary.js"></script> -->
</head>
<body>
      <div id="mainline">
      <a id="nextpage" href="marketsummary.php">Click  Here To View Details</a>
            <h2>Add Market Summary</h2>
      <form onsubmit="return validation()" action="marketsummaryadd.php" method="POST">
      <div >
            <label>Date</label>
            <input id="labela1" name="date" type="date">
            <span id="errordate"><?php echo $dateerror?></span>
      </div><br>
      <div >
            <label>Total TurnOver</label>
            <input id="label1" name="total_turnover" type="text">
            <span id="errorturnover"><?php echo $turonovererror?></span>
      </div><br>
      <div >
            <label>Total Traded Share</label>
            <input id="label2" type="text" name="total_traded">
            <span id="errortradeshare"><?php echo $tradedshareerror?></span>

      </div><br>
      <div >
            <label>Total Transaction</label>
            <input id="label3" type="text" name="total_transaction">
            <span id="errortransaction"><?php echo $transactionerror?></span>
      </div><br>
      <div >
            <label>Total Scrips Traded</label>
            <input id="label4" type="text" name="total_scrips_traded">
            <span id="errorscrips"><?php echo $scripstradederror?></span>
      </div><br>
      <div >
            <label>Total Market Capitalized</label>
            <input id="label5" type="text" name="total_market_capitalized">
            <span id="errormarket"><?php echo $marketcapitalizederror?></span>
      </div><br>
      
      '
      <button id="btn1" name="submit">Add Market Summary</button>










      </form>
      </div>

<script>

// $(function(){
//       var dateerror=false;

//       $("#labela1").focusout(function(){
//            checkdate();
//       });

//       $("#label1").keyup(function(){
//             checkturnover();
//       });

//       $("#label2").keyup(function(){
//             checktradeshare();
//       });

//       $("#label3").keyup(function(){
//             checktransaction();

//       });

//       $("#label4").keyup(function(){
//             checkscrips();

//       });

//       $("#label5").keyup(function(){
//           checkmarketcapitalized();

//       });


      

//       function checkdate(){
//            let datefield=$("#labela1").val().length;

//            if(datefield==""){
//                  $("#errordate").html("Should be filled out");
//                  $("#errordate").show();
//                  $("#btn1").attr("disabled","disabled");
//                  dateerror=true;
//            }
//            else{
//             $("#errordate").hide();
//             $("#btn1").removeAttr("disabled");
//            }


//       }


//       function checkturnover(){
//             let turnoverfield=/^[0-9]*$/;
//             let turnvalue=$("#label1").val();

//             let turnoverlength=$("#label1").val().length;
//             if(!turnoverfield.test(turnvalue)){
//                   $("#errorturnover").html("Should be numerical character");
//                   $("#errorturnover").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else if(turnoverlength<1){
//                   $("#errorturnover").html("Should be filled out");
//                   $("#errorturnover").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else{
//                   $("#errorturnover").hide();
//                   $("#btn1").removeAttr("disabled");

//             }
//       }

//       function checktradeshare(){
//             let tradesharefield=/^[0-9]*$/;
//             let tradesharevalue=$("#label2").val();

//             let tradesharelength=$("#label2").val().length;
//             if(!tradesharefield.test(tradesharevalue)){
//                   $("#errortradeshare").html("Should be numerical character");
//                   $("#errortradeshare").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else if(tradesharelength<1){
//                   $("#errortradeshare").html("Should be filled out");
//                   $("#errortradeshare").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else{
//                   $("#errortradeshare").hide();
//                   $("#btn1").removeAttr("disabled");

//             }
// }


//       function checktransaction(){
//             let transactionfield=/^[0-9]*$/;
//             let transactionvalue=$("#label3").val();
//             let transactionlength=$("#label3").val().length;
//             if(!transactionfield.test(transactionvalue)){
//                   $("#errortransaction").html("Should be numerical character");
//                   $("#errortransaction").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else if(transactionlength<1){
//                   $("#errortransaction").html("Should be filled out");
//                   $("#errortransaction").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else{
//                   $("#errortransaction").hide();
//                   $("#btn1").removeAttr("disabled");

//             }
//       }
      
//       function checkscrips(){
//             let scripsfield=/^[0-9]*$/;
//             let scripsvalue=$("#label4").val();
//             let scripslength=$("#label4").val().length;
//             if(!scripsfield.test(scripsvalue)){
//                   $("#errorscrips").html("Should be numerical character");
//                   $("#errorscrips").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else if(scripslength<1){
//                   $("#errorscrips").html("Should be filled out");
//                   $("#errorscrips").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else{
//                   $("#errorscrips").hide();
//                   $("#btn1").removeAttr("disabled");

//             }






//       }

//       function checkmarketcapitalized(){
//             let marketfield=/^[0-9]*$/;
//             let marketvalue=$("#label5").val();
//             let marketlength=$("#label5").val().length;

//             if(!marketfield.test(marketvalue)){
//                   $("#errormarket").html("Should be numerical character");
//                   $("#errormarket").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else if(marketlength<1){
//                   $("#errormarket").html("Should be filled out");
//                   $("#errormarket").show();
//                  $("#btn1").attr("disabled","disabled");

//             }
//             else{
//                   $("#errormarket").hide();
//                   $("#btn1").removeAttr("disabled");

//             }






//       }







// });




</script>
</body>
</html>