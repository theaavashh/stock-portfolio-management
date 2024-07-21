<?php
include("database.php");
include("main.php");
$where = '';
if (isset($_POST['search'])) {
    $search_value = $_POST['submit'];
    $where = "where symbol like '%$search_value%' ";
}
$sql = "Select * from upcoming_issue $where";
$result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="css/upcomingissue.css" rel="stylesheet">
    <script src="add.js"></script>
</head>

<body>
    <div id="form"> </div>
    <form  action="upcomingissue.php" method="POST">
        <input type="search" name="submit" placeholder="Search by symbol">
        <button class="btn22" name="search"><i class="fas fa-search"></i></button>
    </form>


    <div id="headers">


        <h1>Upcoming Issue</h1>
        <!-- <a href="upcomingadd.php" id="upcomingadd">Click Here To Add</a> -->


        <table>
            <tr>
                <th>Symbol</th>
                <th>Company Name</th>
                <th>Issue Manager</th>
                <th>Share Type</th>
                <th>Price</th>
                <th>Units</th>
                <th>Issue Date</th>
                <th>Close Date</th>
            </tr>

             <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['symbol'] ?></td>
                    <td><?php echo $row['company_name'] ?></td>
                    <td><?php echo $row['issue_manager'] ?></td>
                    <td><?php echo $row['share_types'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['units'] ?></td>
                    <td><?php echo $row['issue_date'] ?></td>
                    <td><?php echo $row['close_date'] ?></td>
                    

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