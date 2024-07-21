<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/index.css" rel="stylesheet">
      <link href="font/css/all.min.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Open+Sans+Condensed:wght@300&family=Prata&display=swap"
            rel="stylesheet">
</head>

<body>
      <header>
            <nav>
                  <div class="side-left">
                        <text>Stock <span id="sub-text">Portfolio</span> </text>
                  </div>

                  <!-- <div class="sub-menu">
                        <a class="pre-sub-menu" href="">Home</a>
                        <a class="pre-sub-menu" href="">About Us</a>
                        <a class="pre-sub-menu" href="">Stock Tips</a>



                  </div> -->
            </nav>



            <div class="side-right">
                  <a href="registration.php"><button id="btn-one">Sign Up</button><a>
                  <a href="logins.php"><button id="btn-two">Log In</button></a><br>

                  <embed src="images/undraw_Stock_prices_re_js33.svg" loading='lazy'>
            </div>

      </header>

      <div class="social-handle">
            <div id="handle-one"><i class="fab fa-facebook-square"></i></div>
            <div id="handle-two"><i class="fab fa-instagram-square"></i></div>
            <div id="handle-three"><i class="fab fa-twitter-square"></i></div>
            <div id="handle-four"><i class="fab fa-youtube"></i></div>


      </div>

      <div id="head-text">
            <span id="sub-head-one">Invest,</span>
            <span id="sub-head-two">Track</span>
            <article>and</article>
            <span id="sub-head-three">Earn</span>
      </div>

      <div id="head-subtext">
            <h3>Take control on your goals. Track Your Stock Investment <br> Congratulation on taking a forward step to
                  track stock from stock portfolio </h3>
      </div>

      <a href="login.php"><button id="explore-button">Explore Your Portfolio <i
                        class="fas fa-arrow-circle-right"></i></button></a>


      <div id="site-demo">
            <div id="site-color"></div>
            <embed id="site-show" src="images/Screenshot (375).png">
            <div id="site-head">Your Stock<br> Investment Recording Site </div>
            <div id="site-subtext">Stock Portfolio Management (SPM) is the web based application mainly focusing to
                  manage an individual’s investment in the form of shares, dividend, mutual fund and more so that the
                  investor can track their investing company and look on profit they generate from investment. </div>

      </div>

      <div id="tool-site">
            <text id="tool-head">Why We</text>
           
            <div class="tool-text-partone" id="partone">
                 <embed id="tool-portfolio" src="images/undraw_crypto_portfolio_2jy5.svg" height="100" width="500">
                  <text class="tool-text">Free Portfolio Management</text>

            </div>
            <div class="tool-text-partone" id="parttwo">
                  <embed id="tool-portfolio-right" src="images/undraw_Organizing_projects_0p9a.svg" height="100" width="500">
                        <text  id="tool-text-one" class="tool-text">Get Organized</text>
                  
            </div>

            
          
            <h3 id="user-total">Upcoming Stock


<div id="table-form">
<table border="1px">
      <tr>
            <td>Company Name</td>
            <td>Stock Type</td>
            <td>Opening Date</td>
            <td>Closing Date</td>
      </tr>
      
            <?php
            include("database.php");
            $sql = "Select * from upcoming_issue";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
            <td><?php echo $row['company_name'] ?></td>
            <td><?php echo $row['share_types'] ?></td>
            <td><?php echo $row['issue_date'] ?></td>
            <td><?php echo $row['close_date'] ?></td>
            </tr>
            
      <?php
            }
            ?>
</table>
</div>

</h3>

<h3 id="user-total">TOP LISTED


<div id="table-form">
<table id="table1" border="1px">
      <tr>
            <th>Top Gainer</th>
         
          
      </tr>
      
            <?php
            include("database.php");
            $sql = "Select * from top_gainer";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
            <td><?php echo $row['symbol'] ?></td>
            </tr>
            <?php
            
            }
            ?>

<div id="table-form">
<table id="table2" border="1px">
      <tr>
            <th>Top Looser</th>
         
          
      </tr>
      
            <?php
            include("database.php");
            $sql = "Select * from top_looser";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
            <td><?php echo $row['symbol'] ?></td>
            </tr>
            <?php
            
            }
            ?>

<div id="table-form">
<table id="table3" border="1px">
      <tr>
            <th>Top Turnover</th>
         
          
      </tr>
      
            <?php
            include("database.php");
            $sql = "Select * from top_turnover";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
            <td><?php echo $row['symbol'] ?></td>
            </tr>
            <?php
            
            }
            ?>
          
            
   
</table>
</div>

</h3>

            

            <div class="stock">
                  <embed id="stock-bear" src="images/undraw_bear_market_ania.svg" height="10" width="500">
                  <div id="stock-tips-head">Tips for Stock Market Investment</div>
                  <div id="stock-text">
                        <div>
                              <i class="fas fa-heart"></i>
                              <text class="text-show">Handle the basic concepts</text>
                        </div><br>
                        <div>
                              <i class="fas fa-heart"></i>
                              <text class="text-show">Know Your Goals</text>

                        </div><br>
                        <div>
                              <i class="fas fa-heart"></i>
                              <text class="text-show">Know Your Risk Tolerance</text>
                        </div><br>
                        <div>
                              <i class="fas fa-heart"></i>
                              <text class="text-show">Build the diverse portfolio</text>
                        </div><br>
                        <div>
                              <i class="fas fa-heart"></i>
                              <text class="text-show">Avoid Leverage</text>
                        </div>
                  </div>
            </div>

           


            <footer>
                    <text id="footer-head">Stock Portfolio</text>
                    <text id='footer-subhead'>Lets Talk?</text>
                    <article id="footer-subtext">Stock Portfolio Management (SPM) is the web based application mainly focusing to
                        manage an individual’s investment in the form of shares, dividend, mutual fund and more so that the
                        investor can track their investing company and look on profit they generate from investment.</article>

                  <text id="footer-service">We Provide</text>
                  <ul>
                        <li>Portfolio Management</li>
                        <li>Individual’s Dashboard</li>
                        <li>Upcoming Issue</li>
                        <li>Top Listed</li>
                        <li>Market Summary</li>

                  </ul>


                    <hr>
                    <text id="footer-end">&#169; &nbsp Copyright StockPortfolio.com..All Right Preserved </text>



                    <text id="contact">Contact</text>
                    <a class="aa" href="">Facebook</a>
                    <a class="aa"href="">Instagram</a>
                    <a class="aa" href="">Twitter</a>
                    <a class="aa" href="">Youtube</a>
            



            </footer>





      </div>


</body>

</html>