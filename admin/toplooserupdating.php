<?php
    
    $sno=$_POST['id'];
    $symbol=$_POST['symbol']; 
    $ltp=$_POST['ltp'];
    $change=$_POST['change'];
   

    include("database.php");
    $sql="UPDATE `top_looser` SET `symbol`='{$symbol}',`ltp`='{$ltp}',`change`='{$change}' WHERE id='{$sno}'";
    $result=mysqli_query($conn,$sql);
     header("location:toplooser.php");


?>