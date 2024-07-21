

<?php

$sno=$_GET['id'];
include("database.php");



$sql="Delete from portfolio  where id='$sno'";
$result=mysqli_query($conn,$sql);


header("location:portfolioview.php");
mysqli_close($conn);

?>