

<?php

$sno=$_GET['id'];
include("database.php");



$sql="Delete from top_looser  where id='$sno'";
$result=mysqli_query($conn,$sql);


header("location:toplooser.php");
mysqli_close($conn);

?>