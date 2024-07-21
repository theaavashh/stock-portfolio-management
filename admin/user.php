<?php
include("database.php");
include("main.php");
$where = '';
if (isset($_POST['search'])) {
    $search_value = $_POST['submit'];
    $where = "where username like '%$search_value%' ";
}


$sql = "Select * from registration $where order by username asc";
$result = mysqli_query($conn, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="css/user.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="form"> </div>
    <form action="user.php" method="POST">
        <input type="search" name="submit" placeholder="Search by username" autocomplete="off">
        <button class="btn" name="search"><i class="fas fa-search"></i></button>
    </form>


    <div id="user_table">


        <h1>Users Info</h1>


        <table>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mailing address</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>

                <?php
            }
                ?>




                </tr>



        </table>

      

    </div>

</body>

</html>