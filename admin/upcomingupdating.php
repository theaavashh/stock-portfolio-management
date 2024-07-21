<?php

    
    $sno=$_POST['id'];
    $symbol=$_POST['symbol']; 
    $companyname=$_POST['company_name'];
    $issuemanager=$_POST['issue_manager'];
    $sharetype=$_POST['share_types'];
    $price=$_POST['price'];
    $units=$_POST['units'];
    $issuedate=$_POST['issue_date'];
    $closedate=$_POST['close_date'];

    
    include("database.php");
    $sql="Update upcoming_issue set symbol='{$symbol}', company_name='{$companyname}', issue_manager='{$issuemanager}',share_types='{$sharetype}', price='{$price}', units='{$units}',issue_date='{$issuedate}', close_date='{$closedate}' where id={$sno}";
    $result=mysqli_query($conn,$sql);
     header("location:upcomingissue.php");


     ?>



