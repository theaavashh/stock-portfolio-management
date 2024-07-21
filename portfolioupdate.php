<?php
include("main.php");
include("database.php");

if (isset($_GET['id'])) {
      $snos = $_GET['id'];
     
      $sql = "Select * from `portfolio` where id={$snos}";
      $result = mysqli_query($conn, $sql);

?>



      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Portfolio add</title>
            <link href="css/portfolioadd.css" rel="stylesheet">
            <!-- <script src="js/add.js"></script> -->
            <!-- <script src="js/portfolioupdate.js"></script>  -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="js/portfolio.js"></script>
            
      </head>

      <body>
            <div id="portform">
                  <div id="porthead">Update Stock Transaction</div>
                  <a href="portfolioview.php" id="ports"><button id="portview">Click to view portfolio</button></a>
                  <?php
                  while ($rows = mysqli_fetch_assoc($result)) {

                  ?>

                        <form onsubmit="return checkvalidation()" action="portfolioupdating.php" method="POST">
                              <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                              <label>Company Name</label><br>
                              <input type="text" name="company_name" id="companyname" value="<?php echo  $rows['company_name'] ?>"><span id="errorcompanyname"></span><br>
                              <label>Stock Type</label><br>
                              <select id="stocktype" name="stock_type">
                              <option disabled selected>Select stocktype</option>

                                    <option disabled selected><?php echo $rows['stock_type'] ?></option>
                                    <?php
                                    $sql_one = "Select * from stocktype";
                                    $result_one = mysqli_query($conn, $sql_one);
                                    while ($row = mysqli_fetch_assoc($result_one)) {


                                    ?>
                                          <option selected><?php echo $row['stockname'] ?></option>
                                    <?php
                                    }
                                    ?>
                              </select> <br>
                              <label>Units</label><br>
                              <input type="text" name="units" id="units" value="<?php echo $rows['units']; ?>"> <span id="errorunits"></span><br>
                              <label>Buying Price</label><br>
                              <input type="text" name="buying_price" id="buyingprice" value="<?php echo  $rows['buying_price'] ?>"> <span id="errorbuyingprice"></span><br>
                              <label>Transaction Date</label><br>
                              <input type="date" name="date" id="date" value="<?php echo $rows['date'] ?>"> <span id="errordate"></span><br><br>
                              <button id="submit" name='submit' onclick="validation()" disabled>Add Transaction</button><br>

                              <input type="hidden" name="total_price" id="total">









            </div>
<?php
                  }
            }


?>


<script>
      function validation() {
            let a = document.getElementById("units").value;
            let b = document.getElementById("buyingprice").value;
            let c = a * b;
            let d = document.getElementById("total").value = c;

      }
</script>



      </body>

      </html>