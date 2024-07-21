<?php

include("database.php");
include("main.php");

$companyname = $stocktype = $units = $buyingprice = $date = "";
$companytypeerror = $stocktypeerror = $unitserror = $buyingpriceerror = $dateerror = "";

if (isset($_POST['submit'])) {
      $companyname = $_POST['company_name'];
      $stocktype=$_POST['stock_type'];
      $units = $_POST['units'];
      $buyingprice = $_POST['buying_price'];
      $totalprice = $_POST['total_price'];
      $date = $_POST['date'];



      if (empty($_POST['company_name'])) {
            $companytypeerror = "Company Name is empty";
      }
     

      if (empty($_POST['units'])) {
            $unitserror = "Units is empty";
      }


      if (empty($_POST['buying_price'])) {
            $buyingpriceerror = "Buying Price is empty";
      }

      if (empty($_POST['date'])) {
            $dateerror = "Date is empty";
      }

       if ($companytypeerror == "" and $stocktypeerror == "" and   $unitserror == "" and $buyingpriceerror == "" and $dateerror == "") {


      $user = $_SESSION['username'];

      $sql = "INSERT INTO `portfolio`(`company_name`, `stock_type`, `units`, `buying_price`,`total_price`, `date`, `user_id`) VALUES ('$companyname','$stocktype','$units','$buyingprice','$totalprice','$date','$user')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
?>
            <script>
                  alert("Hurray!");
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
      <title>Portfolio add</title>
      <link href="css/portfolioadd.css" rel="stylesheet">
      <!-- <script src="add.js"></script>  -->
    
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/portfolio.js"></script>
</head>

<body>
      <div id="portform">
            <div id="porthead">Add Stock Transaction</div>
            <a href="portfolioview.php" id="ports"><button id="portview">Click to view portfolio</button></a>
            <form onsubmit="validation()" action="portfolioadd.php" method="POST">

                  <label>Company Name</label><br>
                  <input type="text" name="company_name" id="companyname"><span id="errorcompanyname"><?php echo $companytypeerror ?></span><br>
                  <label>Stock Type</label><br>
                  <select id="stocktype" name="stock_type">
                        <option disabled selected>Select stocktype</option>
                        <?php
                                $sql_one="Select * from stocktype";
                                $result_one=mysqli_query($conn,$sql_one);
                                while($row=mysqli_fetch_assoc($result_one)){

                               
                        ?>
                        <option selected="IPO"><?php echo $row['stockname']?></option>
                        <?php
                                }
                                ?>
                  </select> 
                  <span id="errorstocktype"><?php echo $stocktypeerror ?></span><br>
                  <label>Units</label><br>
                  <input type="text" name="units" id="units"> <span id="errorunits"><?php echo $unitserror ?></span><br>
                  <label>Buying Price</label><br>
                  <input type="text" name="buying_price" id="buyingprice"> <span id="errorbuyingprice"><?php echo $buyingpriceerror ?></span><br>
                 
                  <label>Transaction Date</label><br>
                  <input type="date" name="date" id="date"> <span id="errordate"><?php echo $dateerror ?></span><br><br>
                  <button id="submit" name='submit' onclick="validation()">Add Transaction</button><br>

                  <input type="hidden" name="total_price" id="total" >
               

                                                                        






      </div>


<script>
function validation(){
      let a=document.getElementById("units").value;
      let b=document.getElementById("buyingprice").value;
      let c=a*b;
      let d=document.getElementById("total").value=c;
 
}

</script>


<script>

// $(function(){

//       var companyerror=false;
//       var unitserror=false;
//       var buyingpriceerror=false;
//       var date_error=false;

//       $("#companyname").keyup(function(){
//            checkcompanyname();
//       });

//       $("#units").keyup(function(){
//            checkunits();
//       });

//       $("#buyingprice").keyup(function(){
//            checkbuyingprice();
//       });

//       $("#date").focusout(function(){
//               checkdate();
//       });








//       function checkcompanyname(){
//            let companypattern=/^[A-Za-z\s]*$/;
//            let companycheck=$("#companyname").val();
//            let companylength=$("#companyname").val().length;

//            if(!companypattern.test(companycheck)){
//                  $("#errorcompanyname").html("Should be alphabet character only");
//                  $("#errorcompanyname").show();
//                  companyerror=true;
//            }
//            else if(companylength<1){
//             $("#errorcompanyname").html("Should be filled out");
//                  $("#errorcompanyname").show();
//                  companyerror=true;

//            }
//            else if(companylength<=5){
//             $("#errorcompanyname").html("Should be more than 5 character");
//                  $("#errorcompanyname").show();
//                  companyerror=true;


//            }
//            else{
//             $("#errorcompanyname").hide();

//            }



//       }

//       function checkunits(){
//             let unitspattern=/^[0-9]*$/;
//             let unitsfield=$("#units").val();
//             let unitslength=$("#units").val().length;

//             if(!unitspattern.test(unitsfield)){
//                   $("#errorunits").html("Should be numeric character only");
//                   $("#errorunits").show();
//                   unitserror=true;
//             }
//             else if(unitslength<1){
//                   $("#errorunits").html("Should be filled out");
//                   $("#errorunits").show();
//                   unitserror=true;

//             }
//             else if((unitslength<2) || (unitslength>8)){
//                   $("#errorunits").html("Should be between 2-8");
//                   $("#errorunits").show();
//                   unitserror=true;

//             }
//             else{
//                   $("#errorunits").hide();

//             }

//       }


//       function checkbuyingprice(){
//             let pricepattern=/^[0-9]*$/;
//             let pricefield=$("#buyingprice").val();
//             let pricelength=$("#buyingprice").val().length;

//             if(!pricepattern.test(pricefield)){
//                   $("#errorbuyingprice").html("Should be numeric character only");
//                   $("#errorbuyingprice").show();
//                   buyingpriceerror=true;
//             }
//             else if(pricelength<1){
//                   $("#errorbuyingprice").html("Should be filled out");
//                   $("#errorbuyingprice").show();
//                   buyingpriceerror=true;

//             }
//             else if((pricelength<2) || (pricelength>8)){
//                   $("#errorbuyingprice").html("Should be between 2-8");
//                   $("#errorbuyingprice").show();
//                   buyingpriceerror=true;

//             }
//             else{
//                   $("#errorbuyingprice").hide();

//             }

//       }

//       function checkdate(){

//             let datevalue=$("#date").val();
            
//             if(!datevalue==""){
//                   $("#errordate").hide();

//             }
//             else{
//                   $("#errordate").html("Should be filled out");
//                   $("#errordate").show();
//                   date_error=true;

//             }
//       }

// });




</script>



</body>

</html>