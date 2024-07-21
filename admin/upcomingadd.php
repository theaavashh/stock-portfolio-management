<?php
include("database.php");
include("main.php");

$symbolerror= $companyerror=$issuemanagrerror=$sharetypeerror=$priceerror=$unitserror=$issuedateerror=$closedateerror="";
$symbol=$companyname=$issuemanager=$sharetypeerror=$price=$units=$issuedate=$closedate="";

if(isset($_POST['submit'])){
      $symbol=$_POST['symbol'];
      $companyname=$_POST['company_name'];
      $issuemanager=$_POST['issue_manager'];
      $sharetype=$_POST['share_types'];
      $price =$_POST['price'];
      $units=$_POST['units'];
      $issuedate=$_POST['issue_date'];
      $closedate=$_POST['close_date'];
      

      if(empty($symbol)){
            $symbolerror="This field is empty";
      }
      if(empty($companyname)){
            $companyerror="This field is empty";
      }

      if(empty($issuemanager)){
            $issuemanagrerror="This field is empty";
      }

      if(empty($sharetype)){
            $sharetypeerror="This field is empty";
      }

      if(empty($price)){
            $priceerror="This field is empty";
      }
      if(empty($units)){
            $unitserror="This field is empty";
      }

      if(empty($issuedate)){
            $issuedateerror="This field is empty";
      }

      if(empty($closedate)){
            $closedateerror="This field is empty";
      }


      $sql="Select * from upcoming_issue where symbol='$symbol'";
      $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)>0){
            ?>
            <script>
                   alert("Upcoming Issue already exits");
            </script>
       <?php     
           
      }

  
else if($symbolerror=="" && $companyerror=="" && $issuemanagrerror=="" && $sharetypeerror=="" && $priceerror=="" && $unitserror=="" && $issuedateerror=="" && $closedateerror=="")  {

       
     $sql="INSERT INTO `upcoming_issue`(`symbol`, `company_name`, `issue_manager`, `share_types`, `price`, `units`, `issue_date`, `close_date`) VALUES ('$symbol','$companyname','$issuemanager','$sharetype','$price','$units','$issuedate','$closedate')";
     $result=mysqli_query($conn,$sql);

     if($result){
           ?>
           <script>
                 alert("Hurray! Your data has been inserted");
                 </script>
       <?php
                 
     }
     else{
           echo mysqli_error($conn);
     }

}
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/upcomingadd.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
    
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/upcomingadd.js"></script>

      
</head>
<body>
      <div id="heading">
        <div id="topic">
              <text>Add Upcoming Stock</text>
              <a href="upcomingissue.php"><button class="btn1">Click here to view details</button></a>
              <hr>
        </div>

        <div id="mains">
              <form action="upcomingadd.php" method="POST"  id="loginForm">
              <div id="symbol">
              <label>Symbol</label><br>
              <input type="text" id="symbols" name="symbol" autocomplete="off"><br>
              <span id="symbol_error"><?php echo $symbolerror?></span>
              </div>
              <div id="cname">
              <label>Company Name</label><br>
              <input type="text" id="com_name" name="company_name" autocomplete="off"><br>
              <span id="com_error"><?php echo $companyerror?></span>
              </div>
              <div id="issmanager">
              <label>Issue Manager</label><br>
              <input type="text" id="iss_manager" name="issue_manager" autocomplete="off"><br>
              <span id="iss_error"><?php echo $issuemanagrerror?></span>
              </div>
              <div id="sharetype" >
              <label>Share Type</label><br>
               <select id="share_types" name="share_types">
                     <option disabled>Select Stock Type</option>
                     <?php 
                     $sql_one="Select * from stocktype";
                     $result_one=mysqli_query($conn,$sql_one);
                     while($stockid=mysqli_fetch_assoc($result_one)){

                     

                     ?>
                     <option><?php echo $stockid['stockname'] ?></option>
                  <?php
                     }
                     ?>

               </select><br>
              <span id="sharetype_error"><?php echo $sharetypeerror?></span>
              </div>
              <div id="price">
              <label>Price</label><br>
              <input type="text" id="prices" name="price" autocomplete="off"><br>
              <span id="price_error"><?php echo $priceerror?></span>
              </div>
              <div id="units">
              <label>Units</label><br>
              <input type="text" id="unit" name="units" autocomplete="off"><br>
              <span id="units_error"><?php echo $unitserror?></span>
              </div>
              <div id="issdate">
              <label>Issue Date</label><br>
              <input type="date" id="issue_date" name="issue_date" autocomplete="off"><br>
              <span id="issue_error"><?php echo $issuedateerror?></span>
              </div>
              <div id="closdate">
              <label>Closing Date</label><br>
              <input type="date" id="close_date" name="close_date" autocomplete="off"><br>
              <span id="close_error"><?php echo $closedateerror?></span>
              </div>

              <button name='submit' id="login" class="btn" >Add Here</button>
              
      
              </form>
         


        </div>



      </div>





<script>






$(function(){
      // $("#symbol_error").hide();
      // $("#com_error").hide();
      // $("#iss_error").hide();
      // $("price_error").hide();
      // $("units_error").hide();
      // $("issue_error").hide();
      // $("close_error").hide();


      var symbolerror=false;
      var companyerror=false;
      var issuemanagererror=false;
      var priceerror=false;
      var unitserror=false;
      var issueerror=false;
      var closeerror=false;

     $("#symbols").keyup(function(){
        checksymbol();

     });

     $("#com_name").keyup(function(){
        checkcompanyname();

     });

     $("#iss_manager").keyup(function(){
        checkissuemanager();

     });

     $("#prices").keyup(function(){
        checkprice();

     });

     $("#unit").keyup(function(){
        checkunits();

     });

     $("#issue_date").focusout(function(){
        checkdate();

     });

     $("#close_date").focusout(function(){
        checkclosedate();

     });


   function checksymbol(){
           var symbolpattern=/^[a-zA-Z\s]+$/;
           var fsymbol=$("#symbols").val();
        

           if(symbolpattern.test(fsymbol) && fsymbol!==""){
                 $("#symbol_error").hide();

           }
           else{
                 $("#symbol_error").html("Should contains only character");
                 $("#symbol_error").show();
                 symbolerror=true;

           }



   }

   function checkcompanyname(){
      var cnamepattern=/^[a-zA-Z\s]+$/;
           var cname=$("#com_name").val();

           if(cnamepattern.test(cname) && cname!==""){
                 $("#com_error").hide();
           }
           else{
                 $("#com_error").html("Should contain only character");
                 $("#com_error").show();
                 companyerror=true;

           }

   }



   function checkissuemanager(){
      var issmanagerpattern=/^[a-zA-Z\s]+$/;
      var cissmanager=$("#iss_manager").val();
      var lengthmanager=$("#iss_manager").val().length;

      if(issmanagerpattern.test(cissmanager) && cissmanager!==""){
            $("#iss_error").hide();
      }
      else if(lengthmanager<1){
            $("#iss_error").html("Must be fill out");
            $("#iss_error").show();
            issuemanagererror=true;

      }
      else{
            $("#iss_error").html("Should contain only character");
            $("#iss_error").show();
            issuemanagererror=true;
      }

   }


   function checkprice(){
        var pricepattern=/^[0-9]*$/;
        var checkprice=$("#prices").val();
        var lenghtcheck=$("#prices").val().length;

        if(pricepattern.test(checkprice) && checkprice!==""){
              $("#price_error").hide();
        }
        else if(lenghtcheck<1){
              $("#price_error").html("Must be fill out");
              $("#price_error").show();
              priceerror=true;
        }
        else{
              $("#price_error").html("Should be numeric value");
              $("#price_error").show();
              priceerror=true;
        }




   }



   function checkunits(){
        var unitpattern=/^[0-9]*$/;
        var checkunit=$("#unit").val();
        var unitcheck=$("#unit").val().length;

        if(unitpattern.test(checkunit) && checkunit!==""){
              $("#units_error").hide();
        }
        else if(unitcheck<1){
              $("#units_error").html("Must be fill out");
              $("#units_error").show();
              unitserror=true;
        }
        else{
              $("#units_error").html("Should be numeric value");
              $("#units_error").show();
              unitserror=true;
        }

   }

   function checkdate(){
          var datevalue=$("#issue_date").val();

          if(datevalue==""){
                $("#issue_error").html("Should be fill out");
                $("#issue_error").show();

          }
          else{
            $("#issue_error").hide();

          }
   }

 function checkclosedate(){
          var datevalues=$("#close_date").val();
          var datecompare=$("#issue_date").val();

          if(datevalues==""){
                $("#close_error").html("Should be fill out");
                $("#close_error").show();

          }
          else if(datevalues<=datecompare){
            $("#close_error").html("Incorrect format");
                $("#close_error").show();

          }
          else{
            $("#close_error").hide();

          }
   }






});




</script>

</body>
</html>com