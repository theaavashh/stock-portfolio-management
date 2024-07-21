<?php
include("main.php");
include("database.php");
$user = $_SESSION['username'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <link href="css/dashboard.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=EB+Garamond:ital@1&family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>


</head>
<body>
      <div id="div1">

      <h1>Dashboard</h1>
          
            <div id="dashpart_one">
                <text class="dash_text"> Total Transaction</text>
                <div id="dash_innertext">
                <?php 
              $s="SELECT count(id) FROM `portfolio` WHERE user_id='{$user}' ";
               $a=mysqli_query($conn,$s);
                                      
              while($r=mysqli_fetch_assoc($a)){
              foreach($r as $total){
              echo $total;
             }
      }?> </div>

</div>
<div id="dashpart_two">
                <text class="dash_text"> Total Share Value</text>
                <div id="dash_innertext2">
                <?php 
              $s="SELECT SUM(total_price) FROM `portfolio` WHERE user_id='{$user}' ";
               $a=mysqli_query($conn,$s);
                                      
              while($r=mysqli_fetch_assoc($a)){
              foreach($r as $b){
              echo $b;
             }
      }
 ?></div>
                

</div>
<div id="dashpart_three">
                <text class="dash_text">Upcoming Company</text>
                <div id="dash_innertext3">
                <?php
                $sql="Select * from upcoming_issue";
                $result=mysqli_query($conn,$sql);
                $total=mysqli_num_rows($result);

                    
                 echo $total?> </div></div>


</div>


<?php
$sql="Select * from portfolio where user_id='$user'";
$result=mysqli_query($conn,$sql);
while($a=mysqli_fetch_assoc($result)){
     $stock[]=$a['company_name'];
     $price[]=$a['buying_price'];
     $units[]=$a['units'];
}

?>

<div id='red'> </div>
            <canvas  id="myChart" height="250" width="1200"></canvas> 
        </div> 
     


<script type="text/javascript">
     var ctx=document.getElementById("myChart").getContext("2d");

var myChart=new Chart(ctx,{
  type:"doughnut",
  data:{
        labels:<?php echo json_encode($stock); ?>,
        datasets:[
              {
                    data:<?php echo json_encode($price); ?>,
                    data:<?php echo json_encode($units); ?>,
                    backgroundColor: [
                               "#264653",
                                "#457b9d",
                                "#1d3557",
                                "#370617",
                                "#3b5838d",
                                "#283618",
                                "#8e9aaf",
                                "#7400b8",
                                "#006d77"
                            ],
            
        
      },
        ],
  },
  options:{
        responsive:false,
  }





});
    </script>







         




      </div>

      
</body>
</html>