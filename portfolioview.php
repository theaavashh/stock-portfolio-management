<?php
include("database.php");
include("main.php");

$user = $_SESSION['username'];
$search_value="";

$sql = "SELECT * FROM `portfolio` where user_id='{$user}'  ORDER BY company_name asc ";
$result = mysqli_query($conn, $sql);





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/portfolioview.css" rel="stylesheet">
</head>

<body>
    <!-- <form action="portfolioview.php" method="POST">
        <input type="search" name="submit" placeholder="Search by company" id="symbol">
        <button class="btn1" name="search"><i class="fas fa-search"></i></button>
    </form> -->
    <div id="portview">
        <h1 id="heading">Portfolio Details</h1>


        <table>

            <tr>
                <th>Company Name</th>
                <th>Stock Type</th>
                <th>Units</th>
                <th>Buying Price</th>
                <th>Total Price</th>
                <th>Transaction Date</th>
                <th>Action</th>
            </tr>

            <?php

            while ($row = mysqli_fetch_assoc($result)) {
             
            ?>
                <tr>
                    <td><?php echo $row['company_name'] ?></td>
                    <td><?php echo $row['stock_type'] ?></td>
                    <td><?php echo $row['units'] ?></td>
                    <td><?php echo $row['buying_price'] ?></td>
                    <td><?php echo $row['total_price'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><a href="portfolioupdate.php?id=<?php echo $row['id']; ?>" onclick="clickupdate()"><i class="fas fa-edit"></i></a>
                        <a href="deleteportfolio.php?id=<?php echo $row['id']; ?>" onclick="clickerror()"><i class="fas fa-trash-alt"></i></a>
                    </td>


                <?php
            }
        


                ?>


                </tr>

        </table>
        <text id="texting">Total : <?php
                                    $s = "SELECT SUM(total_price) FROM `portfolio` WHERE user_id='{$user}' ";
                                    $a = mysqli_query($conn, $s);

                                    while ($r = mysqli_fetch_assoc($a)) {
                                        foreach ($r as $b) {
                                            echo $b;
                                        }
                                    }
                                    ?>
        </text>

    </div>



<script>

function clickupdate(){
    alert("Oops..You wanna update");

}

function clickerror(){
    alert("Sorry to see your transaction going");
}


</script>


</body>

</html>