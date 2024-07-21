

<?php

$sno=$_GET['id'];
include("database.php");



$sql="Delete from upcoming_issue where id='$sno'";
$result=mysqli_query($conn,$sql);


header("location:upcomingissue.php");
mysqli_close($conn);

?>