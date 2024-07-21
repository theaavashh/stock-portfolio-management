

<?php

$sno=$_GET['id'];
include("database.php");



$sql="Delete from top_gainer  where id='$sno'";
$result=mysqli_query($conn,$sql);


header("location:topgainer.php");
mysqli_close($conn);

?>