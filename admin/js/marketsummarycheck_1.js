
$(function(){
      var dateerror=false;

      $("#labela1").focusout(function(){
           checkdate();
      });

      $("#label1").keyup(function(){
            checkturnover();
      });

      $("#label2").keyup(function(){
            checktradeshare();
      });

      $("#label3").keyup(function(){
            checktransaction();

      });

      $("#label4").keyup(function(){
            checkscrips();

      });

      $("#label5").keyup(function(){
          checkmarketcapitalized();

      });


      

      function checkdate(){
           let datefield=$("#labela1").val().length;

           if(datefield==""){
                 $("#errordate").html("Should be filled out");
                 $("#errordate").show();
                 $("#btn1").attr("disabled","disabled");
                 dateerror=true;
           }
           else{
            $("#errordate").hide();
            $("#btn1").removeAttr("disabled");
           }


      }


      function checkturnover(){
            let turnoverfield=/^[0-9]*$/;
            let turnvalue=$("#label1").val();

            let turnoverlength=$("#label1").val().length;
            if(!turnoverfield.test(turnvalue)){
                  $("#errorturnover").html("Should be numerical character");
                  $("#errorturnover").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else if(turnoverlength<1){
                  $("#errorturnover").html("Should be filled out");
                  $("#errorturnover").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else{
                  $("#errorturnover").hide();
                  $("#btn1").removeAttr("disabled");

            }
      }

      function checktradeshare(){
            let tradesharefield=/^[0-9]*$/;
            let tradesharevalue=$("#label2").val();

            let tradesharelength=$("#label2").val().length;
            if(!tradesharefield.test(tradesharevalue)){
                  $("#errortradeshare").html("Should be numerical character");
                  $("#errortradeshare").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else if(tradesharelength<1){
                  $("#errortradeshare").html("Should be filled out");
                  $("#errortradeshare").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else{
                  $("#errortradeshare").hide();
                  $("#btn1").removeAttr("disabled");

            }
}


      function checktransaction(){
            let transactionfield=/^[0-9]*$/;
            let transactionvalue=$("#label3").val();
            let transactionlength=$("#label3").val().length;
            if(!transactionfield.test(transactionvalue)){
                  $("#errortransaction").html("Should be numerical character");
                  $("#errortransaction").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else if(transactionlength<1){
                  $("#errortransaction").html("Should be filled out");
                  $("#errortransaction").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else{
                  $("#errortransaction").hide();
                  $("#btn1").removeAttr("disabled");

            }
      }
      
      function checkscrips(){
            let scripsfield=/^[0-9]*$/;
            let scripsvalue=$("#label4").val();
            let scripslength=$("#label4").val().length;
            if(!scripsfield.test(scripsvalue)){
                  $("#errorscrips").html("Should be numerical character");
                  $("#errorscrips").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else if(scripslength<1){
                  $("#errorscrips").html("Should be filled out");
                  $("#errorscrips").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else{
                  $("#errorscrips").hide();
                  $("#btn1").removeAttr("disabled");

            }






      }

      function checkmarketcapitalized(){
            let marketfield=/^[0-9]*$/;
            let marketvalue=$("#label5").val();
            let marketlength=$("#label5").val().length;

            if(!marketfield.test(marketvalue)){
                  $("#errormarket").html("Should be numerical character");
                  $("#errormarket").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else if(marketlength<1){
                  $("#errormarket").html("Should be filled out");
                  $("#errormarket").show();
                 $("#btn1").attr("disabled","disabled");

            }
            else{
                  $("#errormarket").hide();
                  $("#btn1").removeAttr("disabled");

            }






      }







});
