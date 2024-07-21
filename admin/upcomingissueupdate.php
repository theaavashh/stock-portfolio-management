<?php
include("main.php");
include("database.php");

 $sno=$_GET['id'];
 $sql="Select * from upcoming_issue where id={$sno}";
 $result=mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){



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
   
      <script src="js/upcomingupdate.js"></script>
      
</head>
<body>
      <div id="heading">
        <div id="topic">
              <text>Update Upcoming Stock</text>
            
              <hr>
        </div>

        <div id="mains">
              <form action="upcomingupdating.php" method="POST" onsubmit="return validation()"  >
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <div id="symbol">
              <label>Symbol</label><br>
              <input type="text" id="symbols" name="symbol" value="<?php echo  $row['symbol']?>"><br>
              <span id="symbol_error"></span>
              </div>
              <div id="cname">
              <label>Company Name</label><br>
              <input type="text" id="com_name" name="company_name" value="<?php echo  $row['company_name']?>"><br>
              <span id="com_error"></span>
              </div>
              <div id="issmanager">
              <label>Issue Manager</label><br>
              <input type="text" id="iss_manager" name="issue_manager" value="<?php echo  $row['issue_manager']?>"><br>
              <span id="iss_error"></span>
              </div>
              <div id="sharetype">
              <label>Share Type</label><br>
              <select id="share_type" name="share_types">
              <option disabled selected>Select stocktype</option>
              <option selected><?php echo $row['share_types']?></option>
              

                      <?php
                                $sql_one="Select * from stocktype";
                                $result_one=mysqli_query($conn,$sql_one);
                                while($rows=mysqli_fetch_assoc($result_one)){

                               
                        ?>
                        <option><?php echo $rows['stockname']?></option>
                        <?php
                                }
                   ?>
            </select><br>
              <span id="sharetype_error"></span>
              </div>
              <div id="price">
              <label>Price</label><br>
              <input type="text" id="prices" name="price" value="<?php echo  $row['price']?>"><br>
              <span id="price_error"></span>
              </div>
              <div id="units">
              <label>Units</label><br>
              <input type="text" id="unit" name="units" value="<?php echo  $row['units']?>"><br>
              <span id="units_error"></span>
              </div>
              <div id="issdate">
              <label>Issue Date</label><br>
              <input type="date" id="issue_date" name="issue_date" value="<?php echo  $row['issue_date']?>"><br>
              <span id="issue_error"></span>
              </div>
              <div id="closdate">
              <label>Closing Date</label><br>
              <input type="date" id="close_date" name="close_date" value="<?php echo  $row['close_date']?>"><br>
              <span id="close_error"></span>
              </div>

              <button name='submit' id="submit" class="btn">Update Here</button>
              
      
              </form>
              <?php
    }
}
    ?>

         


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
                 $("#submit").removeAttr('disabled');

           }
           else if(fsymbol==""){
            $("#symbol_error").html("Must be fill out");
                 $("#symbol_error").show();
                 $("#submit").attr('disabled','disabled');
                 symbolerror=true;

           }
           else{
                 $("#symbol_error").html("Should contains only character");
                 $("#symbol_error").show();
                 $("#submit").attr('disabled','disabled');
                 symbolerror=true;

           }



   }

   function checkcompanyname(){
      var cnamepattern=/^[a-zA-Z\s]+$/;
           var cname=$("#com_name").val();

           if(cnamepattern.test(cname) && cname!==""){
                 $("#com_error").hide();
                 $("#submit").removeAttr('disabled');
           }
           else if(cname==""){
            $("#com_error").html("Must be fill out");
                 $("#com_error").show();
                 $("#submit").attr('disabled','disabled');

           }
           else{
                 $("#com_error").html("Should contain only character");
                 $("#com_error").show();
                 $("#submit").attr('disabled','disabled');
                 companyerror=true;

           }

   }



   function checkissuemanager(){
      var issmanagerpattern=/^[a-zA-Z\s]+$/;
      var cissmanager=$("#iss_manager").val();
      var lengthmanager=$("#iss_manager").val().length;

      if(issmanagerpattern.test(cissmanager) && cissmanager!==""){
            $("#iss_error").hide();
            $("#submit").removeAttr('disabled');
      }
      else if(lengthmanager<1){
            $("#iss_error").html("Must be fill out");
            $("#iss_error").show();
            $("#submit").attr('disabled','disabled');
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
              $("#submit").removeAttr('disabled');
        }
        else if(lenghtcheck<1){
              $("#price_error").html("Must be fill out");
              $("#price_error").show();
              $("#submit").attr('disabled','disabled');
              priceerror=true;
        }
        else{
              $("#price_error").html("Should be numeric value");
              $("#price_error").show();
              $("#submit").attr('disabled','disabled');
              priceerror=true;
        }




   }



   function checkunits(){
        var unitpattern=/^[0-9]*$/;
        var checkunit=$("#unit").val();
        var unitcheck=$("#unit").val().length;

        if(unitpattern.test(checkunit) && checkunit!==""){
              $("#units_error").hide();
              $("#submit").removeAttr('disabled');
        }
        else if(unitcheck<1){
              $("#units_error").html("Must be fill out");
              $("#units_error").show();
              $("#submit").attr('disabled','disabled');
              unitserror=true;
        }
        else{
              $("#units_error").html("Should be numeric value");
              $("#units_error").show();
              $("#submit").attr('disabled','disabled');
              unitserror=true;
        }

   }

   function checkdate(){
          var datevalue=$("#issue_date").val();

          if(datevalue==""){
                $("#issue_error").html("Should be fill out");
                $("#issue_error").show();
                $("#submit").attr('disabled','disabled');

          }
          else{
            $("#issue_error").hide();
            $("#submit").removeAttr('disabled');

          }
   }

 function checkclosedate(){
          var datevalues=$("#close_date").val();
          var datecompare=$("#issue_date").val();

          if(datevalues==""){
                $("#close_error").html("Should be fill out");
                $("#close_error").show();
                $("#submit").attr('disabled','disabled');

          }
          else if(datevalues<=datecompare){
            $("#close_error").html("Incorrect format");
                $("#close_error").show();
                $("#submit").attr('disabled','disabled');

          }
          else{
            $("#close_error").hide();
            $("#submit").removeAttr('disabled');

          }
   }






});




</script>

  
</body>
</html>