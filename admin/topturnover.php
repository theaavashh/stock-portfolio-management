<?php
include("database.php");
include("main.php");
$where = '';
    if(isset($_POST['search'])){
        $search_value = $_POST['submit'];
            $where = "where symbol like '%$search_value%' ";
    }   
    
$sql= "SELECT * FROM `top_turnover` $where";
$results = mysqli_query($conn, $sql);





?>



<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/topgainer.css" rel="stylesheet">
</head>
<body>
<div class="part-two">
            <a class="subparttwo" href="topgainer.php">  Top Gainer</a>
            </div>
            <div class="part-two">
            <a class="subparttwo" href="toplooser.php">  Top Looser</a>
            </div>
            <div class="part-two">
            <a class="subparttwo" href="">Top Turnover</a>
            </div>
          


      <form action="topturnover.php" method="POST">
<input type="search" name="submit" placeholder="Search by symbol ">
<button class="btn" name="search"><i class="fas fa-search"></i></button>
      </form>

      <div id="head">
            
    <h1>Top Five Turnover</h1>
    <a href="topturnoveradd.php"><button class="btn-anchor">Click here to add details</button></a>
   
    <span id='date'>As on:
    <?php
    date_default_timezone_set('Asia/Kathmandu');

    echo date('d l m')."&nbsp";
   echo "<span id='date-two'>".date("h:i:sA")."</span>";
?>
</span>
   <table>
    <tr>
    <th>Symbol</th>
    <th>Total Turnover</th>
    <th>Ltp</th>
    <th>Action</th>
    </tr>

 <?php
   while($rows= mysqli_fetch_assoc($results)){
?> 
    <tr>
    <td><?php echo $rows['symbol']?></td>
    <td><?php echo $rows['total_turnover']?></td>
    <td><?php echo $rows['ltp']?></td>
    <td><a href="topturnoverupdate.php?id=<?php echo $rows['id'];?>" onclick="clickupdate()"><i class="fas fa-edit"></i></a>
        <a href="deletetopturnover.php?id=<?php echo $rows['id'];?>" onclick="clickerror()"><i class="fas fa-trash-alt"></i></a>
    </td>
    
 
    <?php
   }
   ?> 
    
    
    
    
    </tr>
   
   
   
   </table>
   
   
   
   </div> 
            

   <script>
        
        function clickupdate(){
            alert("Oups! You want to update data");
        }
        
        function clickerror(){
            alert("Sorry! Sad to see your data going");
        }

       
        </script>
            
 





    
</body>
</html>