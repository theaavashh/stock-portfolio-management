<?php
 include("database.php");

 $sno=$_POST['id'];
 $companyname=$_POST['company_name'];
 $sharetype=$_POST['stock_type'];
 $units=$_POST['units'];
 $buyingprice=$_POST['buying_price'];
 $totalprice=$_POST['total_price'];
 $date=$_POST['date'];

$sql="UPDATE portfolio SET `company_name`='{$companyname}',`stock_type`='{$sharetype}',`units`='{$units}',`buying_price`='{$buyingprice}',`total_price`='{$totalprice}',`date`='{$date}' WHERE id='{$sno}'";
$result=mysqli_query($conn,$sql);
 header("location:portfolioview.php");
     ?>


