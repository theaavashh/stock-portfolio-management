
$(function(){

      var companyerror=false;
      var unitserror=false;
      var buyingpriceerror=false;
      var date_error=false;

      $("#companyname").keyup(function(){
           checkcompanyname();
      });

      $("#units").keyup(function(){
           checkunits();
      });

      $("#buyingprice").keyup(function(){
           checkbuyingprice();
      });

      $("#date").focusout(function(){
              checkdate();
      });








      function checkcompanyname(){
           let companypattern=/^[A-Za-z\s]*$/;
           let companycheck=$("#companyname").val();
           let companylength=$("#companyname").val().length;

           if(!companypattern.test(companycheck)){
                 $("#errorcompanyname").html("Should be alphabet character only");
                 $("#errorcompanyname").show();
                 $("#submit").attr('disabled','disabled');
                 companyerror=true;
           }
           else if(companylength<1){
            $("#errorcompanyname").html("Should be filled out");
            $("#errorcompanyname").show();
            $("#submit").attr('disabled','disabled');
             companyerror=true;

           }
          
           else if(companylength<=5){
            $("#errorcompanyname").html("Should be more than 5 character");
            $("#errorcompanyname").show();
            $("#submit").attr('disabled','disabled');
             companyerror=false;
           }
           else{
            $("#submit").removeAttr('disabled');
            $("#errorcompanyname").hide();

           }



      }

      function checkunits(){
            let unitspattern=/^[0-9]*$/;
            let unitsfield=$("#units").val();
            let unitslength=$("#units").val().length;

            if(!unitspattern.test(unitsfield)){
                  $("#errorunits").html("Should be numeric character only");
                  $("#errorunits").show();
                  $("#submit").attr('disabled','disabled');
                  unitserror=true;
            }
            else if(unitslength<1){
                  $("#errorunits").html("Should be filled out");
                  $("#errorunits").show();
                  $("#submit").attr('disabled','disabled');
                  unitserror=true;

            }
            else if((unitslength<2) || (unitslength>8)){
                  $("#errorunits").html("Should be between 2-8");
                  $("#errorunits").show();
                  $("#submit").attr('disabled','disabled');
                  unitserror=true;

            }
            else{
                  $("#submit").removeAttr('disabled');
                  $("#errorunits").hide();

            }

      }


      function checkbuyingprice(){
            let pricepattern=/^[0-9]*$/;
            let pricefield=$("#buyingprice").val();
            let pricelength=$("#buyingprice").val().length;

            if(!pricepattern.test(pricefield)){
                  $("#errorbuyingprice").html("Should be numeric character only");
                  $("#errorbuyingprice").show();
                  $("#submit").attr('disabled','disabled');
                  buyingpriceerror=true;
            }
            else if(pricelength<1){
                  $("#errorbuyingprice").html("Should be filled out");
                  $("#errorbuyingprice").show();
                  $("#submit").attr('disabled','disabled');
                  buyingpriceerror=true;

            }
            else if((pricelength<2) || (pricelength>8)){
                  $("#errorbuyingprice").html("Should be between 2-8");
                  $("#errorbuyingprice").show();
                  $("#submit").attr('disabled','disabled');
                  buyingpriceerror=true;

            }
            else{
                  $("#submit").removeAttr('disabled');
                  $("#errorbuyingprice").hide();

            }

      }

      function checkdate(){

            let datevalue=$("#date").val();
            
            if(!datevalue==""){
                  $("#submit").removeAttr('disabled');
                  $("#errordate").hide();

            }
            else{
                  $("#errordate").html("Should be filled out");
                  $("#errordate").show();
                  $("#submit").attr('disabled','disabled');
                  date_error=true;

            }
      }

});

