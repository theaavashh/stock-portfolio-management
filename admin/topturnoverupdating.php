<?php
    
    $sno=$_POST['id'];
    $symbol=$_POST['symbol']; 
    $totalturnover=$_POST['total_turnover'];
    $ltp=$_POST['ltp'];
   

    include("database.php");
    $sql="UPDATE `top_turnover` SET `symbol`='{$symbol}',`total_turnover`='{$totalturnover}',`ltp`='{$ltp}' WHERE id='{$sno}'";
    $result=mysqli_query($conn,$sql);
     header("location:topturnover.php");


?>