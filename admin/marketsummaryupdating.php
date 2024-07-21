<?php
    
    $sno=$_POST['id'];
    $date=$_POST['date'];
    $turnover=$_POST['total_turnover'];
    $tradeshare=$_POST['total_traded'];
    $transaction=$_POST['total_transaction'];
    $scripstraded=$_POST['total_scrips_traded'];
    $marketcapital=$_POST['total_market_capitalized'];
    

    include("database.php");
    $sql="UPDATE `market_summary` SET `date`='{$date}',`total_turnover`='{$turnover}',`total_traded`='{$tradeshare}',`total_transaction`='{$transaction}',`total_scrips_traded`='{$scripstraded}',`total_market_capitalized`='{$marketcapital}' WHERE id='{$sno}'";
    $result=mysqli_query($conn,$sql);
     header("location:marketsummary.php");


?>