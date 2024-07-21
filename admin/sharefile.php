<?php
include("database.php");
include("main.php");

$sql="Select * from shareInfo";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){


?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=<, initial-scale=1.0">
      <title>Document</title>
      <link href="shareinfo.css" rel="stylesheet">
</head>
<body>
      <div id="main">
            <div id="img_upload">
      <img src="<?php echo "upload/".$row['name'];?>">
      <br>
            </div>
         
<?php
}
?>
      </div>
</body>
</html>