<?php
include("database.php");
include("main.php");
$where = '';
if (isset($_POST['search'])) {
    $search_value = $_POST['submit'];
    $where = "where date  like '%$search_value%' ";
}
$sql = "Select * from market_summary $where";
$result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="css/marketsummary.css" rel="stylesheet">
</head>

<body>
    <!-- <div id="form"> </div>
    <form action="marketsummary.php" method="POST">
        <input type="search" name="submit" placeholder="Search by date">
        <button class="btns" name="search"><i class="fas fa-search"></i></button>
    </form> -->


    <div id="marketsummary_table">

   
        <h1>Market Summary</h1>
     
       <?php while($row=mysqli_fetch_assoc($result)){
?>
      
        <table>
              <tr>
                    <td id="td_one">Date:</td>
            </tr>
            <tr>
                  <td id="value_one"><?php echo $row['date'];?></td>
            </tr>
            <tr>
                    <td id="td_two">Total Turnover</td>
                    <hr>
            </tr>
           
            <tr>
                  <td id="value_two">NPR: <?php echo $row['total_turnover'];?></td>
            </tr>
            
            <tr>
                    <td id="td_three">Total Trade</td>
            </tr>
            <tr>
                  <td id="value_three"><?php echo $row['total_traded'];?></td>
            </tr>
            <tr>
                    <td id="td_four">Total Transaction</td>
            </tr>
            <tr>
                  <td id="value_four"><?php echo $row['total_transaction'];?></td>
            </tr>
           
            <tr>
                    <td id="td_five">Total Scrips</td>
            </tr>
            <tr>
                  <td id="value_five"><?php echo $row['total_scrips_traded'];?></td>
            </tr>
            <tr>
                    <td id="td_six">Total Market Capitalized</td>
            </tr>
            <tr>
                  <td id="value_six"><?php echo $row['total_market_capitalized'];?></td>
            </tr>
      
      

        </table>
        <?php
       }
      ?>
         
</body>

</html>