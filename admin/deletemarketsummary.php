

<?php

$sno=$_GET['id'];
include("database.php");



$sql="Delete from market_summary  where id='$sno'";
$result=mysqli_query($conn,$sql);


header("location:marketsummary.php");
mysqli_close($conn);

?>