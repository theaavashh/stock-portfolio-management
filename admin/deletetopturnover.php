

<?php

$sno=$_GET['id'];
include("database.php");



$sql="Delete from top_turnover  where id='$sno'";
$result=mysqli_query($conn,$sql);


header("location:topturnover.php");
mysqli_close($conn);

?>