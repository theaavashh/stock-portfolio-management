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
        <button class="btn" name="search"><i class="fas fa-search"></i></button>
    </form> -->


    <div id="marketsummary_table">

   
        <h1>Market Summary</h1>
        <a href="marketsummaryadd.php" id="marketadd">Click Here To Add</a>


        <table>
            <tr>
                <th >Date</th>
                <th>Total TurnOver</th>
                <th>Total Traded</th>
                <th>Total Transaction</th>
                <th>Total Scrips</th>
                <th>Total Market Capitalized</th>
                <th>Action</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                     <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['total_turnover'] ?></td>
                    <td><?php echo $row['total_traded'] ?></td>
                    <td><?php echo $row['total_transaction'] ?></td>
                    <td><?php echo $row['total_scrips_traded'] ?></td>
                    <td><?php echo $row['total_market_capitalized'] ?></td>
                    <td><a href="marketsummaryupdate.php?id=<?php echo $row['id'];?>" onclick="clickupdate()"><i class="fas fa-edit"></i></a>
        <a href="deletemarketsummary.php?id=<?php echo $row['id'];?>" onclick="clickdelete()"><i class="fas fa-trash-alt"></i></a>
    </td>
                <?php
            }
                ?>




                </tr>



        </table>



    </div>

    <script>
     
     function clickupdate(){
         alert("Oups! You want to update it");
     }

     function clickdelete(){
         alert("Sorry! Sad to see you going");
     }


    </script>
</body>

</html>